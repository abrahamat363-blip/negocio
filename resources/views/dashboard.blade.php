@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-3"><div class="card p-3"><h5>Negocios</h5><h2>{{ $businessCount }}</h2></div></div>
  <div class="col-md-3"><div class="card p-3"><h5>Productos</h5><h2>{{ $productCount }}</h2></div></div>
  <div class="col-md-3"><div class="card p-3"><h5>Clientes</h5><h2>{{ $clientCount }}</h2></div></div>
  <div class="col-md-3"><div class="card p-3"><h5>Ventas</h5><h2>{{ $saleCount }}</h2></div></div>
</div>
@endsection
