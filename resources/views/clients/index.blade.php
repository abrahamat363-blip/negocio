@extends('layouts.app')

@section('content')
<h1>Clientes</h1>
<table>
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Teléfono</th>
        <th>Dirección</th>
    </tr>
    @foreach($clients as $client)
    <tr>
        <td>{{ $client->name }}</td>
        <td>{{ $client->email }}</td>
        <td>{{ $client->phone }}</td>
        <td>{{ $client->address }}</td>
    </tr>
    @endforeach
</table>

{{ $clients->links() }}
@endsection
