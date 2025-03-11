<?php

use App\Http\Controllers\ProprieteContoller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.home');
});

Route::get('/propriete', [ProprieteContoller::class, 'index'])->name('proprites');
