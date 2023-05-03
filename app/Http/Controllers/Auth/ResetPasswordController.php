<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller {

    public function showResetForm(Request $request, $reset_token, $email) {

        $user = User::where('email', $email)->where('reset_token', $reset_token)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid reset link.');
        }

        return view('frontend.resetpass')->with([
                    'reset_token' => $reset_token,
                    'email' => $email,
        ]);
    }

    public function reset(Request $request) {

        $email = $request->input('email');
        $reset_token = $request->input('reset_token');

        $user = User::where('email', $email)->where('reset_token', $reset_token)->first();


        if (Hash::check($reset_token, $user->reset_token)) {
            // Invalid reset password link
            
            return redirect()->back()->withErrors(['error' => 'The reset token link is invalid.']);
        }

        // Check if the user exists
//        if (!$user) {
//            return redirect()->back()->with('error', 'Invalid reset link.');
//        }
        // Validate the form data
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        // Find the user with the given email and token
//        $user = User::where('email', $request->email)->where('reset_token', $request->token)->first();
//        dd(User::where('email', $request->email)
//                        ->where('userID', $request->userID)
//                        ->where('reset_token', $request->token)
//                        ->toSql());
//        $user = User::where('email')
//                ->where('reset_token')
//                ->first();
//        dd($user);
        // If the user is not found, redirect back with an error message
//        if (!$user) {
//            return redirect()->back()->withErrors(['error' => 'Invalid email or token']);
//        }
        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->reset_token = null;
        $user->save();

//        return redirect()->back()->with('success', 'Your password has been reset successful');
//        return redirect()->route('login')->with('success', 'Your password has been reset successfully.');
        return redirect()->to('/login')->with('success', 'Your password has been reset successfully.');
    }

}
