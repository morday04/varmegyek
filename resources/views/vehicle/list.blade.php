@extends('layouts.app')
{{-- resources/views/home.blade.php --}}
{{--{{ Breadcrumbs::render('login') }}--}}

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: inline-block; float:left">
                            <strong>{{ __('Járművek') }}</strong>
                        </div>
                        <div style="display: inline-block; float:right">
                            <form method="post" action="{{route('searchVehicles')}}" accept-charset="UTF-8">
                                @csrf
                                <input type="text" name="needle" placeholder="Keresés"><button class="btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
{{--                    <div class="card-header">{{Breadcrumbs::render('vehicles')}}</div>--}}
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
                                        <th class="search-field">Rendszám</th>
                                        <th class="search-field">Alvázszám</th>
                                        <th class="search-field">Gyártó</th>
                                        <th class="search-field">Típus</th>
                                        <th>Üzemanyag</th>
                                        <th >Műszaki érv.</th>
                                        <th class="search-field">Megjegyzés</th>
                                        <th>Művelet&nbsp;
                                            <a href="{{route('createVehicle')}}"><i class="fa fa-plus"></i>+</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($entities as $entity)
                                    <tr>
                                        <td id="{{ $entity->id }}">{{ $entity->id }}</td>
                                        <td>{{ $entity->registration_plate }}</td>
                                        <td>{{ $entity->vin }}</td>
                                        <td>{{ $entity->manufacturer }}</td>
                                        <td>{{ $entity->type }}</td>
                                        <td>{{ $entity->fuel }}</td>

                                        @if ((strtotime($entity->valid_until) - time()) /60/60/24 < 0)
                                            <td style="color:red">{{ $entity->valid_until }}</td>
                                        @else
                                            @if ((strtotime($entity->valid_until) - time()) /60/60/24 < 30)
                                                <td style="background-color: yellow">{{ $entity->valid_until }}</td>
                                            @else
                                                <td>{{ $entity->valid_until }}</td>
                                            @endif
                                        @endif

                                        <td>{{ $entity->notes }}</td>
                                        <td style="display: flex">
                                                <form method="post" action="{{ route('editVehicle', $entity->id) }}"><button class="btn btn-sm" type="submit"><i class="fa fa-edit"></i>Módosít</button>
                                                    @csrf
                                                </form>
                                                <form method="post" action="{{ route('deleteVehicle', $entity->id) }}"><button class="btn btn-sm" type="submit"><i class="fa fa-trash"></i>Töröl</button>
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
    </div>
@endsection
