@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="login-logo">
                    <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                </div>
                <!-- /.login-logo -->

                <div class="card">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg">Zaloguj się</p>

                        <form method="post" action="{{ route('login.authenticate') }}">
                            @csrf

                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email"
                                       value="{{ old('email') }}" required autofocus>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Hasło" name="password"
                                       required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-8">
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Zaloguj się</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
