<?php

namespace App\Http\Controllers;

use App\Models\Mailing;
use Illuminate\Http\Request;

class MailingController extends Controller
{
    //
    public function index()
    {
        $emails = Mailing::all();
        return view('Admin.emails', compact('emails'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $mailing = Mailing::create([
            'email' => $request->email,
        ]);
        return redirect()->back()->with('success', 'Email enregistré avec succès');
    }
    public function destroy($id)
    {
        $mailing = Mailing::find($id);
        $mailing->delete();
        return redirect()->back()->with('success', 'Email supprimé avec succès');
    }
}
