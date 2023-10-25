@extends('layouts.app')
{{-- resources/views/home.blade.php --}}
{{--{{ Breadcrumbs::render('login') }}--}}

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form method="post" action="{{ route('updateClient', $entity->id) }}" accept-charset="UTF-8">
                        @csrf
                        @method('patch')
                        <div class="card-header">{{ __('Karosszéria módosítása') }} (#{{$entity->id}})</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div>
                                <div class="table table-active">
                                    <div>
                                        <div class="row" style="margin-left: 15px;">
                                            <div class="row">
                                                <label for="name"><strong>Név</strong></label>
                                                <input type="text" name="name" value="{{ $entity->name }}" required>
                                            </div>
                                            <div class="row">
                                                <label for="email"><strong>Email</strong></label>
                                                <input type="email" name="email" value="{{ $entity->email }}" required>
                                            </div>

                                            <div class="row">
                                                <label for="phone_number"><strong>Telefonszám</strong></label>
                                                <input type="text" name="phone_number" value="{{ $entity->phone_number }}" required>
                                            </div>
                                            <div class="row">
                                                <label for="address"><strong>Cím</strong></label>
                                                <input type="text" name="address" value="{{ $entity->address }}" required>
                                            </div>
                                            <div class="row">
                                                <label for="notes"><strong>Megjegyzés</strong></label>
                                                <input type="notes" name="notes" value="{{ $entity->notes }}" required>
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
                                <a class="btn" href="{{ route('clients') }}#{{$entity->id}}"><i class="fa fa-ban"></i>&nbsp;{{__('Mégse')}}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
