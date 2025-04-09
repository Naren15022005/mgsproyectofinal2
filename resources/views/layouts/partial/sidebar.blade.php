<!-- resources/views/layouts/partial/sidebar.blade.php -->
<div id="sidebar" class="sidebar">
    <div class="sidebar-header w-100">
        <!-- Logo y nombre de la empresa - Rediseñado -->
        <div class="sidebar-brand">
            <div class="brand-container">
                <img src="{{ $globalConfig->site_logo ? asset('storage/'.$globalConfig->site_logo) : asset('images/logo-default.png') }}" 
                     class="sidebar-logo" 
                     alt="Logo {{ $globalConfig->site_name ?? 'Empresa' }}">
                <div class="company-name-container">
                    <span class="company-name" title="{{ $globalConfig->site_name ?? 'Nombre Empresa' }}">
                        {{ $globalConfig->site_name ?? 'Nombre Empresa' }}
                    </span>
                </div>
            </div>
            <button class="sidebar-close" id="sidebarClose">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16" width="20" height="20">
                    <path d="M4.646 4.646a.5.5 0 011 0L8 7.293l2.354-2.647a.5.5 0 11.708.708L8.707 8l2.647 2.354a.5.5 0 01-.708.708L8 8.707l-2.354 2.647a.5.5 0 01-.708-.708L7.293 8 4.646 5.354a.5.5 0 010-.708z"/>
                </svg>
            </button>
        </div>
    </div>
    
    <div class="sidebar-content">
        <ul class="nav flex-column">
            <!-- Sección Principal -->
            <h2 class="sidebar-heading">Principal</h2>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                    <i class="fas fa-home"></i> <span>Inicio</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.configuracion.*') ? 'active' : '' }}" href="{{ route('admin.configuracion.index') }}">
                    <i class="fas fa-cogs"></i> <span>Configuración</span>
                </a>
            </li>

            <!-- Sección Recepcionista -->
            @if(auth()->user()->hasRole('recepcionista'))
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('recepcionista.caja_dia.*') ? 'active' : '' }}" href="{{ route('recepcionista.caja_dia.index') }}">
                        <i class="fas fa-cash-register"></i> <span>Caja del Día</span>
                    </a>
                </li>
            @endif

            <!-- Sección Áreas -->
            <h2 class="sidebar-heading">Áreas</h2>
            
            @if(auth()->user()->hasRole('administrador'))
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.cliente.*') ? 'active' : '' }}" href="{{ route('admin.cliente.index') }}">
                        <i class="fas fa-users"></i> <span>Clientes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.flujos.*') ? 'active' : '' }}" href="{{ route('admin.flujos.index') }}">
                        <i class="fas fa-exchange-alt"></i> <span>Ingresos y Egresos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.productos.*') ? 'active' : '' }}" href="{{ route('admin.productos.index') }}">
                        <i class="fas fa-box"></i> <span>Productos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                        <i class="fas fa-user"></i> <span>Usuarios</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.membresias.*') ? 'active' : '' }}" href="{{ route('admin.membresias.index') }}">
                        <i class="fas fa-id-card"></i> <span>Membresias</span>
                    </a>
                </li>
            @elseif(auth()->user()->hasRole('recepcionista'))
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('recepcionista.clientes.*') ? 'active' : '' }}" href="{{ route('recepcionista.clientes.index') }}">
                        <i class="fas fa-users"></i> <span>Clientes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('recepcionista.flujos.*') ? 'active' : '' }}" href="{{ route('recepcionista.flujos.index') }}">
                        <i class="fas fa-exchange-alt"></i> <span>Ingresos y Egresos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('recepcionista.productos.*') ? 'active' : '' }}" href="{{ route('recepcionista.productos.index') }}">
                        <i class="fas fa-box"></i> <span>Productos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('recepcionista.membresias.*') ? 'active' : '' }}" href="{{ route('recepcionista.membresias.index') }}">
                        <i class="fas fa-id-card"></i> <span>Membresias</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>

<style>
/* Sidebar principal */
.sidebar {
    height: 100%;
    display: flex;
    flex-direction: column;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    background-color: var(--sidebar-bg);
    color: var(--sidebar-text);
}

/* Contenedor del logo y nombre mejorado */
.sidebar-header {
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
}

.sidebar-brand {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    width: 100%;
}

.brand-container {
    display: flex;
    align-items: center;
    width: calc(100% - 30px);
    overflow: hidden;
}

.sidebar-logo {
    width: 40px;
    height: 40px;
    min-width: 40px;
    object-fit: contain;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.company-name-container {
    margin-left: 12px;
    overflow: hidden;
}

.company-name {
    font-weight: 600;
    font-size: 1rem;
    color: var(--sidebar-text);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    display: block;
    max-width: 100%;
}

/* Para nombres muy largos - truncamiento elegante */
@media (max-width: 992px) {
    .company-name {
        max-width: 150px;
    }
}

.sidebar-close {
    background: transparent;
    border: none;
    color: var(--sidebar-text);
    cursor: pointer;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: color 0.2s;
}

.sidebar-close:hover {
    color: var(--danger);
}

/* Contenido principal del sidebar */
.sidebar-content {
    flex: 1;
    overflow-y: auto;
    padding-top: 0.5rem;
}

/* Estilos mejorados para encabezados y navegación */
.sidebar-heading {
    color: var(--accent);
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05rem;
    padding: 0.75rem 1.25rem 0.5rem;
    margin-top: 0.5rem;
    margin-bottom: 0.25rem;
}

.nav-item {
    margin: 2px 0;
}

.nav-link {
    color: var(--sidebar-text);
    padding: 0.6rem 1.25rem;
    border-radius: 4px;
    margin: 0 0.5rem;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
}

.nav-link i {
    width: 1.5rem;
    text-align: center;
    margin-right: 0.75rem;
    font-size: 0.9rem;
    opacity: 0.85;
}

.nav-link span {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.nav-link:hover {
    background: rgba(255, 255, 255, 0.1);
    color: var(--sidebar-text);
}

.nav-link.active {
    background: var(--primary);
    color: white;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.nav-link.active i {
    opacity: 1;
}

/* Adaptaciones responsivas */
@media (max-width: 768px) {
    .sidebar-heading {
        padding: 0.75rem 1rem 0.5rem;
    }
    
    .nav-link {
        padding: 0.6rem 1rem;
        margin: 0 0.25rem;
    }
    
    /* Añadir soporte para sidebar colapsable en móvil */
    .sidebar.collapsed {
        transform: translateX(-100%);
    }
}

/* Transición suave para el sidebar colapsable */
@media (max-width: 767px) {
    .sidebar {
        position: fixed;
        z-index: 1030;
        width: 250px;
        transition: transform 0.3s ease;
    }
}
</style>