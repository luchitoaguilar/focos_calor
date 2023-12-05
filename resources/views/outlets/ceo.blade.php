@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card-body " id="mapid" style="position: relative; outline-style: none;" tabindex="0"></div>
            </div>
            {{-- <div class="col-lg-5">
                <canvas id="barras" style="display: block; box-sizing: border-box; height: 100%; width: 100%"></canvas>
            </div> --}}
        </div>
    </div>
    {{-- <hr>
    <div class="card">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <canvas id="barras" style="display: block; box-sizing: border-box; height: 500px; width: 100%"></canvas>
            </div>

            <div class="col-lg-6">
                <canvas id="lineas" style="display: block; box-sizing: border-box; height: 500px; width: 100%"></canvas>
            </div>
        </div>
    </div> --}}
@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
    <style>
        #mapid {
            min-height: 620px;
        }
    </style>
@endsection
@push('scripts')
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

    <script>
        var providers = {};

        providers["OSM"] = {
            title: "OSM",
            //icon: "img/layers-osm.png",
            layer: L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
                maxZoom: 18,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            })
        };

        providers["Satellite"] = {
            title: "MODIS",
            //icon: "img/layers-satellite.png",
            layer: L.tileLayer(
                "http://{s}.sat.owm.io/sql/{z}/{x}/{y}?select=b1,b4,b3&from=modis&order=last&color=modis&appid=d22d9a6a3ff2aa523d5917bbccc89211", {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://owm.io">VANE</a>'
                }
            )
        };


        var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }},
            {{ config('leaflet.map_center_longitude') }}
        ], {{ config('leaflet.zoom_level') }});

        var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            maxZoom: 17,
            attribution: 'Map data: &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)',
            opacity: 0.90
        });
        OpenTopoMap.addTo(map);

        //http://tile.openweathermap.org/map/temp_new/{z}/{x}/{y}.png?appid=d9cfe451d5a775abaf178aec4951b4b0

        map.scrollWheelZoom.disable();
        map.on('focus', () => {
            map.scrollWheelZoom.enable();
        });
        map.on('blur', () => {
            map.scrollWheelZoom.disable();
        });


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

        const myIcon = L.icon({
            iconUrl: 'http://leafletjs.com/examples/custom-icons/leaf-green.png',
            iconSize: [50, 32], // size of the icon
            iconAnchor: [22, 16], // point of the icon which will correspond to marker's location

        });

        const marker = L.marker([0, 0, {
            icon: myIcon
        }]).addTo(map);
        marker.setLatLng([50, 20]);

        var overlays = {
            Temperatura: Temp,
            Precipitacion: Precipitation,
            Nubes: Clouds,
            Viento: Wind
        };
        L.control.layers(overlays, null, {
            collapsed: false
        }).addTo(map);

        var layers = [];
        for (var providerId in providers) {
            layers.push(providers[providerId]);
        }

        // L.control.iconLayers(layers).addTo(map);

        //https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js

        // Termina layers del clima

        var amazonico = {{ config('ceo.amazonico') }};
        var mamore = {{ config('ceo.mamore') }};
        var plata = {{ config('ceo.plata') }};
        var central = {{ config('ceo.central') }};
        var chaco = {{ config('ceo.chaco') }};
        var chichas = {{ config('ceo.chichas') }};
        var andino = {{ config('ceo.andino') }};
        var pagador = {{ config('ceo.pagador') }};

        var polygon = L.polygon(amazonico, {
            color: 'gold'
        }).addTo(map);
        var polygon = L.polygon(mamore, {
            color: 'red'
        }).addTo(map);
        var polygon = L.polygon(plata, {
            color: 'green'
        }).addTo(map);
        var polygon = L.polygon(central, {
            color: 'orange'
        }).addTo(map);
        var polygon = L.polygon(chaco, {
            color: 'yellow'
        }).addTo(map);
        var polygon = L.polygon(chichas, {
            color: 'blue'
        }).addTo(map);
        var polygon = L.polygon(andino, {
            color: 'turquoise'
        }).addTo(map);
        var polygon = L.polygon(pagador, {
            color: 'purple'
        }).addTo(map);
        var popup = L.popup();

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

        @can('create', new App\Models\Outlet())
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


   @endpush
