@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('hotel.update') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('hotels.update', $hotel->id) }}">
                        {!! csrf_field() !!} {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('hotel.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $hotel->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('hotel.address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" value="{{ $hotel->address }}" name="address" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stars" class="col-md-4 col-form-label text-md-right">{{ __('hotel.stars') }}</label>

                            <div class="col-md-6">
                                <input id="stars" type="number" class="form-control" name="stars" required min=1 max=5 value="{{ $hotel->stars }}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('hotel.update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
