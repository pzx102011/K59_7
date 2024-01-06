<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use function redirect;
use function route;

class AuthenticationController extends Controller
{
    public function index(Request $request): View | RedirectResponse
    {
        if (Auth::user() !== null) {
            return redirect(route('dashboard.index'));
        }

        return \view('authentication.loginform');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login.index'));
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

            return redirect()->intended('dashboard');
        }

        return redirect(route('login.index'))
            ->with('error', 'Nieprawidłowy login lub hasło')
            ->onlyInput('email')
        ;
    }
}
