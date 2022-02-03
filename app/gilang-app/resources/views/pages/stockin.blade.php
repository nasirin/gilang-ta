@extends('layouts.BasicTemplate')

@section('content')
<div class="pagetitle">
    <h1>Stock in</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Stock in</li>
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
                            <h5 class="card-title">Form Stock in</h5>

                            <form method="POST" action="/stockin">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Barang</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="barang_id" aria-label="Default select example">
                                            <option selected>-- Pilih barang --</option>
                                            @foreach($barang as $value)
                                            <option value="{{$value['id']}}">{{$value['barang']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Distributor</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="distributor_id" aria-label="Default select example">
                                            <option selected>-- Pilih distributor --</option>
                                            @foreach($distributor as $value)
                                            <option value="{{$value['id']}}">{{$value['distributor']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Qty</label>
                                    <div class="col-sm-10">
                                        <input type="number" min="0" value="0" class="form-control" name="qty_masuk">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="number" min="0" value="0" class="form-control" name="harga_dist">
                                    </div>
                                </div>
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="checked">
                                            <label class="form-check-label" for="gridRadios1">
                                                Sudah di periksa
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="uncheck" checked>
                                            <label class="form-check-label" for="gridRadios2">
                                                Belum di periksa
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
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

                            <h5 class="card-title">Data Stock in yang belum di periksa </h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tgl masuk</th>
                                        <th scope="col">Barang</th>
                                        <th scope="col">Distributor</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stockin as $key => $value)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{ date_format($value['created_at'],"d/M/Y H:i:s") }}</td>
                                        <td>{{$value['barang']['barang']}}</td>
                                        <td>{{$value['distributor']['distributor']}}</td>
                                        <td>{{$value['qty_masuk']}}</td>
                                        <td>{{'Rp '. number_format($value['harga_dist'],0,',','.')}}</td>
                                        <td>{{$value['status']}}</td>
                                        <td>
                                            <form action="/stockin/{{$value['id']}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="qty" value="{{$value['qty_masuk']}}">
                                                <input type="hidden" name="barang" value="{{$value['barang']['id']}}">
                                                <input type="hidden" name="status" value="checked">
                                                <button type="submit" onclick="return confirm('sudah di periksa?')" class="btn btn-info btn-sm"><i class="bi bi-check-lg"></i></button>
                                            </form>
                                            <form action="/stockin/{{$value['id']}}" method="post" class="d-inline">
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

                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">

                            <h5 class="card-title">Data Stock in yang sudah periksa </h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tgl masuk</th>
                                        <th scope="col">Barang</th>
                                        <th scope="col">Distributor</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stockinChecked as $key => $value)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{ date_format($value['created_at'],"d/M/Y H:i:s") }}</td>
                                        <td>{{$value['barang']['barang']}}</td>
                                        <td>{{$value['distributor']['distributor']}}</td>
                                        <td>{{$value['qty_masuk']}}</td>
                                        <td>{{'Rp '. number_format($value['harga_dist'],0,',','.')}}</td>
                                        <td>{{$value['status']}}</td>
                                        <td>

                                            <form action="/stockin/{{$value['id']}}" method="post" class="d-inline">
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
@endSection()