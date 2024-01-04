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
        display: flex;
        justify-content: flex-end;
        margin-bottom: 10px; 
        }

        .search-container form {
            display: flex;
            width: 90%;
            margin: 0; 
        }

        .search-container input {
            flex: 1;
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
            margin-left: 35px;
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
                                <tr>
                                    <td colspan="3">
                                        <div class="search-container">
                                            <form method="post" action="{{ route('searchVarmegyek') }}" accept-charset="UTF-8">
                                                @csrf
                                                <input type="text" name="needle" placeholder="{{ __('Keresés') }}">
                                                <button class="btn" type="submit"><i class="fa fa-search"></i>{{ __('Keres') }}</button>
                                            </form>
                                        </div>
                                    </td>
                                    
                                </tr>
                                <tr id="editor" style="display:none">
                                    <form method="post" action="{{ route('saveVarmegye') }}" accept-charset="UTF-8">
                                        <td colspan="3">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="hidden" name="id" id="id" value="">
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="search" name="name" id="edit-box" value="" required class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;{{__('Mentés')}}</button>
                                                    <a class="btn btn-secondary" href="{{ route('varmegyek') }}" style="background-color: #6c757d; border: none;"><i class="fa fa-ban"></i>&nbsp;{{__('Mégse')}}</a>
                                                </div>
                                            </div>
                                        </td>
                                    </form>
                                </tr>
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
