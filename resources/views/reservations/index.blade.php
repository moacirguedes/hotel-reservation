@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header flex justifysb">
                        <div>{{ __('reservation.name') }}</div>
                    </div>

                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>{{ __('reservation.checkin') }}</th>
                                    <th>{{ __('reservation.checkout') }}</th>
                                    <th>{{ __('reservation.totalprice') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reservations as $reservation): ?>
                                <tr>
                                    <td>{{ $reservation->check_in }}</td>
                                    <td>{{ $reservation->check_out }}</td>
                                    <td>{{ __('reservation.currency') . $reservation->total_price }}</td>
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
