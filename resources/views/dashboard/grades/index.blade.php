@php use App\Enums\UserRoleEnum; @endphp
@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="login-logo">
                        <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                    </div>

                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h1 id="grade-table" class="card-title">{{ $pageTitle }}</h1>
                                        </div>

                                        <div class="card-body">
                                            @if($canAddGrades)
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row justify-content-end">
                                                            <div class="col-md-auto">
                                                                <a href="{{ route('grades.create') }}">
                                                                    <button type="button" class="btn btn-primary btn-sm"
                                                                            data-placement="bottom"
                                                                            title="Dodaj użytkownika">
                                                                        <i class="fas fa-user-plus"></i>Wystaw ocenę
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="row">
                                                <table id="grade-table"
                                                       class="table table-bordered table-hover mt-3">
                                                    <thead>
                                                    <tr>
                                                        <th>Ocena</th>

                                                        @if(!$loggedUser->hasRole(UserRoleEnum::Tutor))
                                                            <th>Nauczyciel</th>
                                                        @endif
                                                        @if(!$loggedUser->hasRole(UserRoleEnum::Pupil))
                                                            <th>Uczeń</th>
                                                        @endif
                                                        <th>Przedmiot</th>
                                                        @if($canManageGrades)
                                                            <th style="width: 180px;">Akcje</th>
                                                        @endif
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @forelse ($grades as $grade)
                                                        <tr>
                                                            <th scope="row">{{ $grade->grade }}</th>
                                                            @if(!$loggedUser->hasRole(UserRoleEnum::Tutor))
                                                                <td>{{ $grade->subject->tutor->name }}</td>
                                                            @endif
                                                            @if(!$loggedUser->hasRole(UserRoleEnum::Pupil))
                                                                <td>{{ $grade->pupil->name  }}</td>
                                                            @endif

                                                            <td>{{ $grade->subject->name }}</td>
                                                            <td class="text-center">
                                                                @if($canManageGrades)
                                                                    <form
                                                                        action="{{ route('grades.destroy', $grade->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')

                                                                        <a href="{{ route('grades.edit', $grade->id) }}"
                                                                           class="btn btn-primary btn-sm">
                                                                            <i class="fas fa-user-edit"></i> Edytuj
                                                                        </a>

                                                                        <button type="submit"
                                                                                class="btn btn-danger btn-sm"
                                                                                onclick="return confirm('Czy chcesz ' +
                                                                                 'usunąć tę ocenę?');">
                                                                            <i class="fas fa-user-times"></i> Usuń
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <td colspan="3">
                                                        <span class="text-danger">
                                                            <strong>Brak wystawionych ocen</strong>
                                                        </span>
                                                        </td>
                                                    @endforelse

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            {{ $grades->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
@endsection
