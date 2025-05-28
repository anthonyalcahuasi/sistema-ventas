@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('title', __('Iniciar sesión'))

@section('adminlte_css_pre')
    <style>
        body {
            background: #c90000;
            background: linear-gradient(145deg,rgba(201, 0, 0, 1) 0%, rgba(196, 33, 0, 1) 38%, rgba(0, 0, 0, 1) 70%);
            background-size: cover;
        }
        .login-box {
            margin: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
        .brand-logo {
            width: 60px;
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('auth_header')
    <div class="text-center mb-3">
        <img src="{{ asset('images/logo-punto.png') }}" alt="Logo Sistema" class="brand-logo">
        <h3 class="font-weight-bold">Punto<span class="text-muted">Gráfico</span></h3>
        <p class="text-muted">Inicia sesión para continuar</p>
    </div>
@endsection

@section('auth_body')
    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Recordarme</label>
                </div>
            </div>
            <div class="col-6 text-right">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
        </div>
    </form>
@endsection

@section('auth_footer')
    <div class="text-center">
        <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a><br>
        <a href="{{ route('register') }}" class="text-center">Crear una cuenta</a>
    </div>
@endsection
