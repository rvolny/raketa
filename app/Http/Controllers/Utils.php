<?php

namespace App\Http\Controllers;

class Utils
{
    public static function getRandomFilePrefix()
    {
        return bin2hex(random_bytes(8));
    }
}
