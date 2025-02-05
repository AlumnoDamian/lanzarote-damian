@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Listado de Usuarios</h1>
    <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Nuevo Usuario</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->getRoleNames() as $role)
                            {{ ucfirst($role) }} @if (!$loop->last), @endif
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
@endsection
