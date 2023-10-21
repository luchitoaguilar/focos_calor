@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Editar') }}</div>
                    <div class="card-body">
                        @isset($mensaje)
                            @if ($mensaje == 'success')
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Se Guardo en Usuario Correctamente......!</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @else
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Ocurrio algun problema......contactese con el Administrador</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        @endisset

                        <form method="POST" action="{{ route('documentacion.update') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <input type="hidden" id="id" name="id" value="{{ $documentacion->id }}">
                                <input type="hidden" id="docArchivo" name="docArchivo" value="{{ $documentacion->archivo }}">
                                <div class="form-group col-md-6">
                                    <label for="descripcion" class="col-md-4 col-form-label">{{ __('Descripcion') }}</label>
                                    <input id="descripcion" type="text"
                                        class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}"
                                        name="descripcion" value="{{ old('descripcion', $documentacion->descripcion) }}">

                                    @if ($errors->has('descripcion'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('descripcion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fecha" class="col-md-4 col-form-label">{{ __('E-Mail') }}</label>

                                    <input id="fecha" type="date"
                                        class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha"
                                        value="{{ old('fecha', $documentacion->fecha) }}" required>

                                    @if ($errors->has('fecha'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('fecha') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tipo" class="control-label">{{ __('outlet.tipo') }}</label>
                                        <select class="form-control formNuevo" name="tipo" id='tipo'>
                                            <option>Seleccione el nivel</option>
                                            <option value="PON" {{ $documentacion->tipo == 'PON' ? 'selected' : '' }}>
                                                Planes y P.O.N</option>
                                            <option value="NNVVAA"
                                                {{ $documentacion->tipo == 'NNVVAA' ? 'selected' : '' }}>Bases legales y
                                                resoluciones
                                            </option>
                                            <option value="NNSS" {{ $documentacion->tipo == 'NNSS' ? 'selected' : '' }}>
                                                NN.VV.AA. y NN.SS.</option>
                                            <option value="Boletines"
                                                {{ $documentacion->tipo == 'Boletines' ? 'selected' : '' }}>Boletines
                                            </option>
                                            <option value="Formulario"
                                                {{ $documentacion->tipo == 'Formulario' ? 'selected' : '' }}>Formulario
                                                EDAN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="archivo" class="control-label">{{ __('outlet.archivo') }}</label>
                                        <input id="archivo"
                                            class="form-control{{ $errors->has('archivo') ? ' is-invalid' : '' }}"
                                            name="archivo" type="file" placeholder="Ingrese el archivo a ser empleado" />
                                        {!! $errors->first('archivo', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Actualizar Registro') }}
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

@push('scripts')
    <script>
        window.onload = function() {
            imprimirValor();
        }

        function imprimirValor() {

            var select = document.getElementById("rol_id");
            var div = document.getElementById("division");


            $('#division').on('change', function(e) {

                var dependencia = e.target.value;

                $.get('/outlets/unidad_dependiente/' + dependencia, function(data) {

                    $('#unidad').empty();

                    $.each(data, function(fetch, subCate) {
                        for (i = 0; i < subCate.length; i++) {
                            $('#unidad').append('<option value="' + subCate[i].id +
                                '">' +
                                subCate[i].nombre + '</option>');
                        }
                    })
                })
            });

            ///select de unidades
            $('#rol_id').on('change', function(e) {


                var dependencia = e.target.value;

                if (dependencia == 1) {
                    $("#divi").hide();
                    $("#uni").hide();

                }

                if (dependencia == 2) {
                    $("#divi").show();
                    $("#uni").hide();

                }

                if (dependencia == 3) {
                    $("#divi").show();
                    $("#uni").show();

                    $('#division').on('change', function(e) {

                        var dependencia = e.target.value;

                        $.get('/outlets/unidad_dependiente/' + dependencia, function(data) {

                            $('#unidad').empty();

                            $.each(data, function(fetch, subCate) {
                                for (i = 0; i < subCate.length; i++) {
                                    $('#unidad').append('<option value="' + subCate[i].id +
                                        '">' +
                                        subCate[i].nombre + '</option>');
                                }
                            })
                        })
                    });
                }
            });
        }
    </script>
@endpush
