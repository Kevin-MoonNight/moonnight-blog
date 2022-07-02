<?php

namespace App\Http\Controllers\auth;

class GoogleController extends AuthController
{
    public function __construct()
    {
        $this->driverType = 'google';
    }
}
