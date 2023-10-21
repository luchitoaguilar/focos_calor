@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Registrar') }}</div>
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

                        <form method="POST" action="{{ route('register.update') }}">
                            @csrf
                            <div class="form-row">
                                <input id="id_user" type="text"
                                        class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id_user"
                                        value="{{ old('id', $users->id) }}" readonly hidden>
                                <div class="form-group col-md-6">
                                    <label for="name"
                                        class="col-md-4 col-form-label">{{ __('Nombre y Apellido') }}</label>
                                    <input id="name" type="text"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                        value="{{ old('name', $users->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email" class="col-md-4 col-form-label">{{ __('E-Mail') }}</label>

                                    <input id="email" type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                        value="{{ old('email', $users->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

                                    <input id="password" type="password" 
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>


                                    <input id="password-confirm" type="password"
                                        class="form-control{{ $errors->has('password-confirm') ? ' is-invalid' : '' }}"
                                        name="password_confirmation" >

                                </div>
                            </div>
                            <label for="latitude" class="control-label" style="color: red">Deje en blanco la contraseña si no desea actualizar este dato</label>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputState">Rol</label>
                                    <select onChange="imprimirValor()"
                                        class="selectpicker form-control{{ $errors->has('rol') ? ' is-invalid' : '' }}"
                                        id="rol_id" name="rol_id" value="{{ old('rol_id', $users->rol_id) }}">
                                        <option value=""> Selecciona un Rol </option>
                                        @isset($roles)
                                            @foreach ($roles as $roles)
                                                <option value="{{ old('rol_id', $roles->id) }}"
                                                    {{ $roles->id == $users->rol_id ? 'selected="selected"' : '' }} required>
                                                    {{ $roles->rol }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" style="display: " id="divi" name="divi">
                                        <label for="latitude" class="control-label">{{ __('outlet.division') }}</label>
                                        <select
                                            class="selectpicker form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}"
                                            id="division" name="division">
                                            <option value=""> Selecciona una Division </option>
                                            @foreach ($divisiones as $divisiones)
                                                <option value="{{ old('division', $divisiones->id) }} "
                                                    {{ $divisiones->id == $users->div_id ? 'selected="selected"' : '' }}
                                                    required>
                                                    {{ $divisiones->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" style="display: " id="uni" name="uni">
                                        <label for="unidad" class="control-label">{{ __('outlet.unidad') }}</label>
                                        <select class="form-control formNuevo" name="unidad" id='unidad'>
                                            <option value=""> Selecciona una Division </option>
                                            @foreach ($unidades as $unidades)
                                                <option value="{{ old('unidad', $unidades->id) }} "
                                                    {{ $unidades->id == $users->uni_id ? 'selected="selected"' : '' }}
                                                    required>
                                                    {{ $unidades->nombre }}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('unidad', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            <label for="latitude" class="control-label" style="color: red">*Debe seleccionar un rol para
                                realizar las modificaciones a este usuario</label>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrar') }}
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
