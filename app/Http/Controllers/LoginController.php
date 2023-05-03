<?php

namespace App\Http\Controllers;

//require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Google\Recaptcha\V3\ReCaptchaV3;
use GoogleRecaptchaValidator\Validator as RecaptchaValidator;
use \ReCaptcha\ReCaptcha;
use App\Models\User;

class LoginController extends Controller {

    public function create() {
        return view('frontend.login');
    }

    public function successlogin() {
        return view('frontend.index');
    }

    public function login(Request $request) {
//        $credentials = $request->only('email', 'password');
//        dd($request->all());
//        dd($credentials);

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

//        $this->validate($request, [
//            'email' => 'required|email',
//            'password' => 'required|min:8',
////            'g-recaptcha-response' => ['required', new RecaptchaValidator(new ReCaptchaV2)],
//            'g-recaptcha-response' => ['required', new Validator(new ReCaptcha("6LcQsMYlAAAAAFEnI70MRqT69JkoTJbKLacMmS5V"))]
//
//        ]);

        $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
                    'password' => 'required|min:8',
                    'g-recaptcha-response' => ['required', 'recaptcha'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            Session::put('userID', Auth::user()->userID);

//            $user_id = Session::get('userID'); // get user id that store in the session
//            dd($user_id);

            return redirect()->intended('/index');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid email or password.']);
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
    
    public function handler()
    {
        $users = User::all();

        if ($users->count() > 0) {
            return response()->json([
                        'status' => 200,
                        'users' => $users
                            ], 200);
        } else {
            return response()->json([
                        'status' => 404,
                        'message' => "No Records Found"
                            ], 404);
        }
    }

}
