@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('reservation.new') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('reservations.store', $hotel->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="checkin" class="col-md-4 col-form-label text-md-right">{{ __('reservation.checkin') }}</label>

                            <div class="col-md-6">
                                <input id="checkin" type="date" class="form-control" name="checkin" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="checkout" class="col-md-4 col-form-label text-md-right">{{ __('reservation.checkout') }}</label>

                            <div class="col-md-6">
                                <input id="checkout" type="date" class="form-control" name="checkout" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rooms" class="col-md-4 col-form-label text-md-right">{{ __('reservation.rooms') }}</label>

                            <div class="col-md-6">
                                <select multiple="multiple" name="rooms[]" id="rooms" class="form-control">
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">{{ __('reservation.details', ['price' => $room->price, 'beds' => $room->beds]) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('reservation.create') }}
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
