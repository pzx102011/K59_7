<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Models\Subject;
use App\Models\SubjectsGrades;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

use function redirect;
use function sprintf;

class GradesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view-grades', ['only' => ['index']]);
        $this->middleware(
            'permission:modify-grades',
            [
                'only' => ['edit', 'update', 'destroy',],
            ]
        );
        $this->middleware(
            'permission:add-grades',
            [
                'only' => ['create', 'store'],
            ]
        );
    }

    public function index(Request $request): View
    {
        /** @var User $user * */
        $user = Auth::user();
        $grades = SubjectsGrades::getGradesAvailableForUser($user);

        $canManageGrades = $user->hasPermissionTo('modify-grades');
        $canAddGrades = $user->hasPermissionTo('add-grades');

        $pageTitle = match (true) {
            $user->hasRole(UserRoleEnum::Administrator),
            $user->hasRole(UserRoleEnum::Headmaster) => 'Wszystkie oceny',
            $user->hasRole(UserRoleEnum::Tutor) => 'Oceny moich uczniów',
            $user->hasRole(UserRoleEnum::Parent) => 'Oceny moich dzieci',
            default => 'Moje oceny',
        };

        return \view(
            'dashboard.grades.index',
            [
                'grades' => $grades->paginate(25),
                'loggedUser' => $user,
                'canManageGrades' => $canManageGrades,
                'canAddGrades' => $canAddGrades,
                'pageTitle' => $pageTitle,
            ]
        );
    }

    public function create(): View | RedirectResponse
    {
        /** @var User $loggedUser */
        $loggedUser = Auth::user();

        $isTutor = $loggedUser->hasRole(UserRoleEnum::Tutor);

        $tutors = $isTutor
            ? [$loggedUser]
            : User::all()->where('role_id', Role::findByName(UserRoleEnum::Tutor->value)->id);

        $pupils = User::all()->where('role_id', Role::findByName(UserRoleEnum::Pupil->value)->id);
        $subjects = $isTutor
            ? Subject::all()->where('tutor_id', $loggedUser->id)
            : Subject::all();

        if ($isTutor && $loggedUser->subjects->isEmpty()) {
            return redirect()->route('grades.index')->with(
                'message',
                sprintf(
                    '%s nie ma przypisanych żadnych przedmiotów i nie może wystawiać ocen',
                    $loggedUser->name
                )
            );
        }

        return \view(
            'dashboard.grades.create',
            [
                'loggedUser' => $loggedUser,
                'grade' => null,
                'isTutor' => $isTutor,
                'tutors' => $tutors,
                'pupils' => $pupils,
                'subjects' => $subjects,
            ]
        );
    }

    public function store(StoreGradeRequest $storeGradeRequest, SubjectsGrades $grade): RedirectResponse
    {
        $grade->grade = $storeGradeRequest->get('grade');
        $grade->pupil_id = $storeGradeRequest->get('pupil');
        $grade->tutor_id = $storeGradeRequest->get('tutor');
        $grade->subject_id = $storeGradeRequest->get('subject');

        $grade->save();

        if ($grade->tutor_id !== $grade->subject->tutor->id) {
            return redirect()
                ->route('grades.index')
                ->with('error', 'Nie można wystawić oceny jako nauczyciel, który nie uczy danego przedmiotu!')
            ;
        }

        return redirect()->route('grades.index')->with(
            'success',
            sprintf(
                'Pomyślnie wystawiono ocenę z %s dla %s',
                $grade->subject->name,
                $grade->pupil->name,
            )
        );
    }

    public function edit(SubjectsGrades $grade): View
    {
        /** @var User $loggedUser */
        $loggedUser = Auth::user();

        $isTutor = $loggedUser->hasRole(UserRoleEnum::Tutor);

        $tutors = $isTutor
            ? [$loggedUser]
            : User::all()->where('role_id', Role::findByName(UserRoleEnum::Tutor->value)->id);

        $pupils = User::all()->where('role_id', Role::findByName(UserRoleEnum::Pupil->value)->id);
        $subjects = $isTutor
            ? Subject::all()->where('tutor_id', $loggedUser->id)
            : Subject::all();

        return \view(
            'dashboard.grades.edit',
            [
                'loggedUser' => $loggedUser,
                'grade' => $grade,
                'isTutor' => $isTutor,
                'tutors' => $tutors,
                'pupils' => $pupils,
                'subjects' => $subjects,
            ]
        );
    }

    public function update(UpdateGradeRequest $updateGradeRequest, SubjectsGrades $grade): RedirectResponse
    {
        $grade->grade = $updateGradeRequest->get('grade');

        if ($updateGradeRequest->has('pupil')) {
            $grade->pupil_id = $updateGradeRequest->get('pupil');
        }

        if ($updateGradeRequest->has('tutor')) {
            $grade->tutor_id = $updateGradeRequest->get('tutor');
        }

        if ($updateGradeRequest->has('subject')) {
            $grade->subject_id = $updateGradeRequest->get('subject');
        }

        $grade->save();

        return redirect()->route('grades.index')->with(
            'success',
            sprintf(
                'Pomyślnie zaktualizowano ocenę z %s dla %s',
                $grade->subject->name,
                $grade->pupil->name,
            )
        );
    }

    public function destroy(SubjectsGrades $grade): RedirectResponse
    {
        $grade->delete();

        return redirect()
            ->route('grades.index')
            ->with(
                'success',
                sprintf(
                    'Pomyślnie usunięto ocenę z %s dla %s',
                    $grade->subject->name,
                    $grade->pupil->name,
                )
            )
        ;;
    }
}
