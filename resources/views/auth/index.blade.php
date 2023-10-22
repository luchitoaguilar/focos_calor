@extends('layouts.app')

@section('title', __('outlet.list'))

@section('content')

    <div class="container col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card text-center border-0">
                    <div class="card border-0 bg-teal text-center mb-2">
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="float-right">
                                    @if(auth()->user()->rol_id == 1)
                                        <a href="{{ route('register.create') }}"
                                            class="btn btn-success">{{ __('outlet.create') }}</a>
                                    @endif
                                </div>
                            </div>
                            <br>

                            <div class="table-responsive">
                                <img src="{{ asset('smatife.png') }}" alt="Trulli" width="300" height="100">
                                <table id="tabla-usuario" name="tabla-usuario"
                                    class="table table-striped table-bordered align-middle">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('variables')
    var auth = {!! Auth::user() !!};
    var listar_usuarios = '{{ route('register.listar') }}';
@endpush

@push('scripts')
    {!! Html::script('js/modules/usuarios.js') !!}

    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
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
