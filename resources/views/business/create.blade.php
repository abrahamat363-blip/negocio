@extends('layouts.app')

@section('content')
<div class="card card-shadow">
    <div class="card-header bg-success text-white">
        <h4 class="m-0">Crear Negocio</h4>
    </div>

    <div class="card-body">

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('businesses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Nombre</label>
                <input name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label>Dirección</label>
                <input name="address" class="form-control">
            </div>

            <div class="mb-3">
                <label>Teléfono</label>
                <input name="phone" class="form-control">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label>Logo</label>
                <input type="file" name="logo" class="form-control">
            </div>

            <button class="btn btn-success">Guardar</button>
        </form>

    </div>
</div>
@endsection
