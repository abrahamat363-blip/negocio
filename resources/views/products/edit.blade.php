@extends('layouts.app')

@section('content')
<div class="card card-shadow">

    <div class="card-header bg-warning">
        <h4>Editar Producto</h4>
    </div>

    <div class="card-body">

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update',$product) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nombre</label>
                <input name="name" class="form-control" value="{{ $product->name }}">
            </div>

            <div class="mb-3">
                <label>Descripción</label>
                <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label>Precio</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}">
            </div>

            <div class="mb-3">
                <label>Stock</label>
                <input type="number" name="stock" class="form-control" value="{{ $product->stock }}">
            </div>
            <div class="mb-3">
    <label>Categoría</label>
    <select name="category_id" class="form-control">
        @foreach(\App\Models\Category::all() as $cat)
            <option value="{{ $cat->id }}" @if($cat->id == $product->category_id) selected @endif>
                {{ $cat->name }}
            </option>
        @endforeach
    </select>
</div>


            <button class="btn btn-warning">Actualizar</button>
        </form>

    </div>
</div>
@endsection
