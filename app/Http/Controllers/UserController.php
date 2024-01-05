<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

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
        return \view(
            'dashboard.user.create',
            [
                'availableRoles' => Role::all(),
            ]
        );
    }

    public function store(): RedirectResponse
    {
    }

    public function edit(User $user): View
    {
        return \view(
            'dashboard.user.edit',
            [
                'user' => $user,
                'availableRoles' => Role::all(),
            ]
        );
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
