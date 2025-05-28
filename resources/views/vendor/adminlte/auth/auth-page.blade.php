@extends('adminlte::master')

@section('adminlte_css')
    @yield('adminlte_css_pre')
    @yield('adminlte_css')
@stop

@section('classes_body', $auth_type . '-page')

@section('body')
    <div class="{{ $auth_type }}-box">
        {{-- Eliminamos el logo global --}}
        {{-- @include('adminlte::auth.partials.logo') --}}

        <div class="card {{ config('adminlte.classes_auth_card', 'card-outline card-primary') }}">
            @hasSection('auth_header')
                <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
                    <h3 class="card-title float-none text-center">
                        @yield('auth_header')
                    </h3>
                </div>
            @endif

            <div class="card-body {{ config('adminlte.classes_auth_body', '') }}">
                @yield('auth_body')
            </div>

            @hasSection('auth_footer')
                <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
                    @yield('auth_footer')
                </div>
            @endif
        </div>
    </div>
@stop

@section('adminlte_js')
    @yield('adminlte_js')
@stop
