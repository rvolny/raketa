<?php

namespace App\Policies;

use App\User;

class SenderPolicy
{
    function senderAccess(User $userLoggedIn, int $senderUserId)
    {
        return $userLoggedIn->id == $senderUserId;
    }
}