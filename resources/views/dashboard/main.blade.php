@php use App\Enums\UserRoleEnum; @endphp
@extends('layouts.app')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
        </div>

        <div class="card">
            <div class="card-header">
                <h1>Jestę daszbordę</h1>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    @if($user->hasRole(UserRoleEnum::Administrator))
                        <a href="{{route('users.index')}}" class="btn btn-primary btn-sm">Zarządzaj
                            użytkownikami</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /.login-box -->
@endsection
