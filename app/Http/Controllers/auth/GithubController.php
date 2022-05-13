<?php

namespace App\Http\Controllers\auth;

class GithubController extends AuthController
{
    public function __construct()
    {
        $this->driverType = 'github';
    }
}
