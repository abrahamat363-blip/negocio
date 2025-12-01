@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between">
    <h5>Productos</h5>
    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Nuevo</a>
  </div>
  <div class="card-body">
    <table class="table table-striped">
      <thead><tr><th>SKU</th><th>Nombre</th><th>Categoría</th><th>Precio</th><th>Stock</th><th>Acciones</th></tr></thead>
      <tbody>
        @foreach($products as $p)
        <tr>
          <td>{{ $p->sku }}</td>
          <td>{{ $p->name }}</td>
          <td>{{ $p->category->name ?? '-' }}</td>
          <td>{{ $p->price }}</td>
          <td>{{ $p->stock }}</td>
          <td>
            <a href="{{ route('products.show',$p) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ route('products.edit',$p) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('products.destroy',$p) }}" method="POST" class="d-inline">@csrf @method('DELETE')<button class="btn btn-danger btn-sm" onclick="return confirm('Eliminar?')">Eliminar</button></form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $products->links() }}
  </div>
</div>
@endsection
