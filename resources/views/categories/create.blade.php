@extends('layouts.app')

@section('content')
<div class="card card-shadow">

    <div class="card-header bg-success text-white">
        <h4>Nueva Categoría</h4>
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

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nombre</label>
                <input name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label>Descripción</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <button class="btn btn-success">Guardar</button>

        </form>

    </div>
</div>
@endsection
