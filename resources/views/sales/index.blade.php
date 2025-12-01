@extends('layouts.app')

@section('content')
<h1>Ventas</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Total</th>
        <th>Estado</th>
    </tr>
    @foreach($sales as $sale)
    <tr>
        <td>{{ $sale->id }}</td>
        <td>{{ $sale->client->name ?? 'N/A' }}</td>
        <td>{{ $sale->total }}</td>
        <td>{{ $sale->status }}</td>
    </tr>
    @endforeach
</table>

{{ $sales->links() }}
@endsection
