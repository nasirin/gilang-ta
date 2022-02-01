@extends('layouts.BasicTemplate')

@section('content')
<div class="pagetitle">
    <h1>Karyawan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Karyawan</li>
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
                            <h5 class="card-title">Form Karyawan</h5>

                            <form method="POST" action="/employee">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" required class="form-control" autofocus name="username">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" required name="password">
                                    </div>
                                </div>
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Akses</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="akses" id="gridRadios1" value="admin">
                                            <label class="form-check-label" for="gridRadios1">
                                                Admin
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="akses" id="gridRadios2" value="kasir" checked>
                                            <label class="form-check-label" for="gridRadios2">
                                                Kasir
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

                            <h5 class="card-title">Data Karyawan</h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Akses</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employee as $key => $value)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$value['username']}}</td>
                                        <td>{{$value['password']}}</td>
                                        <td>{{$value['akses']}}</td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#basicModal{{$value['id']}}" class="btn btn-warning btn-sm" data-bs><i class="bi bi-pencil"></i></button>
                                            <form action="/employee/{{$value['id']}}" method="post" class="d-inline">
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

@foreach($employee as $value)
<div class="modal fade" id="basicModal{{$value['id']}}" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Basic Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/employee/{{$value['id']}}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" autofocus name="username" value="{{$value['username']}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" required name="password" value="{{$value['password']}}">
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Akses</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="akses" id="gridRadios1" value="admin" <?= $value['akses'] == 'admin' ? "checked" : '' ?>>
                                <label class="form-check-label" for="gridRadios1">
                                    Admin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="akses" id="gridRadios2" value="kasir" <?= $value['akses'] == 'kasir' ? "checked" : '' ?>>
                                <label class="form-check-label" for="gridRadios2">
                                    Kasir
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
</div>
@endforeach
@endSection()