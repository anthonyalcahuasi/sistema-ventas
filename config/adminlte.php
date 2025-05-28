<?php

return [

    'title' => 'Sistema de Ventas',
    'title_prefix' => '',
    'title_postfix' => '',

    'use_ico_only' => false,
    'use_full_favicon' => false,

    'logo' => '<b>Sistema</b>Ventas',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'SistemaVentas',

    'auth_logo' => [
        'enabled' => true,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    'preloader' => [
        'enabled' => true,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'SistemaVentas Preloader',
            'effect' => 'animation__shake',
            'width' => 60,
            'height' => 60,
        ],
    ],

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => false,
    'layout_dark_mode' => false,

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    'control_sidebar_slide' => true,
    'control_sidebar_scrollbar_theme' => 'os-theme-light',
    'control_sidebar_scrollbar_auto_hide' => 'l',

    'urls' => [
        'dashboard_url' => 'dashboard',
        'logout_url' => 'logout',
        'login_url' => 'login',
        'register_url' => 'register',
        'password_reset_url' => 'password/reset',
        'password_email_url' => 'password/email',
        'profile_url' => 'profile',
    ],

    'menu' => [
        [
            'type' => 'navbar-search',
            'text' => 'Buscar',
            'topnav_right' => true,
        ],
        [
            'text' => 'Dashboard',
            'url'  => 'dashboard',
            'icon' => 'fas fa-fw fa-home',
        ],
        [
            'text'    => 'Administración',
            'icon'    => 'fas fa-fw fa-cogs',
            'can'     => 'admin',
            'submenu' => [
                [
                    'text' => 'Usuarios',
                    'url'  => 'users',
                    'icon' => 'fas fa-fw fa-users',
                ],
                [
                    'text' => 'Roles',
                    'url'  => 'roles',
                    'icon' => 'fas fa-fw fa-user-shield',
                ],
                [
                    'text' => 'Permisos',
                    'url'  => 'permissions',
                    'icon' => 'fas fa-fw fa-key',
                ],
            ],
        ],
        [
            'text' => 'Productos',
            'url'  => 'products',
            'icon' => 'fas fa-fw fa-boxes',
        ],
        [
            'text' => 'Clientes',
            'url'  => 'clients',
            'icon' => 'fas fa-fw fa-user-tag',
        ],
        [
            'text' => 'Ventas',
            'url'  => 'sales',
            'icon' => 'fas fa-fw fa-shopping-cart',
        ],
        [
            'text' => 'Cotizaciones',
            'url'  => 'quotations',
            'icon' => 'fas fa-fw fa-file-invoice-dollar',
        ],

        [
            'text' => 'Perfil de Usuario',
            'url'  => 'profile',
            'icon' => 'fas fa-user-circle',
        ],
    ],

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                ['type' => 'js', 'asset' => true, 'location' => 'vendor/datatables/js/jquery.dataTables.min.js'],
                ['type' => 'js', 'asset' => true, 'location' => 'vendor/datatables/js/dataTables.bootstrap4.min.js'],
                ['type' => 'css', 'asset' => true, 'location' => 'vendor/datatables/css/dataTables.bootstrap4.min.css'],
            ],
        ],
        'Select2' => [
            'active' => false,
        ],
    ],

    'livewire' => false,
];
