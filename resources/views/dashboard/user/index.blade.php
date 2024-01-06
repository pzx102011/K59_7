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
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 id="mail-table" class="card-title">Zarządzaj użytkownikami</h3>
                                        </div>

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row justify-content-end">
                                                        <div class="col-md-auto">
                                                            <a href="{{ route('users.create') }}">
                                                                <button type="button" class="btn btn-primary btn-sm"
                                                                        data-placement="bottom"
                                                                        title="Dodaj użytkownika">
                                                                    <i class="fas fa-user-plus"></i> Utwórz nowego
                                                                    użytkownika
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <table id="user-table"
                                                   class="table table-bordered table-hover mt-3">
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nazwa</th>
                                                    <th>Email</th>
                                                    <th>Rola</th>
                                                    <th style="width: 180px;"></th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @forelse ($users as $user)
                                                    <tr>
                                                        <th scope="row">{{ $user->id }}</th>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                                                        <td class="text-center">
                                                            <form action="{{ route('users.destroy', $user->id) }}"
                                                                  method="post">
                                                                @csrf
                                                                @method('DELETE')

                                                                <a href="{{ route('users.edit', $user->id) }}"
                                                                   class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-user-edit"></i> Edytuj
                                                                </a>

                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                        onclick="return confirm('Do you want to delete this user?');">
                                                                    <i class="fas fa-user-times"></i> Usuń
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


                                        </div>
                                        <div class="card-footer">
                                            {{ $users->links() }}
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
