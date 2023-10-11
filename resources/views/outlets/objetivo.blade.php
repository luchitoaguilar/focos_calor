@extends('layouts.app')

@section('title', __('outlet.objetivo'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12" >
            <div class="jumbotron jumbotron-fluid" style="background-image: url('{{asset('assets/incendio6.jpeg')}}')">
                <div class="container" style="text-align: center">
                    <h1 class="display-3 text-light" style="color: white; opacity: 0.7">OBJETIVO</h1>
                    <h1 class="text-light" style="text-align: justify; color:white; opacity: 0.7">
                        EL OBJETIVO ES IMPLEMENTAR UN SISTEMA DE MONITOREO DE ALERTA TEMPRANA PARA EL EJÉRCITO DE BOLIVIA QUE PERMITA REALIZAR EL CONTROL OPORTUNO DE LOS INCENDIOS FORESTALES EN SUS JURISDICCIONES DENTRO LAS TAREAS DE APOYO QUE DESARROLLA Y EJECUTA EL EJÉRCITO, CON EL FIN DE GARANTIZAR EL DESARROLLO SOSTENIBLE DEL ESTADO MINIMIZANDO LOS DESASTRES NATURALES EN EL TERRITORIO NACIONAL.
                    </h1>
                </div>
            </div>
        </div>
    </div>
@endsection
