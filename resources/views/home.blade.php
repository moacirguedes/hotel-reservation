@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if ($user->isManager)
                    <div class="card">
                        <div class="card-header flex justifysb">
                            <div>{{ __('header.people') }}</div>
                            <a href="{{ url('/users/create') }}" class="btn-xs btn-info btn">{{ __('user.new') }}</a>
                        </div>

                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>{{ __('user.name') }}</th>
                                        <th>{{ __('user.email') }}</th>
                                        <th>{{ __('user.type') }}</th>
                                        <th>{{ __('user.edit') }}</th>
                                        <th>{{ __('user.delete') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ trans_choice('user.isManager', $user->isManager) }}</td>
                                        <td>
                                            <a 
                                                href="{{ url('/users/' . $user->id . '/edit') }}"
                                                class="btn-xs btn-info btn">
                                                {{ __('user.edit') }}
                                            </a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                                {!! csrf_field() !!} {{ method_field('DELETE') }}
                                                <button 
                                                    type="submit"
                                                    class="btn-xs btn-info btn"
                                                    {{ $user->id == auth()->user()->id ? 'disabled' : '' }}
                                                >
                                                    {{ __('user.delete') }}     
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

                <br>

                <div class="card">
                    <div class="card-header flex justifysb">
                        <div>{{ __('header.hotels') }}</div>
                        @if ($user->isManager)
                            <a href="{{ url('/hotels/create') }}" class="btn-xs btn-info btn">{{ __('hotel.new') }}</a>
                        @endif
                    </div>

                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>{{ __('hotel.name') }}</th>
                                    <th>{{ __('hotel.address') }}</th>
                                    <th>{{ __('hotel.stars') }}</th>
                                    <th>{{ __('hotel.rooms') }}</th>
                                    @if ($user->isManager)
                                        <th>{{ __('hotel.edit') }}</< /th>
                                        <th>{{ __('hotel.delete') }}</< /th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($hotels as $hotel): ?>
                                <tr>
                                    <td>{{ $hotel->name }}</td>
                                    <td>{{ $hotel->address }}</td>
                                    <td style="text-align: center">{{ $hotel->stars }}</td>
                                    <td><a href="" class="btn-xs btn-info btn">Quartos</a></td>
                                    @if ($user->isManager)
                                        <td>
                                            <a href="{{ url('/hotels/' . $hotel->id . '/edit') }}"
                                                class="btn-xs btn-info btn">
                                                {{ __('hotel.edit') }}
                                            </a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('hotels.destroy', $hotel->id) }}">
                                            {!! csrf_field() !!} {{ method_field('DELETE') }}
                                                <button type="submit"
                                                    class="btn-xs btn-info btn">{{ __('hotel.delete') }}
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
