@extends('layouts.BasicTemplate')

@section('content')
<div class="pagetitle">
    <h1>Audit</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Audit</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <form method="POST" action="/audit/">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Tanggal audit</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" readonly value="{{date('d M Y')}}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Barang</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="barang_id" aria-label="Default select example" required>
                                        <option selected>-- Pilih barang --</option>
                                        @foreach($barang as $value)
                                        <option value="{{$value['id']}}">{{$value['barang']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Qty</label>
                                <div class="col-sm-10">
                                    <input type="number" min="0" value="0" class="form-control" name="qty" required>
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
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">

                            <h5 class="card-title">Data Audit</h5>
                            <a href="/audit/create" class="btn btn-sm btn-info mb-3">Laporan</a>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Barang</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($audit as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value['barang']['barang']}}</td>
                                        <td>{{$value['qty']}}</td>
                                        <td>{{$value['barang']['satuan']}}</td>
                                        <td>
                                            <form action="/audit/{{$value['id']}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr> @endforeach
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