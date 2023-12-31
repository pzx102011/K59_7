<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

use function redirect;
use function sprintf;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:manage-users');
    }

    public function index(): View
    {
        $user = Auth::user();

        return \view(
            'dashboard.user.index',
            [
                'users' => User::orderBy('id', 'desc')->paginate(10),
                'loggedUser' => $user,
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

    public function store(StoreUserRequest $storeUserRequest): RedirectResponse
    {
        $role = Role::findById($storeUserRequest->get('role'));

        $user = new User();

        $user->name = $storeUserRequest->get('name');
        $user->email = $storeUserRequest->get('email');
        $user->password = Hash::make($storeUserRequest->get('password'));
        $user->role_id = $role->id;
        $user->setCreatedAt(new DateTime('now'));
        $user->syncRoles(Role::findById($storeUserRequest->get('role')));

        $user->save();

        return redirect()
            ->route('users.index')
            ->with(
                'success',
                sprintf(
                    'Pomyślnie utworzono użytkownika %s',
                    $user->name,
                )
            )
        ;
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

    public function update(UpdateUserRequest $updateUserRequest, User $user): RedirectResponse
    {
        $user->name = $updateUserRequest->get('name');
        $user->email = $updateUserRequest->get('email');
        $user->password = Hash::make($updateUserRequest->get('password'));
        $user->setUpdatedAt(new DateTime('now'));
        $user->syncRoles(Role::findById($updateUserRequest->get('role')));

        $user->save();

        return redirect()
            ->route('users.index')
            ->with(
                'success',
                sprintf(
                    'Pomyślnie zaktualizowano użytkownika %s',
                    $user->name,
                )
            )
        ;
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->syncRoles([]);
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with(
                'success',
                sprintf(
                    'Pomyślnie usunięto użytkownika %s',
                    $user->name,
                )
            )
        ;
    }
}
