@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="form-container">
        <div class="form-header">
            <h1 class="mb-0">Crear Nuevo Flujo</h1>
            <a href="{{ route('admin.flujos.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
        <form action="{{ route('admin.flujos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tipo" class="form-label">Tipo</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value="Ingreso">Ingreso</option>
                    <option value="Egreso">Egreso</option>
                </select>
            </div>
            <div class="form-group">
                <label for="monto" class="form-label">Monto</label>
                <input type="number" name="monto" id="monto" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="categoria_id" class="form-label">Categoría</label>
                <select name="categoria_id" id="categoria_id" class="form-control">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="usuario_id" value="{{ auth()->user()->id }}">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('admin.flujos.index') }}" class="btn btn-cancel me-md-2">Cancelar</a>
                <button type="submit" class="btn btn-submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection
