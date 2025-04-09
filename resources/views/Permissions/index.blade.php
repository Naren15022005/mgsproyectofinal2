@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Permisos del Rol Administrador</h1>
    <ul>
        @foreach($permissions as $permission)
            <li>{{ $permission->name }}</li>
        @endforeach
    </ul>
</div>
@endsection
