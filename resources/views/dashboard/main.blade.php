@php use App\Enums\UserRoleEnum; @endphp
@extends('layouts.app')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
        </div>

        <div class="card">
            <h1>Jestę daszbordę</h1>
            <ul>
                @if($user->role === UserRoleEnum::Administrator)
                    <li><a href="{{route('')}}"></a></li>
                @endif
            </ul>
        </div>
    </div>
    <!-- /.login-box -->
@endsection
