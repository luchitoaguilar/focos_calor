@extends('layouts.app')

@section('title', __('outlet.objeto'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12" >
            <div class="jumbotron jumbotron-fluid" style="background-image: url('{{asset('assets/incendio6.jpeg')}}')">
                <div class="container" style="text-align: center">
                    <h1 class="display-3 text-light" style="color: white; opacity: 0.7">OBJETO</h1>
                    <h1 class="text-light" style="text-align: justify; color:white; opacity: 0.7">
                        EL OBJETO DEL PRESENTE MANUAL DEL SISTEMA DE ALERTA TEMPRANA DE INCENDIOS FORESTALES DE LA GG.UU.CC., PERMITE DOCUMENTAR LOS DISTINTOS CARGOS Y FUNCIONES DEL PERSONAL QUE CONFORMA EL SISTEMA MEDIANTE UNA DESCRIPCIÓN DE LOS MIMOS, ESTABLECE O COMPLETA EL ORGANIGRAMA JERÁRQUICO-FUNCIONAL DEL SISTEMA, FACILITA EL CONTROL Y LA MEJORA DE LOS PROCEDIMIENTOS Y ASESORAMIENTO PARA LA TOMA DE DECISIONES, ESTABLECIENDO LAS BASES PARA UNA ADECUADA DEFINICIÓN DE OBJETIVOS.
                    </h1>
                </div>
            </div>
        </div>
    </div>
@endsection
