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
                            <table id="tabla-boletines" name="tabla-boletines"
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
    var listar_boletines = '{{ route('documentacion.boletines.listar') }}';
@endpush

@push('scripts')
    {!! Html::script('js/modules/boletines.js') !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <script type="text/javascript">
       $('.confirm-button').click(function(event) {
        var form =  $(this).closest("form");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete this row?`,
            text: "It will gone forevert",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
    </script>

@endpush
