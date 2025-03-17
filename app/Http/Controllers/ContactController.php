<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index(){
        return view('pages.contact');
    }


    public function contact(){
        $contacts = Contact::latest()->get();
        return view('Admin.contact', compact('contacts'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string'
        ]);

        $contact = Contact::create($request->all());

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès');
    }


    public function destroy(Request $request, Contact $contact, $id){
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->back()->with('success', 'Message supprimé avec succès');
    }
}
