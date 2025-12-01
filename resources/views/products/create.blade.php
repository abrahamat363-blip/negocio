@extends('layouts.app')

@section('content')
<h1>Crear producto</h1>

<form method="POST" action="{{ route('products.store') }}">
@csrf

SKU: <input name="sku"><br>
Nombre: <input name="name"><br>
Precio: <input name="price"><br>
Stock: <input name="stock"><br>

<button>Guardar</button>
</form>

@endsection
