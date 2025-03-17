<?php

namespace App\Http\Controllers;

use App\Models\Propritie;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $properties = Propritie::latest()->get(); // Get all properties
        return view('welcome', compact('properties')); // Pass properties to the view
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
        $properties = Propritie::latest()->get();
        return view('Admin.proprites', compact('properties'));
    }

    public function destroy(Request $request, Propritie $property, $id){
        $property = Propritie::findOrFail($id);
        $property->delete();

        return redirect()->back()->with('success', 'Property supprimé avec succès');
    }
}

