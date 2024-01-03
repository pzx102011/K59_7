<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use function redirect;

class AuthenticationController extends Controller
{
    public function showLoginForm(): View
    {
        return \view('authentication.loginform');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors(
            [
                'email' => 'The provided credentials do not match our records.',
            ]
        )->onlyInput('email');
    }
}