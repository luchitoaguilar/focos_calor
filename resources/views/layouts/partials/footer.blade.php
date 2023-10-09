<!-- Footer -->
<footer class="footer bg-dark text-center text-white" style="width:100%" id="footer">
    <!-- Grid container -->
    <div class="container p-4">

        <!-- Section: Text -->
        <section class="mb-4">
            <h3>
                SISTEMA DE MONITOREO DE ALERTA TEMPRANA DE INCENDIOS FORESTALES DEL EJÉRCITO
            </h3>
        </section>
        <!-- Section: Text -->
        <hr style="color: white">
        <!-- Section: Links -->
        <section class="">
            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Escuela de Comando y Estado Mayor del Ejército</h5>

                    <ul class="list-unstyled mb-0">
                        <img src="{{ asset('ecem-logo.jpeg') }}" width="100" height="100" class="d-inline-block align-top"
                    alt="">
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">APLICACIONES</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="https://store.avenza.com/" target="_blank" class="text-white">Avenza Maps</a>
                        </li>
                        <li>
                            <a href="https://www.oruxmaps.com/cs/es" target="_blank" class="text-white">Orux Map</a>
                        </li>
                        <li>
                            <a href="https://apppage.net/preview/at.xylem.mapin" target="_blank" class="text-white">MAPinr</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">SISTEMAS RELACIONADOS</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="https://simb.siarh.gob.bo/simb/map_heat_source" target="_blank" class="text-white">SIMB</a>
                        </li>
                        <li>
                            <a href="https://www.windy.com" target="_blank" class="text-white">WINDY</a>
                        </li>
                        <li>
                            <a href="https://reliefweb.int/report/bolivia-plurinational-state/satif-sistema-de-alerta-temprana-de-incendios-forestales-30-de-7" target="_blank" class="text-white">SATIF</a>
                        </li>
                        <li>
                            <a href="https://firms.modaps.eosdis.nasa.gov/map/" target="_blank" class="text-white">FIRMS: NASA</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="">My. Inf. Jose Lopez Flores</h5>

                    <ul class="list-unstyled mb-0">
                        <img src="{{ asset('lopez.jpeg') }}" width="100" height="100" class="d-inline-block align-top"
                    alt="">
                    </ul>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </section>
        <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Escuela de Comando y Estado Mayor del Ejército - Desarrollado por: AguiSoft
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

@push('scripts')
<script language="JavaScript" type="text/javascript">
    function comprobar() {
        var ventana_ancho = $(window).width();
        var ventana_alto = $(window).height();
        // alert(ventana_ancho);

        if (ventana_ancho < 700) {
            $('#footer').css('position', 'absolute');
            document.querySelector("#footer").style.bottom ="";
        } else {
            $('#footer').css('position', 'fixed');
            document.querySelector("#footer").style.bottom = 0;
        }
    }

    $(window).resize(function() {
        comprobar();
    });
</script>
@endpush
