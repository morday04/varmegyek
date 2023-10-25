@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form method="post" action="{{ route('saveType') }}" accept-charset="UTF-8">
                        @csrf
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6"><strong>{{ __(sprintf("Új %s típus", $manufacturer->name)) }}</strong></div>
                                <div class="col-6 flex logo">
                                    @if(! empty($logo))
                                        <img id="logo" src="{{$logo}}" alt="logo">
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
                                            <div class="col-12" style="padding-top: 0">
                                                <div class="row" style="margin-left: 15px;">
                                                    <input type="hidden" name="id_manufacturer" value="{{$manufacturer->id}}">
                                                    <div class="row"><label for="name"><strong>Név</strong></label><input type="text" name="name" required></div>
                                                </div>
                                            </div>
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
                                <a class="btn" href="{{ route('getTypesFilter', ['id_manufacturer' => $manufacturer->id]) }}"><i class="fa fa-ban"></i>&nbsp;{{__('Mégse')}}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
