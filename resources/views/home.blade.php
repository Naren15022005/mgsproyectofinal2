<!-- filepath: /c:/Users/Naren/OneDrive/Escritorio/mgsproyectofinal2/resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <!-- Sección Superior: Tarjetas Resumen -->
    <div class="row g-3 mb-4">
        <!-- Tarjeta Ingresos -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            @if(auth()->user()->hasRole('administrador'))
                <a href="{{ route('admin.flujos.index') }}" class="text-decoration-none">
            @elseif(auth()->user()->hasRole('recepcionista'))
                <a href="{{ route('recepcionista.flujos.index') }}" class="text-decoration-none">
            @endif
                <div class="card shadow-sm hover-card summary-card border">
                    <img src="{{ asset('images/ganancias.png') }}" class="card-img-top card-image" alt="Ingresos">
                    <div class="card-body">
                        <h3 class="card-title mb-2">Ingresos</h3>
                        <p class="card-text fw-bold">
                            {{ number_format($totalIngresos, 0, ',', '.') }} COP
                            <i class="fas fa-plus ms-1"></i>
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Tarjeta Egresos -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            @if(auth()->user()->hasRole('administrador'))
                <a href="{{ route('admin.flujos.index') }}" class="text-decoration-none">
            @elseif(auth()->user()->hasRole('recepcionista'))
                <a href="{{ route('recepcionista.flujos.index') }}" class="text-decoration-none">
            @endif
                <div class="card shadow-sm hover-card summary-card border">
                    <img src="{{ asset('images/gasto.png') }}" class="card-img-top card-image" alt="Egresos">
                    <div class="card-body">
                        <h3 class="card-title mb-2">Egresos</h3>
                        <p class="card-text fw-bold">
                            {{ number_format($totalEgresos, 0, ',', '.') }} COP
                            <i class="fas fa-plus ms-1"></i>
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Tarjeta Productos -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            @if(auth()->user()->hasRole('administrador'))
                <a href="{{ route('admin.productos.index') }}" class="text-decoration-none">
            @elseif(auth()->user()->hasRole('recepcionista'))
                <a href="{{ route('recepcionista.productos.index') }}" class="text-decoration-none">
            @endif
                <div class="card shadow-sm hover-card summary-card border">
                    <img src="{{ asset('images/agregar-producto.png') }}" class="card-img-top card-image" alt="Productos">
                    <div class="card-body">
                        <h3 class="card-title mb-2">Productos</h3>
                        <p class="card-text fw-bold">
                            {{ number_format($totalProductos, 0, ',', '.') }} Items
                            <i class="fas fa-plus ms-1"></i>
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Tarjeta Clientes -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            @if(auth()->user()->hasRole('administrador'))
                <a href="{{ route('admin.cliente.index') }}" class="text-decoration-none">
            @elseif(auth()->user()->hasRole('recepcionista'))
                <a href="{{ route('recepcionista.clientes.index') }}" class="text-decoration-none">
            @endif
                <div class="card shadow-sm hover-card summary-card border">
                    <img src="{{ asset('images/servicio-al-cliente.png') }}" class="card-img-top card-image" alt="Clientes">
                    <div class="card-body">
                        <h3 class="card-title mb-2">Clientes</h3>
                        <p class="card-text fw-bold">
                            {{ number_format($totalClientes, 0, ',', '.') }}
                            <i class="fas fa-plus ms-1"></i>
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Sección de Gráfica y Tabla -->
    <div class="row g-3 mb-4">
        <!-- Gráfica -->
        <div class="col-lg-7">
            <div class="card shadow-sm h-100 border">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Historial Financiero Anual</h5>
                    <div class="text-muted small">Últimos 5 años</div>
                </div>
                <div class="card-body p-3">
                    <div id="ingresosEgresosChart" class="chart-container" style="height: 300px;"></div>
                </div>
            </div>
        </div>

        <!-- Tabla Clientes Recientes -->
        <div class="col-lg-5">
            <div class="card shadow-sm h-100 border">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Clientes Recientes</h5>
                    @if(auth()->user()->hasRole('administrador'))
                        <a href="{{ route('admin.cliente.index') }}" class="btn btn-light-green btn-sm">
                    @elseif(auth()->user()->hasRole('recepcionista'))
                        <a href="{{ route('recepcionista.clientes.index') }}" class="btn btn-light-green btn-sm">
                    @endif
                        Ver más <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped custom-table">
                            <thead class="bg-white">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telefono</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientesRecientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->id }}</td>
                                    <td>{{ $cliente->nombre ?? 'N/A' }}</td>
                                    <td>{{ $cliente->email ?? 'N/A' }}</td>
                                    <td>{{ $cliente->telefono ?? 'N/A' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border: none;
    border-radius: 12px;
    overflow: hidden;
    transition: box-shadow 0.3s ease;
}

.card:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.card-header {
    background-color: #ffffff;
    border-bottom: 1px solid #e9ecef;
    padding: 1rem;
}

.card-body {
    padding: 1rem;
}

.chart-container {
    position: relative;
    width: 100%;
    height: 100%;
    min-height: 250px; /* Altura mínima para la gráfica */
}

.text-muted {
    color: #6c757d !important;
}

.summary-card {
    transition: transform 0.2s;
    border-radius: 12px;
    overflow: hidden;
}

.summary-card:hover {
    transform: translateY(-5px);
}

.card-image {
    height: 150px;
    object-fit: contain;
    padding: 15px;
}

.chart-card {
    border-radius: 12px;
    overflow: hidden;
}

.stats-card {
    border-radius: 12px;
    transition: transform 0.2s;
}

.stats-card:hover {
    transform: translateY(-3px);
}

.icon-container {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
}

.table-hover tbody tr:hover {
    background-color: #f8f9fa;
}

.bg-suspended { background-color: #6c757d; }
.bg-expired { background-color: #212529; }
.bg-paused { background-color: #0dcaf0; }
.bg-no-membership { background-color: #f8f9fa; }

.custom-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    border-radius: 12px;
    overflow: hidden;
}

.custom-table th,
.custom-table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #e9ecef;
}

.custom-table th {
    background-color: #f8f9fa;
    font-weight: 600;
}

.custom-table tbody tr:last-child td {
    border-bottom: none;
}

.btn-light-green {
    background-color: #28a745;
    border-color: #28a745;
    color: #fff;
}

.btn-light-green:hover {
    background-color: #218838;
    border-color: #1e7e34;
}

#ingresosEgresosChart {
    background: white;
    border-radius: 10px;
    min-height: 250px;
    min-width: 250px;
}

.apexcharts-tooltip {
    background: #fff !important;
    border: 1px solid #e0e0e0 !important;
    border-radius: 8px !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
}

.apexcharts-tooltip-title {
    background: #f8f9fa !important;
    border-bottom: 1px solid #dee2e6 !important;
    font-weight: 600 !important;
}

.apexcharts-xaxistooltip,
.apexcharts-yaxistooltip {
    background: #ffffff !important;
    border: 1px solid #dee2e6 !important;
    border-radius: 6px !important;
    color: #2c3e50 !important;
    font-family: inherit !important;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1) !important;
}

.apexcharts-gridline {
    stroke: #f1f3f5 !important;
}

.apexcharts-text.apexcharts-xaxis-label,
.apexcharts-text.apexcharts-yaxis-label {
    fill: #6c757d !important;
    font-size: 0.875rem !important;
}

.apexcharts-legend-text {
    color: #495057 !important;
    font-family: inherit !important;
    font-size: 0.9rem !important;
}

.apexcharts-menu {
    border: 1px solid #dee2e6 !important;
    border-radius: 8px !important;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1) !important;
}

