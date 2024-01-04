<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        return \view(
            'dashboard.user.index',
            [
                'users' => User::orderBy('role_id', 'desc')->paginate(10),
                'loggedUser' => Auth::user(),
            ]
        );
    }

    public function create(): View
    {
        return \view('dashboard.user.create');
    }

    public function store(): RedirectResponse
    {
    }

    public function edit(): View
    {
        return \view('dashboard.user.edit');
    }

    public function update(): RedirectResponse
    {
    }

    public function destroy(): RedirectResponse
    {
    }

}
