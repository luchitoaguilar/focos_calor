@extends('layouts.app')

@section('title', __('outlet.mision'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12" >
            <div class="jumbotron jumbotron-fluid" style="background-image: url('{{asset('assets/incendio6.jpeg')}}')">
                <div class="container" style="text-align: center">
                    <h1 class="display-3 text-light" style="color: white; opacity: 0.7">MISIÓN</h1>
                    <h1 class="text-light" style="text-align: justify; color:white; opacity: 0.7">
                        EL SISTEMA DE ALERTA TEMPRANA DE INCENDIOS FORESTALES DENTRO EL EJÉRCITO DE BOLIVIA, TIENE COMO MISIÓN GENERAR Y PROPORCIONAR GEO INFORMACIÓN DERIVADA DE DATOS SATELITALES PARA EL MONITOREO Y ALERTA TEMPRANA DE INCENDIOS FORESTALES QUE CONTRIBUYA A CONSERVAR LA BIODIVERSIDAD Y A SALVAGUARDAR LA VIDA HUMANA, LA FLORA Y FAUNA DEL ESTADO ESPECÍFICAMENTE DENTRO LAS JURISDICCIONES DE LAS GG.UU.CC.
                    </h1>
                </div>
            </div>
        </div>
    </div>
@endsection
