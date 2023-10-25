@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form method="post" action="/types/filter" accept-charset="UTF-8">
                        @csrf
                        <div class="container-fluid">
                            <div class="row" style="margin-top: 5px; margin-left:5px">
                                <div class="col-6">
                                    <select name="id_manufacturer" id="filter-manufacturer">
                                        <option value="0">-- Válassz gyártót --</option>
                                        @foreach ($manufacturers as $manufacturer)
                                            <option value="{{$manufacturer->id}}" {{($manufacturer->id == $idManufacturer ? 'selected' : '')}}>{{$manufacturer->name}}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn" type="submit"><i class="fa fa-filter"></i>OK</button>
                                </div>
                                <div class="col-6 logo">
                                    @if(! empty($logo))
                                        <img id="logo" src="{{$logo}}" alt="logo">
                                    @else
                                        <img src="" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-header">
                        <div style="display: inline-block; float:left">
                            <strong>{{ __('Autó típusok') }}</strong>
                        </div>
                        <div style="display: inline-block; float:right">
                            <form method="post" action="{{route('searchTypes')}}" accept-charset="UTF-8">
                                @csrf
                                <input type="hidden" name="id_manufacturer" value="{{$idManufacturer}}">
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
                                        <th class="search-field">Megnevezés</th>
                                        <th>Művelet&nbsp;
                                            <a href="/type/create?id_manufacturer={{$idManufacturer}}"><i class="fa fa-plus"></i>+</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($entities as $entity)
                                    <tr>
                                        <td id="{{ $entity->id }}">{{$entity->id}}</td>
                                        <td>{{$entity->name}}</td>
                                        <td style="display: flex">
                                            <form method="post" action="{{ route('editType', $entity->id) }}"><button class="btn btn-sm" type="submit"><i class="fa fa-edit"></i>Módosít</button>
                                                @csrf
                                            </form>
                                            <form method="post" action="{{ route('deleteType', $entity->id) }}"><button class="btn btn-sm" type="submit"><i class="fa fa-trash"></i>Töröl</button>
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
