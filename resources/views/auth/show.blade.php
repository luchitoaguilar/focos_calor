<?php phpinfo(); ?>
@extends('layouts.app')

@section('title', __('outlet.detail'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('outlet.detail') }}</div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td>{{ __('outlet.name') }}</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('outlet.email') }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('outlet.rol') }}</td>
                                <td>{{ $user->rol }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('outlet.div_id') }}</td>
                                <td>{{ $user->divi }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('outlet.uni_id') }}</td>
                                <td>{{ $user->uni }}</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    @can('update', $user)
                        <a href="{{ route('register.edit', $user->userId) }}" id="edit-outlet-{{ $user->userId }}"
                            class="btn btn-warning">{{ __('outlet.edit_user') }}</a>
                    @endcan
                    @if (auth()->check())
                        <a href="{{ route('register.index') }}" class="btn btn-link">{{ __('outlet.back_to_index') }}</a>
                    @else
                        <a href="{{ route('outlet_map.index') }}"
                            class="btn btn-link">{{ __('outlet.back_to_index') }}</a>
                    @endif
                </div>
            </div>
        </div>

    </div>



@endsection

