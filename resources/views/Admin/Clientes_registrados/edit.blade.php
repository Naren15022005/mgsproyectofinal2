<!-- filepath: /c:/Users/Naren/OneDrive/Escritorio/mgsproyectofinal2/resources/views/Admin/clientes_registrados/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="form-container">
        <div class="form-header">
            <h1 class="mb-0">Editar Cliente Registrado</h1>
            <a href="{{ route('admin.clientes_registrados.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
        <form action="{{ route('admin.clientes_registrados.update', $clientesRegistrados->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="cliente_id" class="form-label">Cliente</label>
                <select name="cliente_id" id="cliente_id" class="form-control">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $clientesRegistrados->cliente_id == $cliente->id ? 'selected' : '' }}>{{ $cliente->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="user_id" class="form-label">Usuario</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $clientesRegistrados->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="membresia_id" class="form-label">Membresía</label>
                <select name="membresia_id" id="membresia_id" class="form-control">
                    @foreach($membresias as $membresia)
                        <option value="{{ $membresia->id }}" {{ $clientesRegistrados->membresia_id == $membresia->id ? 'selected' : '' }}>{{ $membresia->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tipo_membresia_id" class="form-label">Tipo de Membresía</label>
                <select name="tipo_membresia_id" id="tipo_membresia_id" class="form-control">
                    @foreach($tiposMembresia as $tipoMembresia)
                        <option value="{{ $tipoMembresia->id }}" {{ $clientesRegistrados->tipo_membresia_id == $tipoMembresia->id ? 'selected' : '' }}>{{ $tipoMembresia->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="estado_membresia_id" class="form-label">Estado de Membresía</label>
                <select name="estado_membresia_id" id="estado_membresia_id" class="form-control">
                    @foreach($estadosMembresia as $estadoMembresia)
                        <option value="{{ $estadoMembresia->id }}" {{ $clientesRegistrados->estado_membresia_id == $estadoMembresia->id ? 'selected' : '' }}>{{ $estadoMembresia->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" value="{{ old('fecha_inicio', $clientesRegistrados->fecha_inicio) }}">
                @error('fecha_inicio')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="duracion" class="form-label">Duración (días)</label>
                <input type="number" name="duracion" id="duracion" class="form-control @error('duracion') is-invalid @enderror" value="{{ old('duracion', $clientesRegistrados->duracion) }}">
                @error('duracion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-submit">Actualizar Cliente</button>
                <a href="{{ route('admin.clientes_registrados.index') }}" class="btn btn-cancel me-md-2">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection