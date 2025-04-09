@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="form-container">
        <div class="form-header">
            <h1 class="mb-0">Editar Producto</h1>
            <a href="{{ route('recepcionista.productos.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
        <form action="{{ route('recepcionista.productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $producto->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ $producto->descripcion }}</textarea>
            </div>
            <div class="form-group">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" name="precio" id="precio" class="form-control" value="{{ $producto->precio }}" required>
            </div>
            <div class="form-group">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" id="stock" class="form-control" value="{{ $producto->stock }}" required>
            </div>
            <div class="form-group">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-control">
                    <option value="1" {{ $producto->estado ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ !$producto->estado ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="categoria_id" class="form-label">Categoría</label>
                <select name="categoria_id" id="categoria_id" class="form-control" required>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
                @if($producto->imagen)
                    <img src="{{ asset('images/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" width="100" class="mt-2">
                @endif
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn-wide btn-submit">Guardar Cambios</button>
                <a href="{{ route('recepcionista.productos.index') }}" class="btn btn-cancel me-md-2">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection