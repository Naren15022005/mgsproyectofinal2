@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="form-container" id="main">
        <div class="form-header d-flex justify-content-between align-items-center mb-3">
            <h1 class="mb-0">Editar Membresía</h1>
            <a href="{{ route('recepcionista.membresias.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>

        {{-- Mostrar errores si hay --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('recepcionista.membresias.update', $membresia->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="tipo_membresia_id" class="form-label">Tipo de Membresía</label>
                <select name="tipo_membresia_id" id="tipo_membresia_id" class="form-control" required>
                    @foreach($tiposMembresia as $tipo)
                        <option value="{{ $tipo->id }}" {{ $membresia->tipo_membresia_id == $tipo->id ? 'selected' : '' }}>
                            {{ $tipo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Accesos Incluidos</label>
                @foreach($accesos as $acceso)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="accesos[]" value="{{ $acceso->id }}"
                               id="acceso{{ $acceso->id }}"
                               {{ $membresia->opcionesDeAcceso->contains($acceso->id) ? 'checked' : '' }}>
                        <label class="form-check-label" for="acceso{{ $acceso->id }}">
                            {{ $acceso->nombre }}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="form-group mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" name="precio" id="precio" class="form-control" value="{{ $membresia->precio }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="duracion" class="form-label">Cant-días</label>
                <input type="number" name="duracion" id="duracion" class="form-control" value="{{ $membresia->duracion }}" required>
            </div>

            <div class="form-group mb-4">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="activo" {{ $membresia->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ $membresia->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('recepcionista.membresias.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection
