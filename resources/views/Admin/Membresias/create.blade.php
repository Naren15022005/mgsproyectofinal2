@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="form-container" id="main">
        <div class="form-header">
            <h1 class="mb-0">Crear Nueva Membresía</h1>
            <a href="{{ route('admin.membresias.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
        <form action="{{ route('admin.membresias.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tipo_membresia_id" class="form-label">Tipo de Membresía</label>
                <select name="tipo_membresia_id" id="tipo_membresia_id" class="form-control">
                    @foreach($tiposMembresia as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="accesos" class="form-label">Accesos Incluidos</label>
                @foreach($accesos as $acceso)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="accesos[]" value="{{ $acceso->id }}" id="acceso{{ $acceso->id }}">
                        <label class="form-check-label" for="acceso{{ $acceso->id }}">
                            {{ $acceso->nombre }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" name="precio" id="precio" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="duracion" class="form-label">Cant-dias</label>
                <input type="text" name="duracion" id="duracion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-control">
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
            <input type="hidden" name="usuario_id" value="{{ auth()->user()->id }}">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('admin.membresias.index') }}" class="btn btn-cancel me-md-2">Cancelar</a>
                <button type="submit" class="btn btn-submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection
