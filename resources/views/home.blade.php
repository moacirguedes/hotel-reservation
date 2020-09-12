@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            @if ($user->isManager)
                <div class="card">
                    <div class="card-header">{{ __('header.people') }}</div>
                    
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>{{ __('user.name') }}</th>
                                    <th>{{ __('user.email') }}</th>
                                    <th>{{ __('user.type') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ trans_choice('user.isManager', $user->isManager) }}</td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            
            <br>

            <div class="card">
                <div class="card-header">{{ __('header.hotels') }}</div>

                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>{{ __('hotel.name') }}</th>
                                <th>{{ __('hotel.address') }}</th>
                                <th>{{ __('hotel.stars') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($hotels as $hotel) : ?>
                                <tr>
                                    <td>{{ $hotel->name }}</td>
                                    <td>{{ $hotel->address }}</td>
                                    <td>{{ $hotel->stars }}</td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
