@extends('layouts.BasicTemplate')

@section('content')
<div class="pagetitle">
    <h1>Produk</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Produk</li>
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
                            <h5 class="card-title">Form Produk</h5>

                            <form method="POST" action="/produk">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="kategori_id" aria-label="Default select example" autofocus>
                                            <option selected>-- Pilih kategori --</option>
                                            @foreach($kategori as $value)
                                            <option value="{{$value['id']}}">{{$value['kategori']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Produk</label>
                                    <div class="col-sm-10">
                                        <input type="text" required class="form-control" name="produk" placeholder="Masukan nama Produk">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="number" required class="form-control" name="harga" placeholder="Masukan harga Produk">
                                    </div>
                                </div>
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="available" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                Tersedia
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="sold">
                                            <label class="form-check-label" for="gridRadios2">
                                                Habis
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-10">
                                        <textarea name="keterangan" class="form-control" id="" cols="30" rows="10"></textarea>
                                        <!-- <input type="text" required class="form-control" name="Produk" placeholder="Masukan nama Produk"> -->
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

                            <h5 class="card-title">Data Produk</h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($produk as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value['kategori']['kategori']}}</td>
                                        <td>{{$value['produk']}}</td>
                                        <td>{{$value['status']}}</td>
                                        <td>{{'Rp ' . number_format($value['harga'],0,',','.')}}</td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#basicModal{{$value['id']}}" class="btn btn-warning btn-sm" data-bs><i class="bi bi-pencil"></i></button>
                                            <form action="/produk/{{$value['id']}}" method="post" class="d-inline">
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

@foreach($produk as $value)
<?php
$harga = $value['harga'];
$status = $value['status'];
$keterangan = $value['keterangan'];
$produk = $value['produk'];
?>
<div class="modal fade" id="basicModal{{$value['id']}}" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Ubah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/produk/{{$value['id']}}">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="kategori_id" aria-label="Default select example" autofocus>
                                <option value="{{$value['kategori']['id']}}">-- selected {{$value['kategori']['kategori']}} --</option>
                                @foreach($kategori as $value)
                                <option value="{{$value['id']}}">{{$value['kategori']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Produk</label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" name="produk" placeholder="Masukan nama Produk" value="{{$produk}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" required class="form-control" name="harga" placeholder="Masukan harga Produk" value="{{$harga}}">
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="available" <?= $status == 'available' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="gridRadios1">
                                    available
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="sold" <?= $status == 'sold' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="gridRadios2">
                                    Habis
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea name="keterangan" class="form-control" id="" cols="30" rows="10">{{$keterangan}}</textarea>
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