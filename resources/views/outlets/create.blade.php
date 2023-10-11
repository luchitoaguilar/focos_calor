@extends('layouts.app')

@section('title', __('outlet.create'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('outlet.create') }}</div>
                <form method="POST" action="{{ route('outlets.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="control-label">{{ __('outlet.name') }}</label>
                            <input id="name" type="text"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                value="{{ old('name') }}" required>
                            {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="control-label">{{ __('outlet.descripcion') }}</label>
                            <textarea id="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion"
                                rows="4">{{ old('descripcion') }}</textarea>
                            {!! $errors->first('descripcion', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="latitude" class="control-label">{{ __('outlet.division') }}</label>
                                    <select
                                        class="selectpicker form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}"
                                        id="division" name="division">
                                        <option value=""> Selecciona una Division </option>
                                        @foreach ($divisiones as $divisiones)
                                            @if (auth()->user()->id == 1)
                                                <option value="{{ old('division', $divisiones->id - 1) }}" required>
                                                    {{ $divisiones->nombre }}</option>
                                            @else
                                                <option value="{{ $divisiones->id - 1 }}"
                                                    {{ $divisiones->id - 1 == auth()->user()->div_id ? 'selected' : '' }}
                                                    required disabled>{{ $divisiones->nombre }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="unidad" class="control-label">{{ __('outlet.unidad') }}</label>
                                    @if (auth()->user()->id == 1)
                                        <select class="form-control formNuevo" name="unidad" id='unidad'>
                                            <option value=""> Selecciona una Unidad </option>
                                        </select>
                                    @elseif (auth()->user()->div_id > 1)
                                        <select class="form-control formNuevo" name="unidad" id='unidad'>
                                            <option value=""> Selecciona una Unidad </option>
                                            {{-- @if (auth()->user()->uni_id > 1) --}}
                                                @foreach ($unidades as $unidades)
                                                    <option value="{{ $unidades->id }}"
                                                        {{ $unidades->id == auth()->user()->uni_id ? 'selected' : '' }}
                                                        required>{{ $unidades->nombre }}</option>
                                                @endforeach
                                            {{-- @endif --}}
                                        </select>
                                        {{-- @else --}}
                                    @endif
                                    {!! $errors->first('unidad', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nivel" class="control-label">{{ __('outlet.nivel') }}</label>
                                    <select class="form-control formNuevo" name="nivel" id='nivel'>
                                        <option selected>Seleccione el nivel</option>
                                        <option value="Rojo">Rojo</option>
                                        <option value="Amarillo">Amarillo</option>
                                        <option value="Verde">Verde</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="unidad_apoyo" class="control-label">{{ __('outlet.unidad_apoyo') }}</label>
                                    <select class="form-control formNuevo" name="unidad_apoyo" id='unidad_apoyo' required>
                                        <option selected>Seleccione el tipo de Unidad</option>
                                        <option value="1">Patrulla</option>
                                        <option value="2">Seccion</option>
                                        <option value="3">Compañia</option>
                                        <option value="4">Regimiento</option>
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
                                                        rows="4">{{ old('acciones') }}</textarea>
                                                    {!! $errors->first('acciones', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="rrhh"
                                                        class="control-label">{{ __('outlet.rrhh') }}</label>
                                                    <textarea id="rrhh" class="form-control{{ $errors->has('rrhh') ? ' is-invalid' : '' }}" name="rrhh"
                                                        rows="4">{{ old('rrhh') }}</textarea>
                                                    {!! $errors->first('rrhh', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="rr_log"
                                                        class="control-label">{{ __('outlet.rr_log') }}</label>
                                                    <textarea id="rr_log" class="form-control{{ $errors->has('rr_log') ? ' is-invalid' : '' }}" name="rr_log"
                                                        rows="4">{{ old('rr_log') }}</textarea>
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
                                    <label for="apoyo" class="control-label">{{ __('outlet.apoyo') }}</label>
                                    <select class="form-control formNuevo" name="apoyo" id='apoyo'>
                                        <option selected>Seleccione el nivel</option>
                                        <option value="Gobernacion">Gobernacion</option>
                                        <option value="Alcaldia">Alcaldia</option>
                                        <option value="Bomberos">Bomberos</option>
                                        <option value="Policia">Policia</option>
                                        <option value="Otros">Otros</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="efectivo" class="control-label">{{ __('outlet.efectivo') }}</label>
                                    <input id="efectivo"
                                        class="form-control{{ $errors->has('efectivo') ? ' is-invalid' : '' }}"
                                        name="efectivo" type="number"
                                        placeholder="Ingrese el efectivo a ser empleado" />
                                    {!! $errors->first('efectivo', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha" class="control-label">{{ __('outlet.fecha') }}</label>
                                    <input id="fecha"
                                        class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}"
                                        name="fecha" type="date" placeholder="Ingrese el fecha" />
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
                                                        value="{{ old('latitude', request('latitude')) }}" required>
                                                    {!! $errors->first('latitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                                </div>
                                                <div class="form-group">
                                                    <label for="longitude"
                                                        class="control-label">{{ __('outlet.longitude') }}</label>
                                                    <input id="longitude" type="text"
                                                        class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}"
                                                        name="longitude"
                                                        value="{{ old('longitude', request('longitude')) }}" required>
                                                    {!! $errors->first('longitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                                </div>
                                                <div class="form-group">
                                                    <label for="foto"
                                                        class="control-label">{{ __('outlet.foto') }}</label>
                                                    <input id="foto"
                                                        class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}"
                                                        name="foto" type="file" placeholder="Ingrese el foto" />
                                                    {!! $errors->first('foto', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                                </div>
                                                <div class="form-group">
                                                    <label for="video"
                                                        class="control-label">{{ __('outlet.video') }}</label>
                                                    <input id="video"
                                                        class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}"
                                                        name="video" type="file" placeholder="Ingrese el video" />
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="archivo" class="control-label">{{ __('outlet.archivo') }}</label>
                                    <input id="archivo"
                                        class="form-control{{ $errors->has('archivo') ? ' is-invalid' : '' }}"
                                        name="archivo" type="file" placeholder="Ingrese el archivo a ser empleado" />
                                    {!! $errors->first('archivo', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="encargado" class="control-label">{{ __('outlet.encargado') }}</label>
                                    <input id="encargado"
                                        class="form-control{{ $errors->has('encargado') ? ' is-invalid' : '' }}"
                                        name="encargado" type="text" placeholder="Ingrese Nombre del encargado" />
                                    {!! $errors->first('encargado', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="{{ __('outlet.create') }}" class="btn btn-success">
                        <a href="{{ route('outlets.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin="" />

    <style>
        #mapid {
            height: 100%;
            width: 100%
        }
    </style>
@endsection

@push('scripts')
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
    <script>
        var mapCenter = [{{ request('latitude', config('leaflet.map_center_latitude')) }},
            {{ request('longitude', config('leaflet.map_center_longitude')) }}
        ];
        var map = L.map('mapid').setView(mapCenter, {{ config('leaflet.zoom_level') }});

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

        var division = document.getElementById('division');
        var unidad = document.getElementById('unidad');

        if (division.options[division.selectedIndex].value) {

            var dependencia = division.options[division.selectedIndex].value;
            var unidad_val = unidad.options[unidad.selectedIndex].value;


            $.get('unidad_dependiente/' + dependencia, function(data) {

                $('#unidad').empty();

                if (unidad_val) {
                    console.log('here');
                    $.each(data, function(fetch, subCate) {
                        for (i = 0; i < subCate.length; i++) {
                            $('#unidad').append('<option value="' + subCate[i].id + '" disabled>' +
                                subCate[i].nombre + '</option>');
                        }
                    })
                } else {
                    $.each(data, function(fetch, subCate) {
                        for (i = 0; i < subCate.length; i++) {
                            $('#unidad').append('<option value="' + subCate[i].id + '" >' +
                                subCate[i].nombre + '</option>');
                        }
                    })
                }

            })
        } else {
            ///select de unidades
            $('#division').on('change', function(e) {

                var dependencia = e.target.value;

                $.get('unidad_dependiente/' + dependencia, function(data) {

                    $('#unidad').empty();

                    $.each(data, function(fetch, subCate) {
                        for (i = 0; i < subCate.length; i++) {
                            $('#unidad').append('<option value="' + subCate[i].id + '">' +
                                subCate[i].nombre + '</option>');
                        }
                    })

                })
            });
        }
    </script>
@endpush
