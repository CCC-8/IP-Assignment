<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Response;

class UserController extends Controller {

    public function xml() {
        $users = User::all();
        return response()->view('xml.users', [
            'users' => $users
        ])->header('Content-Type', 'text/xml');
    }

}
