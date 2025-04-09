@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="form-container">
        <div class="form-header d-flex justify-content-between align-items-center">
            <h1 class="mb-0">Registrar Cliente</h1>
            <a href="{{ route('admin.clientes_registrados.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
        <form action="{{ route('admin.clientes_registrados.store') }}" method="POST">
            @csrf

            <!-- Campos del formulario -->

            <div class="form-group">
                <label for="cliente_id" class="form-label">Nombre del Cliente</label>
                <select name="cliente_id" id="cliente_id" class="form-control" required>
                    <option value="" class="option">Seleccione un cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellido }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="user_id" class="form-label">Nombre de Usuario</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="" class="option">Seleccione un usuario</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tipo_membresia_id" class="form-label">Tipo de Membresía</label>
                <select name="tipo_membresia_id" id="tipo_membresia_id" class="form-control" required>
                    <option value="" class="option">Seleccione un tipo de membresía</option>
                    @foreach($tiposMembresia as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="duracion" class="form-label">Duración (días)</label>
                <input type="number" name="duracion" id="duracion" class="form-control" placeholder="Duración (días)" required>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">Guardar Cliente</button>
                <a href="{{ route('admin.clientes_registrados.index') }}" class="btn btn-secondary me-md-2">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection