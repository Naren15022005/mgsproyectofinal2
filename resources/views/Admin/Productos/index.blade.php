@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')
<div class="container ">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-4 header-custom">
        <h1 class="mb-0">Listado de Productos</h1>
        <div class="button-group">
            <div class="search-container">
                <div id="searchBar" class="search-bar">
                    <button id="searchButton" class="btn btn-icon btn-search">
                        <i class="fas fa-search"></i>
                    </button>
                    <input type="text" class="form-control" placeholder="Buscar...">
                </div>
            </div>

            <button id="filterButtonProductos" class="btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024"><path fill="currentColor" d="M384 523.392V928a32 32 0 0 0 46.336 28.608l192-96A32 32 0 0 0 640 832V523.392l280.768-343.104a32 32 0 1 0-49.536-40.576l-288 352A32 32 0 0 0 576 512v300.224l-128 64V512a32 32 0 0 0-7.232-20.288L195.52 192H704a32 32 0 1 0 0-64H128a32 32 0 0 0-24.768 52.288z"/></svg>
            </button>

            <select id="exportButton" class="btn btn-warning">
                <option value="">Exportar</option>
                <option value="csv">Exportar como CSV</option>
                <option value="excel">Exportar como Excel</option>
                <option value="pdf">Exportar como PDF</option>
            </select>

            <a href="{{ route('admin.productos.create') }}" class="btn btn-custom-green">
                <i class="fas fa-plus"></i> Crear Nuevo Producto
            </a>
            <a href="{{ route('home') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>

    <div id="filterOptionsProductos" class="filter-options" style="display: none;">
        <label class="filtrado" for="filterByCategory">
            <input class="custom-checkbox" type="checkbox" id="filterByCategoryProductos"> Filtrar por categoría
        </label>
        <select id="categoryFilterProductos" class="form-control mt-2" style="display: none;">
            <option value="">Todas</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->nombre }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
        <label class="filtrado" for="filterByCategory">
            <input class="custom-checkbox" type="checkbox" id="filterByEstadoProductos"> Filtrar por estado
        </label>
        <select id="estadoFilterProductos" class="form-control mt-2" style="display: none;">
            <option value="">Seleccione un estado</option>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select>
        <button id="applyFilterButtonProductos">Aplicar filtro</button>
    </div>
    

    <div class="table-container">
        <table class="table table-striped table-bordered table-custom">
            <thead>
                <tr>
                    <th>
                        <label class="custom-checkbox">
                            <input type="checkbox" id="select_all">
                            <span class="checkmark"></span>
                        </label>
                    </th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th class="precio">Precio</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th>Categoría</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $index => $producto)
                <tr class="{{ $index % 2 === 0 ? 'row-even' : 'row-odd' }}">
                    <td>
                        <label class="custom-checkbox">
                            <input type="checkbox" class="selectRow">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ Str::limit($producto->descripcion, 50) }}</td>
                    <td class="precio">${{ number_format($producto->precio, 2) }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>
                        <span class="badge {{ $producto->estado ? 'bg-success' : 'bg-danger' }}">
                            {{ $producto->estado ? 'Activo' : 'Inactivo' }}
                        </span>
                    </td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td>
                        @if($producto->imagen)
                            <img src="{{ asset('images/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" width="50" height="50" class="img-thumbnail">
                        @else
                            <span class="text-muted">Sin imagen</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.productos.edit', $producto->id) }}" class="btn btn-icon btn-edit">
                            <svg class="editar" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.5" d="M4 21h16M5.666 13.187A2.28 2.28 0 0 0 5 14.797V18h3.223c.604 0 1.183-.24 1.61-.668l9.5-9.505a2.28 2.28 0 0 0 0-3.22l-.938-.94a2.277 2.277 0 0 0-3.222.001z"/></svg>
                        </a>
                        <form action="{{ route('admin.productos.destroy', $producto->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Estás seguro de querer eliminar este producto?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-icon btn-delete">
                                <svg class="eliminar" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M18 19a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3V7H4V4h4.5l1-1h4l1 1H19v3h-1zM6 7v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V7zm12-1V5h-4l-1-1h-3L9 5H5v1zM8 9h1v10H8zm6 0h1v10h-1z"/></svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Aseguramos que las imágenes se carguen correctamente
    const productImages = document.querySelectorAll('table img');
    productImages.forEach(img => {
        img.addEventListener('error', function() {
            this.src = "{{ asset('images/default-product.jpg') }}";
        });
    });
});
</script>
@endsection