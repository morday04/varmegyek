@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="post" action="{{ route('saveVarmegye') }}" accept-charset="UTF-8">
                    @csrf
                    <div class="card-header bg-primary text-white text-center">
                        <h4>{{ __('Új vármegye') }}</h4>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label"><strong>Név</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" required class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer row justify-content-between">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;{{__('Mentés')}}</button>
                        <a class="btn btn-secondary" href="{{ route('varmegyek') }}"><i class="fa fa-ban"></i>&nbsp;{{__('Mégse')}}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
