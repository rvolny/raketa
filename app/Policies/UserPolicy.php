<?php

namespace App\Policies;

use App\User;

class UserPolicy
{
    function userAccess(User $userLoggedIn, User $userAccessed)
    {
        return ($userLoggedIn->id == $userAccessed->id);
    }
}
