<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('home');
    }
    public function about()
    {
        return view('pages.about');
    }
   
    public function users(){

        $users = User::latest()->get();

        return view('Admin.users', compact('users'));
    }

    public function proprites(){
        return view('Admin.proprites');
    }
}

