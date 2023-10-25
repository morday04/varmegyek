@extends('layouts.app')
{{-- resources/views/home.blade.php --}}
{{--{{ Breadcrumbs::render('login') }}--}}

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form method="post" action="{{ route('updateVehicle', $entity->id) }}" accept-charset="UTF-8">
                        @csrf
                        @method('patch')
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6"><strong>{{ __('Jármű adatainak módosítása') }} (#{{$entity->id}})</strong></div>
                                <div class="col-6 flex logo">
                                    @if(! empty($logo))
                                        <img  id="logo" src="{{$logo}}" alt="logo">
                                    @else
                                        <img src="" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div>
                                <div class="table table-active">
                                    <div>
                                        <div class="row">
                                            <div class="col-4"><label for="registration_plate"><strong>Rendszám</strong></label></div>
                                            <div class="col-4"><label for="vin"><strong>Alvázszám</strong></label></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4" style="padding-top: 0">
                                                <input type="text" name="registration_plate" id="registration_plate" pattern="[a-zA-Z0-9-]+" style="text-transform: uppercase; width:100%" required value="{{ $entity->registration_plate }}">
                                            </div>
                                            <div class="col-4" style="padding-top: 0">
                                                <input type="text" name="vin" id="vin" pattern="[a-zA-Z0-9]+" style="text-transform: uppercase; width:100%" required value="{{ $entity->vin }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4"><label for="id_manufacturer">Gyártó</label></div>
                                            <div class="col-4"><label for="id_type">Típus</label></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4" style="padding-top: 0">
                                                <select name="id_manufacturer" id="select-manufacturer" style="width:100%">
                                                    <option value="0">-- Válassz --</option>
                                                    @foreach ($manufacturers as $manufacturer)
                                                        <option value="{{$manufacturer->id}}" {{($entity->id_manufacturer == $manufacturer->id ? 'selected' : '')}}>{{$manufacturer->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-4" style="padding-top: 0">
                                                <select name="id_type" id="select-type" style="width:100%">
                                                    <option value="0">-- Válassz --</option>
                                                    @foreach ($types as $type)
                                                        <option value="{{$type->id}}" {{($entity->id_type == $type->id ? 'selected' : '')}}>{{$type->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4"><label for="valid_until">Forgalmi érvényes</label></div>
                                            <div class="col-4"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4" style="padding-top: 0">
{{--                                                <input type="date" name="valid_until" placeholder="yyyy-mm-dd" value="{{$entity->valid_until}}" width="25%">--}}
                                                <input type="text" name="valid_until" placeholder="éééé-hh-nn" value="{{$entity->valid_until}}" pattern="[0-9-]+">
                                            </div>
                                            <div class="col-4"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4"><label for="fuel">Üzemanyag</label></div>
                                            <div class="col-4"><label for="id_cassis">Karosszéria</label></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4" style="padding-top: 0">
                                                <select name="id_fuel" style="width:100%">
                                                    @foreach ($fuels as $key => $value)
                                                        <option value="{{$value->id}}" {{($entity->id_fuel == $value->id ? 'selected' : '')}}>{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-4" style="padding-top: 0">
                                                <select name="id_cassis" id="select-cassis" style="width:100%">
                                                    <option value="0">-- Válassz --</option>
                                                    @foreach ($cassises as $value)
                                                        <option value="{{$value->id}}" {{($entity->id_cassis == $value->id ? 'selected' : '')}}>{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12"><label for="notes">Megjegyzés</label></div>
                                            <div class="col-12" style="padding-top: 0"><textarea name="notes" rows="5" style="width: inherit">{{ $entity->notes }}</textarea></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer row text-center" style="margin-left: 0; margin-right: 0">
                            <div class="col-auto">
                                <button type="submit" class="btn"><i class="fa fa-save"></i>&nbsp;{{__('Mentés')}}</button>
                            </div>
                            <div class="col-auto">
                                <a class="btn" href="{{ route('vehicles') }}#{{$entity->id}}"><i class="fa fa-ban"></i>&nbsp;{{__('Mégse')}}</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
