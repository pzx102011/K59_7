@php use App\Enums\UserRoleEnum; @endphp
@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-2"></div>
                <div class="col-lg-6 col-md-8 login-box">

                    <div class="login-logo">
                        <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                    </div>

                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">

                                    <form action="{{ route('grades.store') }}" method="post">
                                        @csrf
                                        @method("POST")

                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="modal-title" id="emailContactLabel">
                                                    Wystaw nową ocenę</h5>
                                            </div>

                                            @include('dashboard.grades.form')

                                            <div class="card-footer d-flex justify-content-end mt-3 p-3">
                                                <button type="submit"
                                                        class="btn btn-primary btn-actiontext-white mr-2">
                                                    Zapisz
                                                </button>

                                                <a href="{{ route('grades.index') }}">
                                                    <button type="button"
                                                            class="btn btn-secondary text-white"
                                                            data-dismiss="modal">Zamknij
                                                    </button>
                                                </a>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </div>
    </section>
@endsection
