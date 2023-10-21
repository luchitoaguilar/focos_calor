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
                                <td>{{ __('outlet.descripcion') }}</td>
                                <td>{{ $documentacion->descripcion }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('outlet.tipo') }}</td>
                                <td>{{ $documentacion->tipo }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('outlet.fecha') }}</td>
                                <td>{{ $documentacion->fecha }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('outlet.archivo') }}</td>
                                <td><embed src="{{ asset("$documentacion->archivo") }}" type="application/pdf" width="100%" height="400px" /></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    @if(auth()->user()->rol_id == 1)
                        <a href="{{ route('documentacion.edit', $documentacion) }}" id="edit-outlet-{{ $documentacion->id }}"
                            class="btn btn-warning">{{ __('outlet.edit_doc') }}</a>
                    @endif
                    @if (auth()->check())
                        <a href="{{ route('documentacion.index') }}" class="btn btn-link">{{ __('outlet.back_to_index') }}</a>
                    @else
                        <a href="{{ route('outlet_map.index') }}"
                            class="btn btn-link">{{ __('outlet.back_to_index') }}</a>
                    @endif
                </div>
            </div>
        </div>

    </div>



@endsection

