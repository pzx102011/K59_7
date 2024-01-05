<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use function sprintf;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(sprintf('role:%s', UserRoleEnum::Administrator->value));
    }

    public function index(): View
    {
        $user = Auth::user();

        return \view(
            'dashboard.user.index',
            [
                'users' => User::orderBy('id', 'desc')->paginate(10),
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

    public function destroy(User $user): RedirectResponse
    {
        if ($user->hasRole('Administrator')) {
            abort(403, 'Administrator cannot be deleted');
        }

        $user->syncRoles([]);
        $user->delete();

        return redirect()
            ->route('users.index')
            ->withSuccess('User is deleted successfully.')
        ;
    }

}
