@extends('layouts.app')

@section('title', __('outlet.list'))

@section('content')
<div class="container col-md-11" >
    <div class="row">
        <div class="col-md-12">
            <div class="card text-center border-0">
                <div class="card-header fw-bold bg-teal">
                    <h1 class="page-title"> <small>{{ __('app.total') }} : {{ $outlets->total() }}
                            {{ __('outlet.outlet') }}</small></h1>

                </div>
                <div class="card border-0 bg-teal text-center mb-2">
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="float-right">
                                @can('create', new App\Models\Outlet())
                                    <a href="{{ route('outlets.create') }}" class="btn btn-success">{{ __('outlet.create') }}</a>
                                @endcan
                            </div>
                        </div>
                        <br>

                        <div class="table-responsive">
                            <table id="tabla-focos-calor" name="tabla-focos-calor"
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
    var listar_focos = '{{ route('listar_outlets') }}';
@endpush

@push('scripts')
    {!! Html::script('js/modules/focos_calor.js') !!}

    <script type="text/javascript">
 console.log('here');
        $('.show_confirm').click(function(event) {
             var form =  $(this).closest("form");
             var name = $(this).data("name");
             event.preventDefault();
             Swal({
                 title: `Are you sure you want to delete this record?`,
                 text: "If you delete this, it will be gone forever.",
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
