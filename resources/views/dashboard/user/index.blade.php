@php use App\Enums\UserRoleEnum; @endphp
@extends('layouts.app')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    <h2>Zarządzaj użytkownikami</h2>
                </div>
                <div class="float-end">
                    <a href="{{ route('dashboard.index') }}" class="btn btn-primary btn-sm">&#8656; Wróć do panelu</a>
                </div>
                <div class="float-end">
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Utwórz nowego</a>
                </div>
            </div>
            <h1>Jestę indeksę userę</h1>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Rola</th>
                    <th scope="col" style="width: 250px;">Akcje</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->getRoleNames()[0] }}</td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edytuj</a>

                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Do you want to delete this user?');"><i
                                        class="bi bi-trash"></i> Usuń
                                </button>

                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="3">
                        <span class="text-danger">
                            <strong>No Role Found!</strong>
                        </span>
                    </td>
                @endforelse
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
    <!-- /.login-box -->
@endsection
