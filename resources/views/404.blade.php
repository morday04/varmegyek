@extends('layouts.app')
{{-- resources/views/home.blade.php --}}
{{--{{ Breadcrumbs::render('login') }}--}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        404 - A keresett oldal nem található.
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    {{ __('Kezelőpult') }}--}}
{{--                </div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                        <nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
{{--                            <a class="navbar-brand" href="#">CarLog</a>--}}
{{--                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                                <span class="navbar-toggler-icon"></span>--}}
{{--                            </button>--}}

{{--                            <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                                <ul class="navbar-nav mr-auto">--}}
{{--                                    <li class="nav-item active">--}}
{{--                                        <a class="nav-link" href="{{route('clients')}}">Ügyfelek</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" href="{{route('vehicles')}}">Járművek</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item dropdown">--}}
{{--                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                            Törzsadatok--}}
{{--                                        </a>--}}
{{--                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                                            <a class="dropdown-item" href="{{ route('vehicleCategories') }}">Jármű kategóriák</a>--}}
{{--                                            <a class="dropdown-item" href="#">Autómárkák</a>--}}
{{--                                            <a class="dropdown-item" href="#">Autó modellek</a>--}}
{{--                                            <a class="dropdown-item" href="#">Autó típusok</a>--}}
{{--                                            <div class="dropdown-divider"></div>--}}
{{--                                            <a class="dropdown-item" href="#">Felhasználók</a>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link disabled" href="#">Disabled</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </nav>--}}
{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>
@endsection
