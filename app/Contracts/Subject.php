<?php

namespace App\Contracts;

use App\Contracts\Observer;
use App\Models\User;

interface Subject {

    public function attach(Observer $observer);

    public function detach(Observer $observer);

    public function notify(User $user);
}
