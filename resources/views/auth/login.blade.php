@extends('layouts.app')

<style>
    .background-radial-gradient {
        background-color: hsl(218, 41%, 15%);
        background-image: radial-gradient(650px circle at 0% 0%,
                hsl(218, 41%, 35%) 15%,
                hsl(218, 41%, 30%) 35%,
                hsl(218, 41%, 20%) 75%,
                hsl(218, 41%, 19%) 80%,
                transparent 100%),
            radial-gradient(1250px circle at 100% 100%,
                hsl(218, 41%, 45%) 15%,
                hsl(218, 41%, 30%) 35%,
                hsl(218, 41%, 20%) 75%,
                hsl(218, 41%, 19%) 80%,
                transparent 100%);
    }

    .bg-glass {
        background-color: hsla(0, 0%, 100%, 0.9) !important;
        backdrop-filter: saturate(200%) blur(25px);
    }
</style>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <!-- Section: Design Block -->
                    <section class="background-radial-gradient overflow-hidden">

                        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
                            <div class="row gx-lg-5 align-items-center mb-5">
                                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                                        ECEME <br />
                                        <span style="color: hsl(218, 81%, 75%)">Escuela de Comando y Estado Mayor del
                                            Ejército</span>
                                    </h1>
                                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                                        SISTEMA DE MONITOREO DE ALERTA TEMPRANA DE INCENDIOS FORESTALES DEL EJÉRCITO
                                    </p>
                                </div>

                                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                                    <div class="card bg-glass">
                                        <div class="card-body px-4 py-5 px-md-5">
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <!-- Email input -->
                                                <div class="form-outline mb-4">
                                                    <input type="email"
                                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                        name="email" value="{{ old('email') }}" required autofocus>
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                    <label class="form-label" for="form1Example13">{{ __('E-Mail Address') }}</label>
                                                </div>

                                                <!-- Password input -->
                                                <div class="form-outline mb-4">
                                                    <input type="password"
                                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                        name="password" required>
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                    <label class="form-label" for="form1Example23">{{ __('Password') }}</label>
                                                </div>

                                                <div class="d-flex justify-content-around align-items-center mb-4">
                                                    <!-- Checkbox -->
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember"
                                                            id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="form1Example3"> Recordarme
                                                        </label>
                                                    </div>
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">Olvidaste
                                                        tu contraseña?</a>
                                                </div>
                                                <!-- Submit button -->
                                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                                    Iniciar Sesión
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
@endsection
