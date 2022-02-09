@extends('layouts.BasicTemplate')

@section('content')
<div class="pagetitle">
    <h1>Transaksi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Transaksi</li>
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
                            <h5 class="card-title">Form Transaksi</h5>

                            <form method="POST" action="/basket">
                                @csrf
                                <input type="hidden" value="{{$transaksi['id']}}" name="transaksi_id">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Meja</label>
                                    <div class="col-sm-10">
                                        <input type="number" min="1" class="form-control" name="meja" value="1" autofocus required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Produk</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="produk_id" aria-label="Default select example" required>
                                            <option selected>-- Pilih produk --</option>
                                            @foreach($produk as $value)
                                            <option value="{{$value['id']}}" <?= $value['status'] == 'sold' ? 'disabled' : '' ?>>{{$value['produk']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Qty</label>
                                    <div class="col-sm-10">
                                        <input type="number" min="1" class="form-control" name="qty" value="1" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-10">
                                        <textarea name="keterangan" class="form-control"></textarea>
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
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title">Data Transaksi meja {{$transaksi['meja']}}</h5>
                                </div>
                                <div>

                                    <form action="/transaksi/{{$transaksi['id']}}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="btn btn-sm btn-info">Order now</button>
                                    </form>
                                </div>

                            </div>


                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($detail as $key => $value)
                                    @if($value['transaksi']['status'] == 'pending')
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$value['produk_id']}}</td>
                                        <td>{{"Rp ". number_format($value['produk']['harga'],0,',','.')}}</td>
                                        <td>{{$value['qty']}}</td>
                                        <td>{{"Rp ". number_format($value['total'],0,',','.')}}</td>
                                        <td>
                                            <form action="/transaksi/{{$value['id']}}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endif
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

@endSection()