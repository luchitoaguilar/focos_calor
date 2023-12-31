@extends('layouts.app')

@section('title', __('outlet.presentacion'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <<div class="jumbotron jumbotron-fluid" style="background-image: url('{{asset('assets/incendio6.jpeg')}}')">
                <div class="container" style="text-align: center">
                    <h1 class="display-3 text-light" style="color: white; opacity: 0.7">PRESENTACIÓN</h1>
                    <h1 class="text-light" style="text-align: justify; color:white; opacity: 0.7">
                        LA PRESENTE PROPUESTA ESTÁ DESARROLLADA PARA EL MONITOREO Y VIGILANCIA DE LAS JURISDICCIONES DE LAS
                        GG.UU.CC: OPTIMIZANDO EL EMPLEO DE MEDIOS Y RESPUESTA INMEDIATA, ASÍ COMO UN SUBSISTEMA DE EDUCACIÓN
                        A LA POBLACIÓN EN LA PREVENCIÓN Y ALERTA DE LA PRESENCIA DE INCENDIOS FORESTALES. </h1>
                    <h1 class="text-light" style="text-align: justify; color:white; opacity: 0.7">EL EMPLEO DE ESTE SISTEMA TIENE UNA PARTE QUE ES NECESARIAMENTE
                        CAPACITACIÓN DE PERSONAL EN LA VIGILANCIA Y MONITOREO PERMANENTE DE LAS JURISDICCIONES, EMPELO DE
                        MEDIOS TECNOLÓGICOS, COMO DRONES, TELEFONÍA SATELITAL Y OTROS MEDIOS, EL ELEMENTO BÁSICO ES EL
                        EMPLEO DE SATÉLITES, MEDIO QUE NUESTRO ESTADO DISPONE Y ES POCO EMPLEADO, ASÍ COMO LA VIGILANCIA DE
                        PERSONAL CON MEDIOS ADECUADOS PARA LA COMUNICACIÓN DE ALERTAS.
                    </h1>
                </div>
            </div>
        </div>
    </div>
@endsection
