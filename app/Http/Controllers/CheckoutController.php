<?php

namespace App\Http\Controllers;

use App\Models\Propritie;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //

    public function checkout()
    {
        return view('pages.chekout');
    }

    public function checkoutDetails($id)
    {
        $property = Propritie::findOrFail($id); // العقار لي اختار المستخدم
        $photos = json_decode($property->photos);
        $properties = Propritie::latest()->paginate(3); // عقارات مشابهة

        return view('pages.chekout', compact('property', 'photos', 'properties'));
    }
}
