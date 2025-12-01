@extends('layouts.app')

@section('content')
<div class="card card-shadow">

    <div class="card-header bg-warning">
        <h4>Editar Categoría</h4>
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

        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nombre</label>
                <input name="name" class="form-control" value="{{ $category->name }}">
            </div>

            <div class="mb-3">
                <label>Descripción</label>
                <textarea name="description" class="form-control">{{ $category->description }}</textarea>
            </div>

            <button class="btn btn-warning">Actualizar</button>

        </form>

    </div>
</div>
@endsection
