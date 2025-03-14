<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProprieteContoller extends Controller
{
    public function index()
    {
        return view('pages.proprietes');
    }
    public function details()
    {
        return view('pages.proprietesDetails');
    }
}
