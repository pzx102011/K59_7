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
                                            <h1 id="grade-table" class="card-title">Zarządzaj przedmiotami</h1>
                                        </div>
                                        @if(session('success'))
                                            <div class="row">
                                                <div class="col-2"></div>
                                                <div class="col-8">
                                                    <div class="alert alert-success" style="text-align: center;">
                                                        {!! session('success') !!}
                                                    </div>
                                                </div>
                                                <div class="col-2"></div>
                                            </div>
                                        @endif
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row justify-content-end">
                                                        <div class="col-md-auto">
                                                            <a href="{{ route('subjects.create') }}">
                                                                <button type="button" class="btn btn-primary btn-sm"
                                                                        data-placement="bottom"
                                                                        title="Utwórz przedmiot">
                                                                    <i class="fas fa-user-plus"></i>Utwórz przedmiot
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <table id="grade-table"
                                                       class="table table-bordered table-hover mt-3">
                                                    <thead>
                                                    <tr>
                                                        <th>Przedmiot</th>
                                                        <th>Nauczyciel</th>
                                                        <th style="width: 180px;">Akcje</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @forelse ($subjects as $subject)
                                                        <tr>
                                                            <td>{{ $subject->name }}</td>
                                                            <td>{{ $subject->tutor->name }}</td>

                                                            <td class="text-center">
                                                                <form
                                                                        action="{{ route('subjects.destroy', $subject->id) }}"
                                                                        method="post">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <a href="{{ route('subjects.edit', $subject->id) }}"
                                                                       class="btn btn-primary btn-sm">
                                                                        <i class="fas fa-user-edit"></i> Edytuj
                                                                    </a>

                                                                    <button type="submit"
                                                                            class="btn btn-danger btn-sm"
                                                                            onclick="return confirm('Czy chcesz ' +
                                                                                 'usunąć ten przedmiot?');">
                                                                        <i class="fas fa-user-times"></i> Usuń
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <td colspan="3">
                                                        <span class="text-danger">
                                                            <strong>Brak przedmiotów</strong>
                                                        </span>
                                                        </td>
                                                    @endforelse

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            {{ $subjects->links() }}
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
