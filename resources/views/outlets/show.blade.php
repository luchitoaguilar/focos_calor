@extends('layouts.app')

@section('title', __('outlet.detail'))

@section('content')
    <div class="container col-md-10">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('outlet.detail') }}</div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <td>{{ __('outlet.name') }}</td>
                                    <td>{{ $outlet->name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('outlet.descripcion') }}</td>
                                    <td>{{ $outlet->descripcion }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('outlet.latitude') }}</td>
                                    <td>{{ $outlet->latitude }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('outlet.longitude') }}</td>
                                    <td>{{ $outlet->longitude }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('outlet.nivel') }}</td>
                                    <td>
                                        @if ($outlet->nivel == 'Primera Generación')
                                            <div class="btn btn-danger" role="alert">
                                                Primera Generación
                                            </div>
                                        @elseif ($outlet->nivel == 'Segunda Generación')
                                            <div class="btn btn-warning" role="alert">
                                                Segunda Generación
                                            </div>
                                        @elseif ($outlet->nivel == 'Tercera Generación')
                                            <div class="btn btn-success" role="alert">
                                                Tercera Generación
                                            </div>
                                            @elseif ($outlet->nivel == 'Cuarta Generación')
                                            <div class="btn btn-warning" role="alert">
                                                Cuarta Generación
                                            </div>
                                        @elseif ($outlet->nivel == 'Quinta Generación')
                                            <div class="btn btn-success" role="alert">
                                                Quinta Generación
                                            </div>
                                            @elseif ($outlet->nivel == 'Sexta Generación')
                                            <div class="btn btn-success" role="alert">
                                                Sexta Generación
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __('outlet.acciones') }}</td>
                                    <td>{{ $outlet->acciones }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('outlet.apoyo') }}</td>
                                    <td>{{ $outlet->apoyo }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('outlet.unidad_apoyo') }}</td>
                                    <td><img src="{{ asset("assets/$outlet->unidad_apoyo.jpeg") }}" width="60"
                                        height="50" /></td>
                                </tr>
                                <tr>
                                    <td>{{ __('outlet.rrhh') }}</td>
                                    <td>{{ $outlet->rrhh }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('outlet.rr_log') }}</td>
                                    <td>{{ $outlet->rr_log }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('outlet.efectivo') }}</td>
                                    <td>{{ $outlet->efectivo }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('outlet.estado') }}</td>
                                    <td>
                                        @if ($outlet->activo == 1)
                                            Foco Activo <i class="fa fa-fire"></i>
                                        @else
                                            Foco Inactivo
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __('outlet.foto') }}</td>
                                    <td>

                                        <button type="button" class="btn btn-outline-success btn-lg btn-block"
                                            data-toggle="modal" data-target="#fotoModal">
                                            <i class="fa fa-camera" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __('outlet.video') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-info btn-lg btn-block"
                                            data-toggle="modal" data-target="#videoModal">
                                            <i class="fa fa-video-camera" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __('outlet.archivo') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-lg btn-block"
                                            data-toggle="modal" data-target="#archivoModal">
                                            <i class="fa fa-file" aria-hidden="true"></i>
                                        </button>
                                </tr>
                                <tr>
                                    <td>{{ __('outlet.resumen') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-secondary btn-lg btn-block"
                                            data-toggle="modal" data-target="#resumenModal">
                                            <i class="fa fa-file" aria-hidden="true"></i>
                                        </button>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        @can('update', $outlet)
                            <a href="{{ route('outlets.edit', $outlet) }}" id="edit-outlet-{{ $outlet->id }}"
                                class="btn btn-warning">{{ __('outlet.edit') }}</a>
                        @endcan
                        @if (auth()->check())
                            <a href="{{ route('outlets.index') }}"
                                class="btn btn-link">{{ __('outlet.back_to_index') }}</a>
                        @else
                            <a href="{{ route('outlet_map.index') }}"
                                class="btn btn-link">{{ __('outlet.back_to_index') }}</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ trans('outlet.location') }}</div>
                    @if ($outlet->coordinate)
                        <div class="card-body" id="mapid"></div>
                    @else
                        <div class="card-body">{{ __('outlet.no_coordinate') }}</div>
                    @endif
                </div>
            </div>

            <!-- Modal Archivo -->
            <div class="modal fade" id="archivoModal" tabindex="-1" role="dialog" aria-labelledby="archivoModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="archivoModalLabel">Archivo de Respaldo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <embed src="{{ asset($outlet->archivo) }}" type="application/pdf" width="100%"
                                height="400px" />
                            </td>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Video -->
            <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="videoModalLabel">Video del Foco de Calor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="embed-responsive embed-responsive-1by1">
                                <iframe class="embed-responsive-item" src="{{ asset($outlet->video) }}"></iframe>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Foto-->
            <div class="modal fade" id="fotoModal" tabindex="-1" role="dialog" aria-labelledby="fotoModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fotoModalLabel">Fotos del Foco de Calor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset($outlet->foto) }}" class="img-thumbnail"
                                style="width: 80%; heigth: 50px">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Resumen -->
            <div class="modal fade" id="resumenModal" tabindex="-1" role="dialog" aria-labelledby="resumenModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="resumenModalLabel">Resumen Ejecutivo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <embed src="{{ asset($outlet->resumen) }}" type="application/pdf" width="100%"
                                height="400px" />
                            </td>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
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
            height: 500px;
        }
    </style>
@endsection
@push('scripts')
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>

    <script>
        var map = L.map('mapid').setView([{{ $outlet->latitude }}, {{ $outlet->longitude }}],
            {{ config('leaflet.detail_zoom_level') }});

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([{{ $outlet->latitude }}, {{ $outlet->longitude }}]).addTo(map)
            .bindPopup('{!! $outlet->map_popup_content !!}');
    </script>
@endpush
