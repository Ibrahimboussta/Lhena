<?php

namespace App\Http\Controllers;

use App\Models\Propritie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProprieteController extends Controller
{
    public function index()
    {
        // Show ONLY published properties on the website
        $properties = Propritie::where('published', true)
            ->latest()
            ->paginate(12);

        return view('pages.proprietes', compact('properties'));
    }


    public function details($slug)
    {
        // Extract the hashed ID from the slug (it's the last part after the last dash)
        $parts = explode('-', $slug);
        $hash = end($parts);

        // Decode the hash to get the actual ID
        $id = Propritie::decodeHash($hash);
        if (!$id) {
            abort(404);
        }

        // Fetch exact property with its reviews + user
        $property = Propritie::with('reviews.user')
            ->where('published', true)
            ->findOrFail($id);

        // Verify the slug matches to prevent URL manipulation
        if ($property->slug !== $slug) {
            return redirect()->route('proprites.details', $property->slug);
        }

        $photos = json_decode($property->photos);

        // ✅ Fetch latest properties but exclude the current one
        $properties = Propritie::where('id', '!=', $id)
            ->latest()
            ->paginate(6);

        return view('pages.proprietesDetails', compact('property', 'photos', 'properties'));
    }




    public function dashboard()
    {
        $properties = Propritie::where('user_id', Auth::id())->latest()->get();
        return view('dashboard', compact('properties'));
    }

    public function store(Request $request)
    {
        // Valid


        // Validate the form fields
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

        return redirect()->route('dashboard')->with('success', 'Property added successfully!');

        // Create a new property entry and associate it with the authenticated user
    }

public function destroy($hash)
{
    // Ensure user is authenticated
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'You must be logged in to perform this action.');
    }

    // Decode the hash to get actual ID
    $id = Propritie::decodeHash($hash);

    if (!$id) {
        abort(404);
    }

    try {
        $property = Propritie::findOrFail($id);
        $user = Auth::user();

        // Check ownership or admin status
        if ($property->user_id !== $user->id && $user->role !== 'admin') {
            return redirect()->back()->with('error', 'You are not authorized to delete this property.');
        }

        // Delete the property
        $property->delete();

        return redirect()->route('dashboard')->with('success', 'Property and all associated data have been deleted successfully!');
    } catch (\Exception $e) {
        // Log the error
        \Log::error('Error deleting property: ' . $e->getMessage());

        return redirect()->back()->with('error', 'An error occurred while deleting the property. Please try again.');
    }
}



    public function search(Request $request)
    {
        $query = $request->input('query');
        $propertyType = $request->input('property_type');
        $quartier = $request->input('quartier');
        $ville = $request->input('ville');
        $listingType = $request->input('listing_type');

        $properties = Propritie::query();

        // 🔍 Search by title/address
        if ($query) {
            $properties->where(function ($q) use ($query) {
                $q->where('title', 'like', "%$query%")
                    ->orWhere('address', 'like', "%$query%");
            });
        }

        // 🏠 Property type
        if ($propertyType) {
            $properties->where('property_type', $propertyType);
        }

        // 📍 Quartier
        if ($quartier) {
            $properties->where('neighborhood', $quartier);
        }

        // 🏙 Ville
        if ($ville) {
            $properties->where('city', $ville);
        }

        // 📌 Listing type
        if ($listingType) {
            $properties->where('listing_type', 'like', "%$listingType%");
        }

        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        if ($minPrice !== null && $maxPrice !== null) {
            $properties->whereBetween('price', [(float) $minPrice, (float) $maxPrice]);
        } elseif ($minPrice !== null) {
            $properties->where('price', '>=', (float) $minPrice);
        } elseif ($maxPrice !== null) {
            $properties->where('price', '<=', (float) $maxPrice);
        }




        // 📅 Availability filter (from → to)
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        if ($fromDate && $toDate) {
            $properties->where(function ($q) use ($fromDate, $toDate) {
                $q->where('available_from', '<=', $fromDate)
                    ->where(function ($q2) use ($toDate) {
                        $q2->whereNull('available_until')
                            ->orWhere('available_until', '>=', $toDate);
                    });
            });
        }

        $properties = $properties->paginate(12);

        return view('pages.proprietes', compact('properties'));
    }
}
