@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('room.update') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('rooms.update', [$hotel->id, $room->id]) }}">
                        {!! csrf_field() !!} {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('room.price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" step="any" class="form-control" name="price" required autofocus value={{$room->price}}>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="beds" class="col-md-4 col-form-label text-md-right">{{ __('room.beds') }}</label>

                            <div class="col-md-6">
                                <input id="beds" type="number" class="form-control" name="beds"  required value={{$room->beds}}>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('room.edit') }}
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
