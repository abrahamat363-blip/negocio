@extends('layouts.app')

@section('content')
<div class="card card-shadow">
    <div class="card-header bg-primary text-white d-flex justify-content-between">
        <h4 class="m-0">Lista de Productos</h4>
        <a href="{{ route('products.create') }}" class="btn btn-light">Crear Producto</a>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td>${{ number_format($p->price, 2) }}</td>
                    <td>{{ $p->stock }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('products.show',$p) }}">Ver</a>
                        <a class="btn btn-warning btn-sm" href="{{ route('products.edit',$p) }}">Editar</a>

                        <form action="{{ route('products.destroy',$p) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

        {{ $products->links() }}

    </div>
</div>
@endsection
