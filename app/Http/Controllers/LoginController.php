<?php

namespace App\Http\Controllers;

class LoginController
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
}
