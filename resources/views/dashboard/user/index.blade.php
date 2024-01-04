@php use App\Enums\UserRoleEnum; @endphp
@extends('layouts.app')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
        </div>

        <div class="card">
            <h1>Jestę indeksę userę</h1>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">S#</th>
                    <th scope="col">Name</th>
                    <th scope="col" style="width: 250px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('users.index', $user->id) }}" class="btn btn-warning btn-sm"><i
                                        class="bi bi-eye"></i> Show</a>

                                @if ($user->role ==='Super Admin')
                                    <a href="{{ route('roles.edit', $user->id) }}" class="btn btn-primary btn-sm"><i
                                            class="bi bi-pencil-square"></i> Edit</a>

                                    @if ($user->name!=Auth::user()->hasRole($user->name))
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Do you want to delete this role?');"><i
                                                class="bi bi-trash"></i> Delete
                                        </button>
                                    @endcan
                                @endif

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
