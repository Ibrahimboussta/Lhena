<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProprieteController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\ReviewController;
use App\Models\Propritie;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


Route::get('/', [HomeController::class, 'index']);


Route::middleware(['authRegister'])->group(function () {

    Route::get('/dashboard', [ProprieteController::class, 'dashboard'])->name('dashboard');
    Route::delete('/dashboard/delete/{id}', [ProprieteController::class, 'destroy'])->name('properties.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Redirect old admin URL to the new secure one with rate limiting
Route::get('/lhenadmin', function () {
    return redirect()->route('users');
})->middleware(['throttle:5,1']); // Allow 5 attempts per minute

// Secure admin routes with extremely complex URL
// The admin URL is now: /9x2k8p5q1r7s3t6v0w4y9z2a8b5c1d7e3f6g0h4i9j2k8l5m1n7o3p6q0r4s9t2u8v5w1x7y3z6a0b4c9d2e8f5g1h7i3j6k0l4m9n2o8p5q1r7s3t6v0w4y9z2
Route::prefix('9x2k8p5q1r7s3t6v0w4y9z2a8b5c1d7e3f6g0h4i9j2k8l5m1n7o3p6q0r4s9t2u8v5w1x7y3z6a0b4c9d2e8f5g1h7i3j6k0l4m9n2o8p5q1r7s3t6v0w4y9z2')
    ->middleware(['admin', 'throttle:60,1']) // 60 requests per minute
    ->group(function () {
        Route::get('/', [HomeController::class, 'users'])->name('users');
        Route::get('/proprites', [HomeController::class, 'proprites'])->name('proprites.admin');
        Route::get('/contacts', [ContactController::class, 'contact'])->name('contacts.admin');
        Route::delete('/contacts/delete/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
        Route::delete('/proprites/delete/{id}', [HomeController::class, 'destroy'])->name('properties.admin.destroy');
        Route::get('/emails', [MailingController::class, 'index'])->name('mailing');
        Route::delete('/emails/delete/{id}', [MailingController::class, 'destroy'])->name('mailing.destroy');

        // Add a simple health check endpoint that doesn't require auth
        Route::get('/health', function () {
            return response()->json(['status' => 'ok']);
        })->withoutMiddleware(['admin']);
    });

// Custom 404 for admin routes to prevent URL guessing
Route::fallback(function (Request $request) {
    $path = $request->path();
    if (str_starts_with($path, 'hashed-admin-')) {
        abort(404, 'Page not found');
    }
    abort(404);
});



Route::get('/propriete', [ProprieteController::class, 'index'])->name('proprites');
Route::get('/propriete/{slug}', [ProprieteController::class, 'details'])->name('proprites.details');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/publier-annonce', [PublishController::class, 'index'])->name('publish');
Route::get('/a-propos', [HomeController::class, 'about'])->name('a-propos');



// Route::post('/proprtie/post', [ProprieteContoller::class, 'store' ])->name('proprites.store');
Route::post('/contact/post', [ContactController::class, 'store'])->name('contact.store');
Route::get('/search', [ProprieteController::class, 'search'])->name('properties.search');


Route::post('/emails/post', [MailingController::class, 'store'])->name('mailing.store');



Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');

Route::post('/reviews', [ReviewController::class, 'store'])->middleware('auth')->name('reviews.store');



Route::patch('/admin/properties/{hash}/toggle', [ProprieteController::class, 'togglePublish'])
    ->name('properties.toggle.publish');



Route::post('/proprtie/post', function (Request $request) {
    $request->validate([
        'title' => 'required|string|max:255',
        'property_type' => 'required|string|max:100',
        'city' => 'required|string|max:100',
        'neighborhood' => 'required|string|max:100',
        'address' => 'required|string|max:255',
        'surface' => 'required|numeric|min:0',
        'bedrooms' => 'required|integer|min:0',
        'bathrooms' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'price_type' => 'nullable|string|in:nuit,mois,an',
        'contact_phone' => 'required|string|max:20',
        'description' => 'nullable|string',
        'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,ico,bmp,tiff,webm|max:20480', // Max 20MB per image
        'photos' => 'required|array|max:10', // Max 10 images
        'listing_type' => 'required|array',
        'listing_type.*' => 'in:À-vendre,À-louer',
        'available_from' => 'required|date|after_or_equal:today',
        'available_until' => 'nullable|date|after_or_equal:available_from',
    ]);


    // Check if the user is authenticated
    // Get the authenticated user
    $user = Auth::user();

    // Handle file uploads (photos)
    $photos = [];
    foreach ($request->file('photos') as $photo) {
        // Store photo in the public storage and get the path
        $path = $photo->store('properties', 'public');
        $photos[] = $path;
    }

    // Generate temporary slug
    $tempSlug = \Illuminate\Support\Str::slug($request->city . '-' . $request->title) . '-temp-' . time();

    // Create property first
    $property = Propritie::create([
        'user_id' => $user->id,  // Associate the property with the authenticated user
        'title' => $request->title,
        'property_type' => $request->property_type,
        'city' => $request->city,
        'neighborhood' => $request->neighborhood,
        'address' => $request->address,
        'surface' => $request->surface,
        'bedrooms' => $request->bedrooms,
        'bathrooms' => $request->bathrooms,
        'price' => $request->price,
        'price_type' => $request->price_type ?: null, // Store NULL if empty
        'contact_phone' => $request->contact_phone,
        'description' => $request->description,
        'photos' => json_encode($photos),
        'listing_type' => implode(',', $request->listing_type),
        'available_from' => $request->available_from,
        'available_until' => $request->available_until,
        'amenities' => $request->amenities ? json_encode($request->amenities) : null,
        'slug' => $tempSlug
    ]);

    // Update with final slug
    $finalSlug = \Illuminate\Support\Str::slug($request->city . '-' . $request->title) . '-' . $property->hashed_id;
    $property->update(['slug' => $finalSlug]);

    $target = '/home/lhena4ki/repositories/Lhena/storage/app/public';
    $link = '/home/lhena4ki/public_html/storage';
    $files = new \Illuminate\Filesystem\Filesystem;

    // Fallback: Copy directory


    if (!$files->isDirectory($link)) {
        $files->makeDirectory($link, 0755, true);
    }

    $files->copyDirectory($target, $link);

    // dd('');

    return redirect()->route('dashboard')->with('success', 'Property added successfully!');
})->name('proprites.store');


require __DIR__ . '/auth.php';
