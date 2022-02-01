@extends('layouts.BasicTemplate')

@section('content')
<div class="pagetitle">
    <h1>Barang</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Barang</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form Barang</h5>

                            <form method="POST" action="/barang">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" required class="form-control" autofocus name="barang" placeholder="Masukan nama barang">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Qty</label>
                                    <div class="col-sm-10">
                                        <input type="number" min="0" value="0" class="form-control" autofocus name="qty">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">

                            <h5 class="card-title">Data Barang</h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Barang</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($barang as $key => $value)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$value['barang']}}</td>
                                        <td>{{$value['qty']}}</td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#basicModal{{$value['id']}}" class="btn btn-warning btn-sm" data-bs><i class="bi bi-pencil"></i></button>
                                            <form action="/barang/{{$value['id']}}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Recent Sales -->

            </div>
        </div>

    </div>
</section>

@foreach($barang as $value)
<div class="modal fade" id="basicModal{{$value['id']}}" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Basic Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/barang/{{$value['id']}}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Barang</label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" autofocus name="barang" placeholder="Masukan nama barang" value="{{$value['barang']}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Qty</label>
                        <div class="col-sm-10">
                            <input type="number" min="0" value="0" class="form-control" autofocus name="qty" value="{{$value['qty']}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endSection()