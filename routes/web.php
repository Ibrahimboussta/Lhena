<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProprieteContoller;
use App\Http\Controllers\PublishController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index']);


Route::middleware(['authRegister'])->group(function () {
    
    Route::get('/dashboard', [ProprieteContoller::class, 'dashboard'])->name('dashboard');
    Route::delete('/dashboard/delete/{id}', [ProprieteContoller::class, 'destroy'])->name('properties.destroy');

   
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});


Route::middleware(['admin'])->group(function () {
    Route::get('/bourseimmo', [HomeController::class, 'users'])->name('users');
    Route::get('/proprites', [HomeController::class, 'proprites'])->name('proprites.admin');
    Route::get('/contacts', [ContactController::class, 'contact'])->name('contacts.admin');
    Route::delete('/contacts/delete/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::delete('/proprites/delete/{id}', [HomeController::class, 'destroy'])->name('properties.admin.destroy');
    Route::get('/emails', [MailingController::class, 'index'])->name('mailing');
    Route::delete('/emails/delete/{id}', [MailingController::class, 'destroy'])->name('mailing.destroy');
    
});



Route::get('/propriete', [ProprieteContoller::class, 'index' ])->name('proprites');
Route::get('/propriete/details/{id}', [ProprieteContoller::class, 'details'])->name('proprites.details');
Route::get('/contact', [ContactController::class, 'index' ])->name('contact');
Route::get('/publier-annonce', [PublishController::class, 'index' ])->name('publish');
Route::get('/a-propos', [HomeController::class, 'about' ])->name('a-propos');


Route::post('/proprtie/post', [ProprieteContoller::class, 'store' ])->name('proprites.store');
Route::post('/contact/post', [ContactController::class, 'store' ])->name('contact.store');
Route::get('/search', [ProprieteContoller::class, 'search'])->name('properties.search');


Route::post('/emails/post', [MailingController::class, 'store'])->name('mailing.store');


require __DIR__.'/auth.php';
