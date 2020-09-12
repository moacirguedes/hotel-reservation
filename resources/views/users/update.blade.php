@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('user.update') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        {!! csrf_field() !!} {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="ismanager" class="col-md-4 col-form-label text-md-right">{{ __('user.manager?') }}</label>

                            <div class="col-md-6">
                                <select name="ismanager" id="ismanager" class="form-control">
                                    <option value=0>{{ __('user.no') }}</option>
                                    <option value=1 {{ $user->isManager ? 'selected' : '' }}>{{ __('user.yes') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('user.edit') }}
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