.apexcharts-menu-item:hover {
    background: #f8f9fa !important;
}

/* Responsive */
@media (max-width: 768px) {
    #ingresosEgresosChart {
        min-height: 200px;
        padding: 10px;
    }

    .apexcharts-text.apexcharts-xaxis-label,
    .apexcharts-text.apexcharts-yaxis-label {
        font-size: 0.75rem !important;
    }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const datos = @json($datosFinancieros);
        
        const options = {
            chart: {
                type: 'line',
                height: '100%',
                toolbar: { show: false },
                zoom: { enabled: false }
            },
            series: [
                { 
                    name: 'Ingresos', 
                    data: datos.map(item => item.ingresos),
                    color: '#28a745'
                },
                { 
                    name: 'Egresos', 
                    data: datos.map(item => item.egresos),
                    color: '#dc3545'
                }
            ],
            xaxis: {
                categories: datos.map(item => item.año),
                labels: {
                    style: { fontSize: '12px' }
                },
                axisBorder: { show: false },
                axisTicks: { show: false }
            },
            yaxis: {
                min: 0,
                labels: {
                    formatter: function(value) {
                        return new Intl.NumberFormat('es-CO', {
                            style: 'currency',
                            currency: 'COP',
                            maximumFractionDigits: 0
                        }).format(value);
                    },
                    style: { fontSize: '12px' }
                },
                crosshairs: { show: false }
            },
            grid: {
                borderColor: '#f1f1f1',
                strokeDashArray: 4,
                xaxis: { lines: { show: false } },
                yaxis: { lines: { show: true } }
            },
            stroke: { 
                width: 2, 
                curve: 'smooth',
                lineCap: 'round'
            },
            markers: { 
                size: 5,
                strokeWidth: 2,
                hover: { size: 7 }
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                fontSize: '14px',
                itemMargin: { horizontal: 20 }
            },
            tooltip: {
                y: {
                    formatter: function(value) {
                        return new Intl.NumberFormat('es-CO', {
                            style: 'currency',
                            currency: 'COP',
                            maximumFractionDigits: 0
                        }).format(value);
                    }
                },
                theme: 'light',
                x: { show: false }
            },
            dataLabels: { enabled: false }
        };

        const chart = new ApexCharts(document.querySelector("#ingresosEgresosChart"), options);
        chart.render();
    });
</script>
@endsection