<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

use function redirect;
use function sprintf;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:manage-subjects');
    }

    public function index(Request $request): View
    {
        /** @var User $user * */
        $user = Auth::user();
        $subjects = Subject::orderBy('name');

        return \view(
            'dashboard.subjects.index',
            [
                'subjects' => $subjects->paginate(25),
                'loggedUser' => $user,
            ]
        );
    }

    public function create(): View
    {
        /** @var User $loggedUser */
        $loggedUser = Auth::user();

        $tutors = User::all()->where('role_id', Role::findByName(UserRoleEnum::Tutor->value)->id);

        return \view(
            'dashboard.subjects.create',
            [
                'loggedUser' => $loggedUser,
                'subject' => null,
                'tutors' => $tutors,
            ]
        );
    }

    public function store(StoreSubjectRequest $storeSubjectRequest): RedirectResponse
    {
        $subject = Subject::create(
            [
                'name' => $storeSubjectRequest->get('subject'),
                'tutor_id' => $storeSubjectRequest->get('tutor'),
            ]
        );

        return redirect()
            ->route('subjects.index')
            ->with(
                'success',
                sprintf(
                    'Pomyślnie utworzono przedmiot %s',
                    $subject->name,
                )
            )
        ;
    }

    public function edit(Subject $subject): View
    {
        /** @var User $loggedUser */
        $loggedUser = Auth::user();

        $tutors = User::all()->where('role_id', Role::findByName(UserRoleEnum::Tutor->value)->id);

        return \view(
            'dashboard.subjects.edit',
            [
                'loggedUser' => $loggedUser,
                'tutors' => $tutors,
                'subject' => $subject,
            ]
        );
    }

    public function update(UpdateSubjectRequest $updateSubjectRequest, Subject $subject): RedirectResponse
    {
        $subject->name = $updateSubjectRequest->get('subject');
        $subject->tutor_id = $updateSubjectRequest->get('tutor');

        $subject->save();

        return redirect()
            ->route('subjects.index')
            ->with(
                'success',
                sprintf(
                    'Pomyślnie zaktualizowano przedmiot %s',
                    $subject->name,
                )
            )
        ;
    }

    public function destroy(Subject $subject): RedirectResponse
    {
        $subject->delete();

        return redirect()
            ->route('subjects.index')
            ->with(
                'success',
                sprintf(
                    'Pomyślnie usunięto przedmiot %s',
                    $subject->name,
                )
            )
        ;
    }
}
