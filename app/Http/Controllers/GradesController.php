<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Models\SubjectsGrades;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

use function abort;
use function redirect;

class GradesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request): View
    {
        $user = Auth::user();
        $grades = SubjectsGrades::getGradesAvailableForUser($user);

        $canManageGrades = $user->hasRole(UserRoleEnum::Administrator)
            || $user->hasRole(UserRoleEnum::Headmaster)
            || $user->hasRole(UserRoleEnum::Tutor);

        return \view(
            'dashboard.grades.index',
            [
                'grades' => $grades->forPage($request->get('page', 1), 25),
                'loggedUser' => $user,
                'canManageGrades' => $canManageGrades,
            ]
        );
    }

    public function create(): View
    {
        return \view(
            'dashboard.grades.create',
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
            'dashboard.grades.edit',
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
