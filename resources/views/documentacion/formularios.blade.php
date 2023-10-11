@extends('layouts.app')

@section('title', __('outlet.documentacion'))

@section('content')
<div class="container" >
    <div class="row">
        <div class="col-md-12">
            <div class="card text-center border-0">
                <div class="card border-0 bg-teal text-center mb-2">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabla-formularios" name="tabla-formularios"
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
    var listar_formularios = '{{ route('documentacion.form.listar') }}';
@endpush

@push('scripts')
    {!! Html::script('js/modules/formularios.js') !!}
   
@endpush
