@php use App\Enums\UserRoleEnum; @endphp
@extends('layouts.app')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            <h2>Utwórz użytkownika</h2>
                        </div>
                        <div class="float-end">
                            <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">&#8656; Wstecz</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf

                            <div class="mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-md-end text-start">Login</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name" value="">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-md-4 col-form-label text-md-end text-start">Adres
                                    email</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email" value="">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-md-4 col-form-label text-md-end
                                text-start">Hasło</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           id="password" name="password" value="">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="roles" class="col-md-4 col-form-label text-md-end
                                text-start">Rola</label>
                                <div class="col-md-6">
                                    <select class="form-select @error('role') is-invalid @enderror"
                                            aria-label="Roles" id="role" name="role"
                                            style="height: 210px;">
                                        @forelse ($availableRoles as $role)
                                            <option
                                                value="{{ $role->id }}">
                                                {{ $role->name }}
                                            </option>
                                        @empty

                                        @endforelse
                                    </select>
                                    @if ($errors->has('role'))
                                        <span class="text-danger">{{ $errors->first('role') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Utwórz">
                            </div>

                        </form>
                    </div>
                </div>
                <!-- /.login-box -->
@endsection
