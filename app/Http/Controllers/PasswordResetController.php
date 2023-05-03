<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Observers\EmailNotifier;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use App\Models\User;

class PasswordResetController extends Controller {

    public function create() {
        return view('frontend.forgotpass');
    }
    
    public function index() {
        return view('frontend.resetpass');
    }

    public function resetPassword(Request $request) {
        $email = $request->input('email');
//        dd($email);
        $user = User::where('email', $email)->first(); // Look up user by email address

        if ($user) {
            $passwordReset = new PasswordReset();
            $passwordReset->attach(new EmailNotifier()); // Attach email notifier observer
            $passwordReset->resetPassword($user);
            return redirect()->back()->with('status', 'An email has been sent to your email address with instructions on how to reset your password.');
        } else {
            return redirect()->back()->with('error', 'Invalid email address.');
        }
    }

}
