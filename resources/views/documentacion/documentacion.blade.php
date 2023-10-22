@extends('layouts.app')

@section('title', __('outlet.documentacion'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card text-center border-0">
                    <div class="card border-0 bg-teal text-center mb-2">
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="float-right">
                                    @if (auth()->user()->rol_id == 1)
                                        <a href="{{ route('documentacion.create') }}"
                                            class="btn btn-success">{{ __('outlet.create') }}</a>
                                    @endif
                                </div>
                            </div>
                            <br>

                            <div class="table-responsive">
                                <img src="{{ asset('smatife.png') }}" alt="Trulli" width="300" height="100">
                                <table id="tabla-documentacion" name="tabla-documentacion"
                                    class="table table-striped table-bordered align-middle">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- begin includes -->
            {{-- @include('outlets.show') --}}
            <!-- end includes -->
        </div>
    </div>
@endsection

@push('variables')
    var auth = {!! Auth::user() !!};
    var listar_documentacion = '{{ route('documentacion.listar') }}';
@endpush

@push('scripts')
    {!! Html::script('js/modules/documentacion.js') !!}
    <style>
        .table thead th {
            background-color: #C6DBDA;
        }
    </style>
@endpush
