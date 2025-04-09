@extends('layouts.app')

@section('title', 'Asignar Rol')

@section('content')
<div class="container ">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-4 header-custom">
        <h1 class="mb-0">Gestionar Usuarios</h1>
        <div class="button-group">
            <div class="search-container">
                <div id="searchBar" class="search-bar">
                    <button id="searchButton" class="btn btn-icon btn-search">
                        <i class="fas fa-search"></i>
                    </button>
                    <input type="text" class="form-control" placeholder="Buscar...">
                </div>
            </div>

            <button id="filterButtonUsuarios" class="btn btn-filter">
                <i class="fas fa-filter"></i>
            </button>
            

            <select id="exportButton" class="btn btn-warning">
                <option value="">Exportar</option>
                <option value="csv">Exportar como CSV</option>
                <option value="excel">Exportar como Excel</option>
                <option value="pdf">Exportar como PDF</option>
            </select>
            
            <a href="{{ route('admin.users.create') }}" class="btn btn-custom-green">
                <i class="fas fa-plus"></i> Crear Nuevo Usuario
            </a>
            <a href="{{ route('home') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>

    <div id="filterOptionsUsuarios" class="filter-options" style="display: none;">
        <div class="filter-section">
            <label class="filter-label">
                <input type="checkbox" id="filterByRoleUsuarios" checked> 
                Filtrar por rol
            </label>
            <select id="roleFilterUsuarios" class="form-control">
                <option value="">Todos los roles</option>
            </select>
        </div>
    
        <button id="applyFilterButtonUsuarios" class="btn btn-primary">
            Aplicar Filtros
        </button>
    </div>
    
    <div class="table-container table-custom">
        <table class="table table-striped table-bordered table-custom">
            <thead>
                <tr>
                    <th>
                        <label class="custom-checkbox">
                            <input type="checkbox" id="select_all">
                            <span class="checkmark"></span>
                        </label>
                    </th>
                    <th>Codigo</th>
                    <th>Nombre de Usuario</th>
                    <th>Email</th>
                    <th>Rol Actual</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>
                        <label class="custom-checkbox">
                            <input type="checkbox" class="selectRow">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
                    <td class="text-center">
                        <div class="d-flex align-items-center justify-content-center gap-2">
                            <!-- Formulario para asignar rol -->
                           
                    
                            <!-- Botón de editar -->
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-icon btn-edit" title="Editar">
                                <svg class="editar" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.5" d="M4 21h16M5.666 13.187A2.28 2.28 0 0 0 5 14.797V18h3.223c.604 0 1.183-.24 1.61-.668l9.5-9.505a2.28 2.28 0 0 0 0-3.22l-.938-.94a2.277 2.277 0 0 0-3.222.001z"/>
                                </svg>
                            </a>
                    
                            <!-- Formulario de eliminación -->
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-delete" title="Eliminar" onclick="return confirm('¿Estás seguro?')">
                                    <svg class="eliminar" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M18 19a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3V7H4V4h4.5l1-1h4l1 1H19v3h-1zM6 7v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V7zm12-1V5h-4l-1-1h-3L9 5H5v1zM8 9h1v10H8zm6 0h1v10h-1z"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                    
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
