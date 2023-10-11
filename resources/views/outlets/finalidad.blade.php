@extends('layouts.app')

@section('title', __('outlet.finalidad'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12" >
            <div class="jumbotron jumbotron-fluid" style="background-image: url('{{asset('assets/incendio6.jpeg')}}')">
                <div class="container" style="text-align: center">
                    <h1 class="display-3 text-light" style="color: white; opacity: 0.7">FINALIDAD</h1>
                    <h1 class="text-light" style="text-align: justify; color:white; opacity: 0.7">
                        SU FINALIDAD PRINCIPAL ES SALVAR VIDAS HUMANAS, REDUCIR O EVITAR QUE SE PRODUZCAN LESIONES PERSONALES Y DISMINUIR AL MÁXIMO LAS PÉRDIDAS DE RECURSOS IMPORTANTES DESDE EL PUNTO DE VISTA SOCIAL Y ECONÓMICO, A TRAVÉS DE LA DIFUSIÓN OPORTUNA Y ADECUADA DE LA INFORMACIÓN DE LA ALERTA, ESTO QUIERE DECIR, QUE DEBE CONTARSE CON EL TIEMPO SUFICIENTE PARA QUE LA POBLACIÓN PONGA EN MARCHA LAS ACCIONES NECESARIAS DE PROTECCIÓN, APOYAR LA TOMA DE DECISIONES DEL COMANDANTE Y EL EMPLEO DE LA FUERZA PARA MINIMIZAR O SOFOCAR EL INCENDIO.
                    </h1>
                </div>
            </div>
        </div>
    </div>
@endsection
