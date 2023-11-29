@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #f8f9fa; border: none; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    <form method="post" action="{{ route('saveVarmegye') }}" accept-charset="UTF-8">
                        @csrf
                        <div class="card-header" style="background-color: #343a40; color: white; padding: 15px; border-bottom: 1px solid #23272b; text-align: center;">
                            <h2>{{ __('Új Vármegye') }}</h2>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="name" style="color: #495057;"><strong>Név</strong></label>
                                <input type="text" name="name" required class="form-control" style="background-color: #ffffff; color: #495057; border: 1px solid #ced4da; border-radius: 4px; padding: 8px;">
                            </div>
                        </div>
                        <div class="card-footer row text-center" style="margin-left: 0; margin-right: 0; background-color: #f8f9fa; border-top: 1px solid #dee2e6;">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary" style="background-color: #007BFF; border: none;"><i class="fa fa-save"></i>&nbsp;{{__('Mentés')}}</button>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-secondary" href="{{ route('varmegyek') }}" style="background-color: #6c757d; border: none;"><i class="fa fa-ban"></i>&nbsp;{{__('Mégse')}}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
