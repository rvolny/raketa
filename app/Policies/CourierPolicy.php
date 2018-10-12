<?php

namespace App\Policies;

use App\User;

class CourierPolicy
{
    function courierAccess(User $userLoggedIn, int $senderUserId)
    {
        return $userLoggedIn->id == $senderUserId;
    }
}