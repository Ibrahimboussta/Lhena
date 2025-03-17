<?php

namespace App\Http\Controllers;

use App\Models\Propritie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProprieteContoller extends Controller
{
    public function index()
    {
        $properties = Propritie::latest()->get();

        return view('pages.proprietes', compact('properties'));
    }
    public function details($id)
    {
        $property = Propritie::findOrFail($id); // Fetch the single property
        $photos = json_decode($property->photos); // Decode the photos array from JSON
        
        return view('pages.proprietesDetails', compact('property', 'photos'));
    }
    
    

    public function dashboard(){
        $properties = Propritie::latest()->get();
        return view('dashboard', compact('properties'));
    }

    public function store(Request $request)
    {
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
            'contact_phone' => 'required|string|max:20',
            'description' => 'nullable|string',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Each photo file validation
            'photos' => 'required|array|max:10', // Max 10 images
            'listing_type' => 'required|array', // Changed to array to allow multiple values (À vendre, À louer)
            'listing_type.*' => 'in:À-vendre,À-louer', // Validation for each value in the listing_type array

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

        Propritie::create([
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
            'contact_phone' => $request->contact_phone,
            'description' => $request->description,
            'photos' => json_encode($photos), 
            'listing_type' => implode(',', $request->listing_type), // Store as comma-separated string
        ]);

        return redirect()->route('dashboard');

        // Create a new property entry and associate it with the authenticated user
    }


    public function destroy($id)
    {
        // Find the property by ID
        $propritie = Propritie::findOrFail($id);
    
        // Check ownership or if the user is an admin
        $user = Auth::user();
    
        if ($propritie->user_id === $user->id || $user->role === 'admin') {
            // Only delete the property that matches the ID
            $propritie->delete();
    
            return redirect()->route('dashboard')->with('success', 'Property deleted successfully!');
        }
    
        // Unauthorized action if not the owner or admin
        abort(403, 'Unauthorized action.');
    }
    
    
    
}
