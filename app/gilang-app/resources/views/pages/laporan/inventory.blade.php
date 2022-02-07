@extends('layouts.LaporanTemplate')

@section('content')
<div class="text-center">
    <p>{{$title}}</p>
    <p>{{$date}}</p>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Barang</th>
            <th scope="col">Qty</th>
            <th scope="col">Satuan</th>
            <th scope="col">Harga</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>@mdo</td>
        </tr>
    </tbody>
</table>
@endsection