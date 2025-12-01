@extends('layouts.app')

@section('content')
<div class="card card-shadow">
    <div class="card-header bg-info text-white">
        <h4 class="m-0">Información del Negocio</h4>
    </div>

    <div class="card-body">

        @if($business->logo)
            <img src="/storage/{{ $business->logo }}" width="200" class="mb-3">
        @endif

        <h5><strong>Nombre:</strong> {{ $business->name }}</h5>
        <p><strong>Dirección:</strong> {{ $business->address }}</p>
        <p><strong>Teléfono:</strong> {{ $business->phone }}</p>
        <p><strong>Email:</strong> {{ $business->email }}</p>

        <a class="btn btn-warning" href="{{ route('businesses.edit',$business) }}">Editar</a>
        <a class="btn btn-secondary" href="/businesses">Volver</a>

    </div>
</div>
@endsection
