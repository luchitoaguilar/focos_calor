@extends('layouts.app')

@section('title', __('outlet.documentacion'))

@section('content')
<div class="container" >
    <div class="row">
        <div class="col-md-12">
            <div class="card text-center border-0">
                <div class="card border-0 bg-teal text-center mb-2">
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="float-right">
                                @can('create', new App\Models\Outlet())
                                    <a href="{{ route('documentacion.create') }}" class="btn btn-success">{{ __('outlet.create') }}</a>
                                @endcan
                            </div>
                        </div>
                        <br>

                        <div class="table-responsive">
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
   
@endpush
