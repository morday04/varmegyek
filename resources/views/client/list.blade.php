@extends('layouts.app')
{{-- resources/views/home.blade.php --}}
{{--{{ Breadcrumbs::render('login') }}--}}

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div style="display: inline-block; float:left">
                            <strong>{{ __('Ügyfelek') }}</strong>
                        </div>
                        <div style="display: inline-block; float:right">
                               <form method="post" action="{{route('searchClients')}}" accept-charset="UTF-8">
                                @csrf
                                <input type="text" name="needle" placeholder="Keresés"><button class="btn" type="submit"><i class="fa fa-search"></i>Keres</button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    <div>
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th class="search-field">Név</th>
                                    <th class="search-field">Email</th>
                                    <th class="search-field">Telefonszám</th>
                                    <th class="search-field">Cím</th>
                                    <th class="search-field">Megjegyzés</th>
                                    <th>Művelet&nbsp;
                                        <a href="{{route('createClient')}}"><i class="fa fa-plus" title={{ __("ÚJ") }}>+</i></a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($entities as $entity)
                                <tr>
                                    <td id="{{ $entity->id }}">{{$entity->id}}</td>
                                    <td>{{$entity->name}}</td>
                                    <td>{{$entity->email}}</td>
                                    <td>{{$entity->phone_number}}</td>
                                    <td>{{$entity->address}}</td>
                                    <td>{{$entity->notes}}</td>
                                    <td style="display: flex">

                                        <form method="post" action="{{ route('editClient', $entity->id) }}">
                                            <button class="btn btn-sm" type="submit"><i class="fa fa-edit"></i>Módosít</button>
                                            @csrf
                                        </form>
                                        <form method="post" action="{{ route('deleteClient', $entity->id) }}">
                                            <button class="btn btn-sm" type="submit"><i class="fa fa-trash"></i>Töröl</button>
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <!--@if ($entity->notify && $entity->email)-->
                                            <form method="post" action="{{ route('sendValidUntilMail', $entity->id) }}">
                                                <button class="btn btn-sm" type="submit"><i class="fa fa-envelope"></i>Email</button>
                                                @csrf
                                            </form>
                                        <!--@endif-->

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
    </div>
    </div>
@endsection
