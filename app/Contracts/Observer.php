<?php

namespace App\Contracts;

use App\Models\User;

interface Observer {

    public function update(User $user);
}
