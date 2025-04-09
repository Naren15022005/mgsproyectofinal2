<nav class="topbar">
    <div class="topbar-container d-flex align-items-center justify-content-between">
        <!-- Botón para el sidebar -->
        <button class="sidebar-toggle" type="button" id="sidebarToggle">
            <span class="toggler-icon"></span>
        </button>

        <!-- Marca de la barra superior -->
        <div class="topbar-brand">
            @if(Auth::check())
                Bienvenido {{ Auth::user()->name }}
            @else
                Bienvenido Invitado
            @endif
        </div>

        <!-- Dropdown -->
        <div class="dropdown ms-auto">
            <a class="dropdown-toggle d-flex align-items-center" href="#" role="button" 
               id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                @if(Auth::check())
                    {{ Auth::user()->name }}
                @else
                    Menú
                @endif
            </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <!-- Opción Perfil -->
                <!-- Opción Logout -->
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Cerrar Sesión') }}
                    </a>
                </li>

                <!-- Formulario Logout -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script adicional para forzar el funcionamiento del dropdown -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var dropdownToggle = document.getElementById("userDropdown");
        var dropdownMenu = new bootstrap.Dropdown(dropdownToggle);

        dropdownToggle.addEventListener("click", function (event) {
            event.preventDefault(); // Evita que el enlace redirija
            dropdownMenu.toggle(); // Muestra u oculta el menú
        });
    });
</script>
