<!-- filepath: /c:/Users/Naren/OneDrive/Escritorio/mgsproyectofinal2/resources/views/Admin/users/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="form-container">
        <div class="form-header">
            <h1 class="mb-0">Crear Nuevo Usuario</h1>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="new-name">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="new-email">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autocomplete="new-password">
            </div>
            <div class="form-group">
                <label for="role_id" class="form-label">Rol</label>
                <select name="role_id" id="role_id" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-submit">Guardar Usuario</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-cancel me-md-2">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection