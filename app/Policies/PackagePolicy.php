<?php

namespace App\Policies;

use App\Package;
use App\User;

class PackagePolicy
{
    /**
     * Determine if the given package can be accessed by the user
     *
     * @param User $user
     * @param Package $package
     *
     * @return bool
     */
    function packageAccess(User $user, Package $package)
    {
        return ($user->id == $package->user_id_sender
            || $user->id == $package->user_id_courier);
    }

    /**
     * Determine whether given package can be accepted
     *
     * @param User $user
     * @param Package $package
     *
     * @return bool
     */
    function packageAccept(User $user, Package $package)
    {
        return ($package->user_id_courier == null);
    }
}
