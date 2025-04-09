<!-- filepath: /c:/Users/Naren/OneDrive/Escritorio/mgsproyectofinal/mgsproyectofinal/backend/resources/views/clientes/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="form-container">
        <div class="form-header">
            <h1 class="mb-0">Agregar Cliente</h1>
            <a href="{{ route('admin.cliente.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
        <form action="{{ route('admin.cliente.store') }}" method="POST">
            @csrf

            <!-- Campos del formulario -->

            <div class="form-group">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="genero" class="form-label">Género</label>
                <select name="genero" id="genero" class="form-control" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>


            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-submit">Guardar Cliente</button>
                <a href="{{ route('admin.cliente.index') }}" class="btn btn-cancel me-md-2">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection