@extends('layouts.app')

@section('title', __('outlet.edit'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (request('action') == 'delete' && $outlet)
                @can('delete', $outlet)
                    <div class="card">
                        <div class="card-header">{{ __('outlet.delete') }}</div>
                        <div class="card-body">
                            <label class="control-label text-primary">{{ __('outlet.name') }}</label>
                            <p>{{ $outlet->name }}</p>
                            <label class="control-label text-primary">{{ __('outlet.descripcion') }}</label>
                            <p>{{ $outlet->descripcion }}</p>
                            <label class="control-label text-primary">{{ __('outlet.latitude') }}</label>
                            <p>{{ $outlet->latitude }}</p>
                            <label class="control-label text-primary">{{ __('outlet.longitude') }}</label>
                            <p>{{ $outlet->longitude }}</p>
                            <label class="control-label text-primary">{{ __('outlet.activo') }}</label>
                            <p>{{ $outlet->activo }}</p>
                            <label class="control-label text-primary">{{ __('outlet.archivo') }}</label>
                            <p>{{ $outlet->archivo }}</p>
                            <label class="control-label text-primary">{{ __('outlet.resumen') }}</label>
                            <p>{{ $outlet->resumen }}</p>
                            {!! $errors->first('outlet_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                        <hr style="margin:0">
                        <div class="card-body text-danger">{{ __('outlet.delete_confirm') }}</div>
                        <div class="card-footer">
                            <form method="POST" action="{{ route('outlets.destroy', $outlet) }}" accept-charset="UTF-8"
                                onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)"
                                class="del-form float-right" style="display: inline;">
                                {{ csrf_field() }} {{ method_field('delete') }}
                                <input name="outlet_id" type="hidden" value="{{ $outlet->id }}">
                                <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                            </form>
                            <a href="{{ route('outlets.edit', $outlet) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                        </div>
                    </div>
                @endcan
            @else
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('outlet.edit') }}</div>
                            <form method="POST" action="{{ route('outlets.update', $outlet) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                                {{ csrf_field() }} {{ method_field('patch') }}
                                <input type="hidden" id="id" name="id" value="{{ $outlet->id }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name" class="control-label">{{ __('outlet.name') }}</label>
                                        <input id="name" type="text"
                                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" value="{{ old('name', $outlet->name) }}" required>
                                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion"
                                            class="control-label">{{ __('outlet.descripcion') }}</label>
                                        <textarea id="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}"
                                            name="descripcion" rows="4">{{ old('descripcion', $outlet->descripcion) }}</textarea>
                                        {!! $errors->first('descripcion', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="division"
                                                    class="control-label">{{ __('outlet.division') }}</label>
                                                <select
                                                    class="selectpicker form-control{{ $errors->has('division') ? ' is-invalid' : '' }}"
                                                    id="division" name="division">
                                                    <option value=""> Selecciona una Division </option>
                                                    @foreach ($divisiones as $divisiones)
                                                        <option value="{{ $divisiones->id }}"
                                                            {{ $outlet->division == $divisiones->id ? 'selected' : '' }}
                                                            required>
                                                            {{ $divisiones->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="unidad"
                                                    class="control-label">{{ __('outlet.unidad') }}</label>
                                                <select class="form-control formNuevo" name="unidad" id='unidad'>
                                                    <option value=""> Selecciona una Unidad </option>
                                                </select>
                                                {!! $errors->first('unidad', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nivel"
                                                    class="control-label">{{ __('outlet.nivel') }}</label>
                                                <select class="form-control formNuevo" name="nivel" id='nivel'>
                                                    <option>Seleccione el nivel</option>
                                                    <option value="Primera Generación"
                                                        {{ $outlet->nivel == 'Primera Generación' ? 'selected' : '' }}>Primera Generación</option>
                                                    <option value="Segunda Generación"
                                                        {{ $outlet->nivel == 'Segunda Generación' ? 'selected' : '' }}>Segunda Generación
                                                    </option>
                                                    <option value="Tercera Generación"
                                                        {{ $outlet->nivel == 'Tercera Generación' ? 'selected' : '' }}>Tercera Generación</option>
                                                        <option value="Cuarta Generación"
                                                        {{ $outlet->nivel == 'Cuarta Generación' ? 'selected' : '' }}>Cuarta Generación</option>
                                                    <option value="Quinta Generación"
                                                        {{ $outlet->nivel == 'Quinta Generación' ? 'selected' : '' }}>Quinta Generación
                                                    </option>
                                                    <option value="Sexta Generación"
                                                        {{ $outlet->nivel == 'Sexta Generación' ? 'selected' : '' }}>Sexta Generación</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="unidad_apoyo"
                                                    class="control-label">{{ __('outlet.unidad_apoyo') }}</label>
                                                <select class="form-control formNuevo" name="unidad_apoyo" id='unidad_apoyo'
                                                    value="{{ old('unidad_apoyo', $outlet->unidad_apoyo) }}">
                                                    <option>Seleccione el tipo de Unidad</option>
                                                    <option value="1"
                                                        {{ $outlet->unidad_apoyo == '1' ? 'selected' : '' }}>Patrulla
                                                    </option>
                                                    <option value="2"
                                                        {{ $outlet->unidad_apoyo == '2' ? 'selected' : '' }}>Seccion
                                                    </option>
                                                    <option value="3"
                                                        {{ $outlet->unidad_apoyo == '3' ? 'selected' : '' }}>
                                                        Compañia</option>
                                                        <option value="4"
                                                        {{ $outlet->unidad_apoyo == '4' ? 'selected' : '' }}>
                                                        Regimiento</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="card" style="width: 100%;">
                                            <div class="card-header">
                                                Elementos de empleo
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="acciones"
                                                                    class="control-label">{{ __('outlet.acciones') }}</label>
                                                                <textarea id="acciones" class="form-control{{ $errors->has('acciones') ? ' is-invalid' : '' }}" name="acciones"
                                                                    rows="4">{{ old('acciones', $outlet->acciones) }}</textarea>
                                                                {!! $errors->first('acciones', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="rrhh"
                                                                    class="control-label">{{ __('outlet.rrhh') }}</label>
                                                                <textarea id="rrhh" class="form-control{{ $errors->has('rrhh') ? ' is-invalid' : '' }}" name="rrhh"
                                                                    rows="4">{{ old('rrhh', $outlet->rrhh) }}</textarea>
                                                                {!! $errors->first('rrhh', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="rr_log"
                                                                    class="control-label">{{ __('outlet.rr_log') }}</label>
                                                                <textarea id="rr_log" class="form-control{{ $errors->has('rr_log') ? ' is-invalid' : '' }}" name="rr_log"
                                                                    rows="4">{{ old('rr_log', $outlet->rr_log) }}</textarea>
                                                                {!! $errors->first('rr_log', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="apoyo"
                                                    class="control-label">{{ __('outlet.apoyo') }}</label>
                                                <select class="form-control formNuevo" name="apoyo" id='apoyo'
                                                    value="{{ old('apoyo', $outlet->apoyo) }}">
                                                    <option>Seleccione el nivel</option>
                                                    <option value="Gobernacion"
                                                        {{ $outlet->apoyo == 'Gobernacion' ? 'selected' : '' }}>Gobernacion
                                                    </option>
                                                    <option value="Alcaldia"
                                                        {{ $outlet->apoyo == 'Alcaldia' ? 'selected' : '' }}>Alcaldia
                                                    </option>
                                                    <option value="Bomberos"
                                                        {{ $outlet->apoyo == 'Bomberos' ? 'selected' : '' }}>Bomberos
                                                    </option>
                                                    <option value="Policia"
                                                        {{ $outlet->apoyo == 'Policia' ? 'selected' : '' }}>Policia
                                                    </option>
                                                    <option value="Otros"
                                                        {{ $outlet->apoyo == 'Otros' ? 'selected' : '' }}>Otros</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="efectivo"
                                                    class="control-label">{{ __('outlet.efectivo') }}</label>
                                                <input id="efectivo"
                                                    class="form-control{{ $errors->has('efectivo') ? ' is-invalid' : '' }}"
                                                    name="efectivo" type="number"
                                                    placeholder="Ingrese el efectivo a ser empleado"
                                                    value="{{ $outlet->efectivo }}" />
                                                {!! $errors->first('efectivo', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fecha"
                                                    class="control-label">{{ __('outlet.fecha') }}</label>
                                                <input id="fecha"
                                                    class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}"
                                                    name="fecha" type="date" placeholder="Ingrese el fecha"
                                                    value="{{ old('fecha', date('Y-m-d')) }}" />
                                                {!! $errors->first('fecha', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="card" style="width: 100%;">
                                            <div class="card-header">
                                                Seleccionar el Foco de Calor a registrar
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="latitude"
                                                                    class="control-label">{{ __('outlet.latitude') }}</label>
                                                                <input id="latitude" type="text"
                                                                    class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}"
                                                                    name="latitude"
                                                                    value="{{ old('latitude', $outlet->latitude) }}"
                                                                    required>
                                                                {!! $errors->first('latitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="longitude"
                                                                    class="control-label">{{ __('outlet.longitude') }}</label>
                                                                <input id="longitude" type="text"
                                                                    class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}"
                                                                    name="longitude"
                                                                    value="{{ old('longitude', $outlet->longitude) }}"
                                                                    required>
                                                                {!! $errors->first('longitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="foto"
                                                                    class="control-label">{{ __('outlet.foto') }}</label>
                                                                <input id="foto"
                                                                    class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}"
                                                                    name="foto" id="foto" type="file"
                                                                    placeholder="Ingrese el foto" />
                                                                {!! $errors->first('foto', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="video"
                                                                    class="control-label">{{ __('outlet.video') }}</label>
                                                                <input id="video"
                                                                    class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}"
                                                                    name="video" id="video" type="file"
                                                                    placeholder="Ingrese el video" />
                                                                {!! $errors->first('video', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div id="mapid"></div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="archivo"
                                                    class="control-label">{{ __('outlet.archivo') }}</label>
                                                <input id="archivo"
                                                    class="form-control{{ $errors->has('archivo') ? ' is-invalid' : '' }}"
                                                    name="archivo" id="archivo" type="file"
                                                    placeholder="Ingrese el archivo a ser empleado" />
                                                {!! $errors->first('archivo', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="resumen"
                                                    class="control-label">{{ __('outlet.resumen') }}</label>
                                                <input id="resumen"
                                                    class="form-control{{ $errors->has('resumen') ? ' is-invalid' : '' }}"
                                                    name="resumen" id="resumen" type="file"
                                                    placeholder="Ingrese el resumen a ser empleado" />
                                                {!! $errors->first('resumen', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="encargado"
                                                    class="control-label">{{ __('outlet.encargado') }}</label>
                                                <input id="encargado"
                                                    class="form-control{{ $errors->has('encargado') ? ' is-invalid' : '' }}"
                                                    name="encargado" type="text"
                                                    placeholder="Ingrese Nombre del encargado"
                                                    value="{{ old('encargado', $outlet->encargado) }}" />
                                                {!! $errors->first('encargado', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <input type="submit" value="{{ __('outlet.update') }}" class="btn btn-success">
                                    <a href="{{ route('outlets.show', $outlet) }}"
                                        class="btn btn-link">{{ __('app.cancel') }}</a>
                                    @if (auth()->user()->id == 1)
                                    <a href="{{ route('outlets.edit', [$outlet, 'action' => 'delete']) }}"
                                        id="del-outlet-{{ $outlet->id }}"
                                        class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @endif
@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin="" />

    <style>
        #mapid {
            height: 500px;
        }
    </style>
@endsection

@push('scripts')
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
    <script>
        var mapCenter = [{{ $outlet->latitude }}, {{ $outlet->longitude }}];
        var map = L.map('mapid').setView(mapCenter, {{ config('leaflet.detail_zoom_level') }});

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker(mapCenter).addTo(map);

        function updateMarker(lat, lng) {
            marker
                .setLatLng([lat, lng])
                .bindPopup("Your location :  " + marker.getLatLng().toString())
                .openPopup();
            return false;
        };

        map.on('click', function(e) {
            let latitude = e.latlng.lat.toString().substring(0, 15);
            let longitude = e.latlng.lng.toString().substring(0, 15);
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);
            updateMarker(latitude, longitude);
        });

        var updateMarkerByInputs = function() {
            return updateMarker($('#latitude').val(), $('#longitude').val());
        }
        $('#latitude').on('input', updateMarkerByInputs);
        $('#longitude').on('input', updateMarkerByInputs);

        $(document).ready(function() {


            $("#estado").click(function() {
                if ($('#estado').is(':checked')) {
                    $('#activo').val(1);
                } else {
                    $('#activo').val(0);
                }

            });

            if ($("#division option:selected").val()) {
                const division_id = $("#division option:selected").val();
                $.get('/outlets/unidad_dependiente/' + division_id, function(data) {

                    $('#unidad').empty();

                    $.each(data, function(fetch, subCate) {
                        for (i = 0; i < subCate.length; i++) {
                            $('#unidad').append('<option value="' + subCate[i].id + '" >' +
                                subCate[i].nombre + '</option>');
                        }
                    })

                })
            } else {

                ///select de unidades
                $('#division').on('change', function(e) {

                    var dependencia = e.target.value;

                    $.get('/outlets/unidad_dependiente/' + dependencia, function(data) {

                        $('#unidad').empty();

                        $.each(data, function(fetch, subCate) {
                            for (i = 0; i < subCate.length; i++) {
                                $('#unidad').append('<option value="' + subCate[i].id +
                                    '" >' +
                                    subCate[i].nombre + '</option>');
                            }
                        })

                    })
                });
            }



        });
    </script>
@endpush
