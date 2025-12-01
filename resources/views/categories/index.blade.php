@extends('layouts.app')

@section('content')
<div class="card card-shadow">
    <div class="card-header bg-primary text-white d-flex justify-content-between">
        <h4 class="m-0">Categorías</h4>
        <a href="{{ route('categories.create') }}" class="btn btn-light">Nueva Categoría</a>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($categories as $c)
                <tr>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->description }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('categories.show',$c) }}">Ver</a>
                        <a class="btn btn-warning btn-sm" href="{{ route('categories.edit',$c) }}">Editar</a>

                        <form action="{{ route('categories.destroy',$c) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar categoría?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

        {{ $categories->links() }}

    </div>
</div>
@endsection
