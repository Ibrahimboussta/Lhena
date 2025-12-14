<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('pages.contact');
    }


    public function contact()
    {
        $contacts = Contact::latest()->paginate(10); // Paginate with 10 contacts per page
        return view('Admin.contact', compact('contacts'));
    }

    public function store(Request $request)
    {

        // dd($request);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Message envoyé avec succès');
    }


    public function destroy(Request $request, Contact $contact, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->back()->with('success', 'Message supprimé avec succès');
    }
}
