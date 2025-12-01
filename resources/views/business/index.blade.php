@extends('layouts.app')

@section('content')
<div class="card card-shadow">
    <div class="card-header bg-primary text-white">
        <div class="d-flex justify-content-between">
            <h4 class="m-0">Lista de Negocios</h4>
            <a href="{{ route('businesses.create') }}" class="btn btn-light">Crear Nuevo</a>
        </div>
    </div>

    <div class="card-body">

        <form method="GET" class="d-flex mb-3">
            <input name="q" class="form-control me-2" placeholder="Buscar negocio...">
            <button class="btn btn-primary">Buscar</button>
        </form>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($businesses as $b)
                <tr>
                    <td>{{ $b->name }}</td>
                    <td>{{ $b->address }}</td>
                    <td>{{ $b->phone }}</td>
                    <td>{{ $b->email }}</td>
                    <td>
                        @if($b->logo)
                            <img src="/storage/{{ $b->logo }}" width="60">
                        @else
                            <span class="text-muted">Sin logo</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('businesses.show',$b) }}">Ver</a>
                        <a class="btn btn-warning btn-sm" href="{{ route('businesses.edit',$b) }}">Editar</a>

                        <form action="{{ route('businesses.destroy',$b) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

        {{ $businesses->links() }}

    </div>
</div>
@endsection
