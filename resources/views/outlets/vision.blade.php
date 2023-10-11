@extends('layouts.app')

@section('title', __('outlet.vision'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12" >
            <div class="jumbotron jumbotron-fluid" style="background-image: url('{{asset('assets/incendio6.jpeg')}}')">
                <div class="container" style="text-align: center">
                    <h1 class="display-3 text-light" style="color: white; opacity: 0.7">VISIÓN</h1>
                    <h1 class="text-light" style="text-align: justify; color:white; opacity: 0.7">
                        EL EJÉRCITO DE BOLIVIA CONTARÁ CON UN SISTEMA DE ALERTA TEMPRANA PARA EL CONTROL DE INCENDIOS FORESTALES, DEBIDAMENTE ESTRUCTURADA ESPECÍFICA Y CONCRETA, EFECTUANDO EL DESARROLLO DE UNA VALORACIÓN DE CARGOS DENTRO DEL SISTEMA AJUSTADA A SUS CONTENIDOS Y EXIGENCIAS, PARA QUE DE ESTA MANERA SE PUEDE REALIZAR UNA EVALUACIÓN DEL PERSONAL, MEJORAR SUS CAPACITACIONES DENTRO LAS GG.UU.CC. EN EL MANEJO DEL SISTEMA DE ALERTA. 
                    </h1>
                </div>
            </div>
        </div>
    </div>
@endsection
