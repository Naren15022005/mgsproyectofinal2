<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- En layouts/app.blade.php -->

    <!-- Favicon dinámico -->
    @if($globalConfig && $globalConfig->site_favicon)
    <link rel="icon" type="image/png" href="{{ asset('storage/'.$globalConfig->site_favicon) }}">
    @else
    <link rel="icon" type="image/png" href="{{ asset('images/default-favicon.png') }}">
    @endif

    <title>@yield('title', $globalConfig->site_name ?? config('app.name', 'MGS'))</title>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">

    <!-- Estilos dinámicos globales -->
    <style>
        :root {
            --primary: {{ $globalConfig->primary_color ?? '#2A2F35' }};
            --primary-light: {{ $globalConfig->primary_color ? hex2rgba($globalConfig->primary_color, 0.1) : 'rgba(42, 47, 53, 0.1)' }};
            --primary-dark: {{ $globalConfig->primary_color ? darkenColor($globalConfig->primary_color, 15) : '#1a1f25' }};
            --accent: {{ $globalConfig->accent_color ?? '#00C9A7' }};
            --accent-light: {{ $globalConfig->accent_color ? hex2rgba($globalConfig->accent_color, 0.1) : 'rgba(0, 201, 167, 0.1)' }};
            --sidebar-bg: {{ $globalConfig->sidebar_color ?? '#2A2F35' }};
            --sidebar-text: {{ $globalConfig->sidebar_text_color ?? '#FFFFFF' }};
            --border-radius: 10px;
            --danger: #dc3545;
            --success: #28a745;
            --warning: #ffc107;
            --info: #17a2b8;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fc;
        }
        
        #app {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* Estilo global de sidebar */
        .sidebar {
            background-color: var(--sidebar-bg);
            color: var(--sidebar-text);
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
            height: 100%;
        }
        
        /* Contenido principal */
        main {
            background-color: #f8f9fc;
            padding-top: 1rem;
            flex: 1;
        }
        
        /* Estilos de tarjetas */
        .card {
            border-radius: var(--border-radius);
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.08);
            border: none;
        }
        
        /* Enlaces y botones con colores primarios */
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }
        
        .btn-accent {
            background-color: var(--accent);
            border-color: var(--accent);
            color: white;
        }
        
        .btn-accent:hover {
            background-color: var(--accent-light);
            border-color: var(--accent);
            color: var(--accent);
        }
        
        /* Links con color primario */
        a {
            color: var(--primary);
        }
        
        a:hover {
            color: var(--primary-dark);
        }

        /* Estilos para el logo en sidebar */
        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            color: var(--sidebar-text);
        }

        .sidebar-logo {
            width: 45px;
            height: 45px;
            object-fit: contain;
            border-radius: 8px;
        }

        .company-name {
            font-weight: 600;
            font-size: 1.25rem;
            color: var(--sidebar-text);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        /* Estilos para elementos activos en el sidebar */
        .nav-link.active {
            background-color: var(--primary);
            color: white;
        }
        
        .nav-link:hover {
            background-color: var(--primary-light);
            color: var(--primary);
        }
        
        /* Efectos de animación suaves */
        .nav-link, .btn, a {
            transition: all 0.3s ease;
        }
    </style>

    <!-- Estilos locales -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @stack('styles')
</head>
<body class="antialiased">
    <div id="app">
        <!-- Topbar -->
        @include('layouts.partial.topbar')

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <aside class="col-md-3 col-lg-2 d-md-block sidebar">
                    @include('layouts.partial.sidebar')
                </aside>

                <!-- Contenido principal -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="container py-4">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>

        <!-- Footer -->
        @include('layouts.partial.footer')
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Script de inicialización -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializar Select2
        if(typeof $.fn.select2 !== 'undefined') {
            $('.select2').select2({
                width: '100%'
            });
        }

        // Control de evento para cerrar sidebar en móviles
        const sidebarClose = document.getElementById('sidebarClose');
        if(sidebarClose) {
            sidebarClose.addEventListener('click', function() {
                const sidebar = document.getElementById('sidebar');
                if(sidebar) {
                    sidebar.classList.toggle('collapsed');
                }
            });
        }
        
        // Actualizar tema según preferencia del usuario (si se implementa)
        const savedTheme = localStorage.getItem('theme');
        if(savedTheme === 'dark') {
            document.body.classList.add('dark-mode');
        }
        
        // Inicializar todos los tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
    </script>

    <!-- Scripts locales -->
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')
</body>
</html>