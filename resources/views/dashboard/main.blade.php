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
                                            <h3 id="mail-table" class="card-title">Witaj w dzienniku ocen!</h3>
                                        </div>

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md">

                                                    <div class="text-center">
                                                        <img
                                                            src="https://cdn.pixabay.com/photo/2012/05/07/01/54/owl-47526_1280.png"
                                                            style="max-height: 50vh; max-width: 100%; height: auto;"
                                                        />
                                                    </div>

                                                </div>
                                            </div>
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
