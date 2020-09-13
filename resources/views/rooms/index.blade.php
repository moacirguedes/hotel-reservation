@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header flex justifysb">
                        <div>{{ __('room.name') }}</div>

                        <a class="btn-xs btn-info btn" href="{{ route('reservations.create', $hotel->id) }}">{{ __('header.reservation') }}</a> 

                        <a class="btn-xs btn-info btn" href="{{ route('reservations.index', $hotel->id) }}">{{ __('reservation.viewReservation') }}</a> 


                        @if (auth()->user()->isManager)
                        <a href="{{ url('hotels/' . $hotel->id . '/rooms/create') }}" class="btn-xs btn-info btn">{{ __('room.new') }}</a>
                        @endif
                    </div>

                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>{{ __('room.price') }}</th>
                                    <th>{{ __('room.beds') }}</th>
                                    @if (auth()->user()->isManager)
                                        <th>{{ __('room.edit') }}</th>
                                        <th>{{ __('room.delete') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rooms as $room): ?>
                                <tr>
                                    <td>{{ __('room.currency') .' '. $room->price }}</td>
                                    <td>{{ $room->beds }}</td>
                                    @if (auth()->user()->isManager)
                                        <td>
                                            <a 
                                                href="{{ url('hotels/' . $hotel->id . '/rooms/' . $room->id . '/edit') }}"
                                                class="btn-xs btn-info btn">
                                                {{ __('room.edit') }}
                                            </a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('rooms.destroy', [$hotel->id, $room->id]) }}">
                                                {!! csrf_field() !!} {{ method_field('DELETE') }}
                                                <button 
                                                    type="submit"
                                                    class="btn-xs btn-info btn"
                                                >
                                                    {{ __('room.delete') }}     
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
