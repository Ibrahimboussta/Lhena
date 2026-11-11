<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Mailing;
use App\Models\Propritie;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
{
    $properties = Propritie::where('published', true)
        ->residentialRental()
        ->latest()
        ->take(9)
        ->get();

    return view('welcome', compact('properties'));
}


    public function about()
    {
        return view('pages.about');
    }

    public function adminOverview()
    {
        $stats = [
            'users' => User::count(),
            'properties' => Propritie::count(),
            'publishedProperties' => Propritie::where('published', true)->count(),
            'contacts' => Contact::count(),
            'emails' => Mailing::count(),
        ];
        $recentProperties = Propritie::with('user:id,name')->latest()->take(5)->get();

        return view('Admin.overview', compact('stats', 'recentProperties'));
    }

    public function users()
    {
        $users = User::latest()->paginate(10); // Paginate with 10 users per page
        return view('Admin.users', compact('users'));
    }
    public function proprites()
    {
        $properties = Propritie::with('user:id,name')->latest()->paginate(9);
        return view('Admin.proprites', compact('properties'));
    }

    public function destroy(Request $request, Propritie $property, $id){
        $property = Propritie::findOrFail($id);
        $property->delete();

        return redirect()->back()->with('success', __('ui.property_deleted'));
    }
}
