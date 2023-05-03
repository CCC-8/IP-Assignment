<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SignupController extends Controller {

    public function create() {
        return view('frontend.register');
    }

    public function store(Request $request) {
        $rules = [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phoneno' => ['required', 'string', 'max:11'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('/register')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            $data = $request->input();
            try {
                $user = new User();
                $user->username = $data['username'];
                $user->email = $data['email'];
                $user->phoneno = $data['phoneno'];
                $user->password = Hash::make($data['password']);
                $user->save();
                return redirect('/register')->with('success', "Register successfully!");
            } catch (Exception $e) {
                return redirect('/register')->with('failed', "operation failed");
            }
        }
    }

}
