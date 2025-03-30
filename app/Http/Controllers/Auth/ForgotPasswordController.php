<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;

class ForgotPasswordController extends Controller
{
    /**
     * Display the password reset request form.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password'); // Make sure you have this view
    }

    /**
     * Handle a password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            // Custom logic to send the email with your Mailable
            $resetUrl = url('/reset-password?token=' . Password::createToken($request->email));
            Mail::to($request->email)->send(new ResetPasswordMail($resetUrl));

            return back()->with('status', __($status));
        }

        return back()->withErrors(['email' => __($status)]);
    }
}
