@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@section('title', __('Registro'))

@section('adminlte_css_pre')
    <style>
        body {
            background: #c90000;
            background: linear-gradient(145deg,rgba(201, 0, 0, 1) 0%, rgba(196, 33, 0, 1) 38%, rgba(0, 0, 0, 1) 70%);
            background-size: cover;
        }
        .register-box {
            margin: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.96);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 0 25px rgba(0,0,0,0.2);
        }
        .brand-logo {
            width: 65px;
            margin-bottom: 12px;
        }
    </style>
@endsection

@section('auth_header')
    <div class="text-center mb-3">
        <img src="{{ asset('images/logo-punto.png') }}" alt="Logo Sistema" class="brand-logo">
        <h3 class="font-weight-bold">Crea tu <span class="text-primary">Cuenta</span></h3>
        <p class="text-muted">Registra tus credenciales</p>
    </div>
@endsection

@section('auth_body')
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Nombre completo" required autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
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

        <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-right">
                <button type="submit" class="btn btn-primary">Registrarme</button>
            </div>
        </div>
    </form>
@endsection

@section('auth_footer')
    <div class="text-center">
        <a href="{{ route('login') }}">Ya tengo una cuenta</a>
    </div>
@endsection
