<?php

namespace App\Models;

use App\Contracts\Observer;
use App\Contracts\Subject;
use App\Models\User;
use App\Observers\EmailNotifier;

class PasswordReset implements Subject {

    private $user;
    private $resetLink;
    private $observers = array();
    
    
    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify(User $user) {
        foreach ($this->observers as $observer) {
            $observer->update($user);
        }
    }

    public function resetPassword(User $user) {
        $this->user = $user;
//        $resetLink = (new EmailNotifier())->generateResetLink($user); // Generate reset link
//        $this->notify(); // Notify observers of password reset
        $passwordReset = new PasswordReset();
        $passwordReset->attach(new EmailNotifier());
        $passwordReset->notify($user);
    }

    public function getUser() {
        return $this->user;
    }

    public function getResetLink() {
        return $this->resetLink;
    }

}
