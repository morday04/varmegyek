@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #f8f9fa; /* Világosszürke háttér */
        }

        .card {
            margin-top: 20px;
            border: 1px solid #ddd; /* Szürke keret */
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Árnyék */
        }

        .card-header {
            background-color: #343a40; /* Sötét szürke */
            color: white;
            padding: 15px;
            border-bottom: 1px solid #23272b; /* Sötétebb szürke */
            text-align: center; /* Középre igazítás */
        }

        .card-body {
            padding: 20px;
        }
        .card-body img {
            max-width: 100%; 
            height: auto; 
            display: block; 
            margin: 0 auto; 
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Otthon</h2>
                    </div>

                    <div class="card-body">
                        {{-- Tartalom --}}
                        <img src="jh.jpg" alt="Aint no way">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
