@extends('layouts.app')

@section('title', __('outlet.vision'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12" >
            <div class="jumbotron jumbotron-fluid" style="background-image: url('{{asset('assets/incendio6.jpeg')}}')">
                <div class="container" style="text-align: center">
                    <h1 class="display-3 bg-light text-dark" style="color: white; opacity: 0.7">VISIÓN</h1>
                    <h1 class="bg-light text-dark" style="text-align: justify; color:white; opacity: 0.7">
                        El Ejército de Bolivia contará con un Sistema de Alerta Temprana para el control de Incendios Forestales, debidamente estructurada específica y concreta, efectuando el desarrollo de una valoración de cargos dentro del sistema ajustada a sus contenidos y exigencias, para que de esta manera se puede realizar una evaluación del personal, mejorar sus capacitaciones dentro las GG.UU.CC. en el manejo del sistema de alerta. 
                    </h1>
                </div>
            </div>
        </div>
    </div>
@endsection
