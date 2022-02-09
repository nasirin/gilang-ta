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

                            <form method="POST" action="/transaksi">
                                @csrf
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

            </div>
        </div>

    </div>
</section>

@endSection()