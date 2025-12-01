@extends('layouts.app')

@section('content')
<div class="card card-shadow">

    <div class="card-header bg-info text-white">
        <h4>Detalles del Producto</h4>
    </div>

    <div class="card-body">

        <h5><strong>Nombre:</strong> {{ $product->name }}</h5>
        <p><strong>Descripción:</strong> {{ $product->description }}</p>
        <p><strong>Precio:</strong> ${{ number_format($product->price,2) }}</p>
        <p><strong>Stock:</strong> {{ $product->stock }}</p>

        <a href="{{ route('products.edit',$product) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>

    </div>
</div>
@endsection
