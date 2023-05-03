<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller {

    // Show the admin login form
    public function showLoginForm() {
        return view('admin.login');
    }

    public function successlogin() {
        return view('admin.dashboard');
    }

    // Handle the admin login form submission
    public function login(Request $request) {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

//        $credentials = [
//            'username' => $request->input('username'),
//            'password' => $request->input('password')
//        ];
//        dd($credentials);

        if (Auth::guard('admin')->attempt($credentials)) {
        // Authentication passed...
//            dd('Authentication passed');
        return redirect()->intended('/dashboard');
        }
//        dd('Invalid username or password');
        return redirect()->back()->withErrors(['error' => 'Invalid username or password']);
    }

    // Logout the admin user
    public function logout() {
        Auth::logout();
        return redirect('adminlogin');
    }

}
