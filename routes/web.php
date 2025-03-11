<?php

use App\Http\Controllers\ProprietesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.home');
});

