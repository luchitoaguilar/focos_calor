@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card-body " id="mapid" style="position: relative; outline-style: none;" tabindex="0"></div>
            </div>
            <div class="col-lg-5">
                <canvas id="barras" style="display: block; box-sizing: border-box; height: 100%; width: 100%"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin="" /> --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
    <style>
        #mapid {
            min-height: 700px;
        }
    </style>
@endsection
@push('scripts')
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    {{-- <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script> --}}

    <!-- Leaflet (JS/CSS) -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <!-- Leaflet-KMZ -->
    <script src="https://unpkg.com/leaflet-kmz@1.0.9/dist/leaflet-kmz-src.js"></script>

    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
    <script src="https://unpkg.com/jszip@3.5.0/dist/jszip.min.js"></script>
    <script src="https://unpkg.com/@tmcw/togeojson@4.1.0/dist/togeojson.umd.js"></script>
    <script>
        var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }},
            {{ config('leaflet.map_center_longitude') }}
        ], {{ config('leaflet.zoom_level') }});

        var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            maxZoom: 17,
            attribution: 'Map data: &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)',
            opacity: 0.90
        });
        OpenTopoMap.addTo(map);

        // Instantiate KMZ layer (async)
        var kmz = L.kmzLayer().addTo(map);

        kmz.on('load', function(e) {
            control.addOverlay(e.layer, e.name[0] + e.name[1] + e.name[2] + e.name[3]);
            // e.layer.addTo(map);
        });

        // Add remote KMZ files as layers (NB if they are 3rd-party servers, they MUST have CORS enabled)
        kmz.load('{{ asset('kmz/GGUU.kmz') }}');
        kmz.load('{{ asset('kmz/PPUU.kmz') }}');

        var control = L.control.layers(null, null, {
            collapsed: false
        }).addTo(map);


        // var popup = L.popup();

        var markers = L.markerClusterGroup();

        axios.get('{{ route('api.outlets.index') }}')
            .then(function(response) {
                var marker = L.geoJSON(response.data, {
                    pointToLayer: function(geoJsonPoint, latlng) {
                        return L.marker(latlng).bindPopup(function(layer) {
                            return layer.feature.properties.map_popup_content;
                        });
                    }
                });
                markers.addLayer(marker);
            })
            .catch(function(error) {
                console.log(error);
            });
        map.addLayer(markers);

        // Inicio layers del clima
        var Temp = L.tileLayer(
                "https://tile.openweathermap.org/map/temp_new/{z}/{x}/{y}.png?appid=d22d9a6a3ff2aa523d5917bbccc89211", {
                    maxZoom: 18,
                    attribution: '&copy; <a href="http://owm.io">VANE</a>',
                    id: "temp"
                }
            ),
            Precipitation = L.tileLayer(
                "https://tile.openweathermap.org/map/precipitation_new/{z}/{x}/{y}.png?appid=d22d9a6a3ff2aa523d5917bbccc89211", {
                    maxZoom: 18,
                    attribution: '&copy; <a href="http://owm.io">VANE</a>'
                }
            ),
            Wind = L.tileLayer(
                "https://tile.openweathermap.org/map/wind_new/{z}/{x}/{y}.png?appid=d22d9a6a3ff2aa523d5917bbccc89211", {
                    maxZoom: 18,
                    attribution: '&copy; <a href="http://owm.io">VANE</a>'
                }
            ),
            Pressure = L.tileLayer(
                "https://tile.openweathermap.org/map/pressure_new/{z}/{x}/{y}.png?appid=d22d9a6a3ff2aa523d5917bbccc89211", {
                    maxZoom: 18,
                    attribution: '&copy; <a href="http://owm.io">VANE</a>'
                }
            ),
            Clouds = L.tileLayer(
                "https://tile.openweathermap.org/map/clouds_new/{z}/{x}/{y}.png?appid=d22d9a6a3ff2aa523d5917bbccc89211", {
                    maxZoom: 18,
                    attribution: '&copy; <a href="http://owm.io">VANE</a>'
                }
            );

        // var owm = new L.OWMLayer({ key: "7e52f30bbc0a5fb4e633933eed3291c8" });
        // map.addLayer(owm);

        // Temp.addTo(map);

        var overlays = {
            Temperatura: Temp,
            Precipitacion: Precipitation,
            Nubes: Clouds,
            Viento: Wind
        };
        L.control.layers(overlays, null, {
            collapsed: false
        }).addTo(map);


        //https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js

        // Termina layers del clima

        @can('create', new App\Models\Outlet())
        console.log('here');
            var theMarker;

            map.on('click', function(e) {
                let latitude = e.latlng.lat.toString().substring(0, 15);
                let longitude = e.latlng.lng.toString().substring(0, 15);

                if (theMarker != undefined) {
                    map.removeLayer(theMarker);
                };

                var popupContent = "Tu ubicacion es : " + latitude + ", " + longitude;
                popupContent += '<br><a href="{{ route('outlets.create') }}?latitude=' + latitude + '&longitude=' +
                    longitude + '">Agregar nuevo punto</a>';

                theMarker = L.marker([latitude, longitude]).addTo(map);
                theMarker.bindPopup(popupContent)
                    .openPopup();
            });
        @endcan
    </script>

<script>
    const ctx = document.getElementById('barras');
    const linear = document.getElementById('lineas');

    let datos = [];

    axios.get('{{ route('api.outlet_map.divisiones') }}')
        .then(function(response) {
            for (i = 1; i <= 11; i++) {
                datos.push(response.data[i]);
            }

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['DIV-1', 'DIV-2', 'DIV-3', 'DIV-4', 'DIV-5', 'DIV-6', 'DIV-7', 'DIV-8',
                        'DIV-9', 'DIV-10', 'DIV-MEC-1'
                    ],
                    datasets: [{
                        label: 'Cantidad de focos de calor',
                        data: datos,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)',
                            'rgba(75, 192, 189, 0.2)',
                            'rgba(54, 183, 235, 0.2)',
                            'rgba(153, 190, 255, 0.2)',
                            'rgba(59, 203, 159, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)',
                            'rgba(75, 192, 189, 0.2)',
                            'rgba(54, 183, 235, 0.2)',
                            'rgba(153, 190, 255, 0.2)',
                            'rgba(59, 203, 159, 0.2)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            new Chart(lineas, {
                type: 'line',
                data: {
                    labels: ['DIV-1', 'DIV-2', 'DIV-3', 'DIV-4', 'DIV-5', 'DIV-6', 'DIV-7', 'DIV-8',
                        'DIV-9', 'DIV-10', 'DIV-MEC-1'
                    ],
                    datasets: [{
                        label: 'Cantidad de focos de calor',
                        data: datos,
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(function(error) {
            console.log(error);
        });


    // console.log(datos);
</script>

    {{-- widget del clima --}}
    <script src="{{ asset('js/modules/clima.js') }}" data-use-service-core defer></script>
@endpush
