@extends('layouts.app')

@section('content')
<div class="card card-shadow">

    <div class="card-header bg-info text-white">
        <h4>Detalles de Categoría</h4>
    </div>

    <div class="card-body">

        <h5><strong>Nombre:</strong> {{ $category->name }}</h5>
        <p><strong>Descripción:</strong> {{ $category->description }}</p>

        <a href="{{ route('categories.edit',$category) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Volver</a>

    </div>
</div>
@endsection
