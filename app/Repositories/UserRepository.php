<?php

namespace App\Repositories;
use App\Models\User;
use App\Contracts\UserInterface;


class UserRepository implements UserInterface{
    
    public function all(){
        return $users = User::all();
    }

    public function store(array $data) {
        $user = new User();
        $user->username =$data['username'];
        $user->email = $data['email'];
        $user->phoneno = $data['phoneno'];
        $user->password = $data['password'];
        $user->save();
    }

    public function update(array $data, User $user) {
        $newUser = $user;
        $newUser->username = $data['username'];
        $newUser->email = $data['email'];
        $newUser->phoneno = $data['phoneno'];
        $newUser->password = $data['password'];
        $result = $newUser->update();
    }

    public function destroy(User $user) {
        $newUser = $user;
        $result  = $newUser->delete();
    }

}

