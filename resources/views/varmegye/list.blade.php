@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #f8f9fa; 
        }

        .card-header.fo {
            background-color: #343a40; 
            color: white;
            padding: 15px;
            border-bottom: 1px solid #23272b; 
            text-align: center; 
        }

        .container {
            margin-top: 20px;
        }

        h2 {
            font-size: 1.5em; 
        }

        .search-container {
            display: inline-block;
            float: right;
        }

        .search-container form {
            margin-bottom: 0;
        }

        .search-container input {
            padding: 8px;
            border: 1px solid #aebfd1; 
            border-radius: 4px;
            margin-right: 5px;
        }

        .search-container button {
            padding: 8px 15px;
            background-color: #007BFF; 
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle; 
        }

        .action-btns button {
            width: 100%; 
            margin-bottom: 5px;
        }

        
        .btn-info {
            background-color: #17a2b8; 
        }

        
        .btn-danger {
            background-color: #dc3545; 
            color: white;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fo">
                        <h2>{{ __('Vármegye') }}</h2>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="search-container">
                            <form method="post" action="{{ route('searchVarmegyek') }}" accept-charset="UTF-8">
                                @csrf
                                <input type="text" name="needle" placeholder="{{ __('Keresés') }}">
                                <button class="btn" type="submit"><i class="fa fa-search"></i>{{ __('Keres') }}</button>
                            </form>
                        </div>

                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th class="search-field">{{ __('Megnevezés') }}</th>
                                    <th>
                                        {{ __('Művelet') }}
                                        <a href="{{ route('createVarmegye') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> {{ __('ÚJ') }}</a>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($entities as $entity)
                                    <tr>
                                        <td id="{{ $entity->id }}">{{ $entity->id }}</td>
                                        <td>{{ $entity->name }}</td>
                                        <td class="action-btns">
                                            <form method="post" action="{{ route('editVarmegye', $entity->id) }}">
                                                <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-edit"></i> {{ __('Módosít') }}</button>
                                                @csrf
                                            </form>
                                            <form method="post" action="{{ route('deleteVarmegye', $entity->id) }}">
                                                <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i> {{ __('Töröl') }}</button>
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
