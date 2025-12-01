<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Business Manager</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ route('dashboard') }}">BusinessManager</a>
    <div class="d-flex">
      <a class="btn btn-outline-light me-2" href="{{ route('businesses.index') }}">Negocios</a>
      <a class="btn btn-outline-light me-2" href="{{ route('products.index') }}">Productos</a>
      <a class="btn btn-outline-light me-2" href="{{ route('clients.index') }}">Clientes</a>
      <a class="btn btn-outline-light me-2" href="{{ route('sales.index') }}">Ventas</a>
    </div>
  </div>
</nav>

<div class="container">
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
  @endif

  @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
