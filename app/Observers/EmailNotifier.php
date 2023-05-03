<?php

namespace App\Observers;

use App\Contracts\Observer;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class EmailNotifier implements Observer {

    public function update(User $user) {
        // Send email to user with reset link
        $resetLink = $this->generateResetLink($user);
        $this->sendEmail($user, $resetLink);
    }

    public function generateResetLink(User $user) {
        // Generate a unique reset token for the user
        $resetToken = Hash::make(bin2hex(random_bytes(32)));
//        $resetTokenExpire = Carbon::now()->addMinutes(60);
//        
//        dd($resetTokenExpire);

        // Store the reset token in the database
        $user->reset_token = $resetToken;
//        $user->reset_token_expire_at = $resetTokenExpire;
        $user->save();

        // Generate the reset link using the reset token
//        $resetLink = url('/reset/{reset_token}/{email}') . '?token=' . $resetToken . '?email='. urlencode($user->email);
//        $resetLink = url('/reset/' . $resetToken . '/' . urlencode($user->email)) . '?token=' . $resetToken;
//        $url = url('/reset/' . $reset_token . '/' . $email) . '?token=' . $token . '&email=' . urlencode($email);
        $resetLink = url('/reset/' . $resetToken . '/' . urlencode($user->email));


        return $resetLink;
    }

    private function sendEmail(User $user, $resetLink) {
        // Send an email to the user with the reset link
        Mail::to($user->email)->send(new PasswordResetEmail($resetLink));
    }

}
