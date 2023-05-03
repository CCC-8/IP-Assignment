<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller {

    public function index() {
        $user = Auth::user(); // Get the currently authenticated user

        return view('frontend.profile', ['user' => $user]); // Return the edit profile view with the authenticated user's data
    }

//    public function passes($attribute, $value) {
//        return Hash::check($value, auth()->user()->password);
//    }
//
//    public function message() {
//        return 'The :attribute is incorrect.';
//    }

    public function update(Request $request) {

        $user = Auth::user();
        $userID = $user->userID; // Get the authenticated user's ID

        $validatedData = $request->validate([
//            'username' => 'required|string|max:255|unique:users',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->where(function ($query) use ($userID) {
                    return $query->where('email', request()->email)->where('userID', '<>', $userID);
                })
            ],
            'phoneno' => 'nullable|string|max:11',
            'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, auth()->user()->password)) {
                        $fail('The current password is incorrect.');
                    }
                }
            ],
            'password' => 'nullable|string|min:8|confirmed',
        ]);

//        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->address = $validatedData['address'];

        if (!empty($validatedData['phoneno'])) {
            $user->phoneno = $validatedData['phoneno'];
        }



        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }

        // Get the uploaded image file and store it in a public disk
//        if ($request->hasFile('avatar')) {
//            $path = $request->file('avatar')->store('public/avatars');
//            $path = str_replace('public/', '', $path);
//        } else {
//            $path = $user->avatar;
//        }

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $path = str_replace('avatars/', '', $path);
        } else {
            $path = $user->avatar;
        }


        $user->avatar = $path;
        $user->save();

        return redirect('/editprofile')->with('success', 'Profile updated successfully!');
    }

}
