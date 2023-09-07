@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <div class="content-wrapper">

        <div class="content-header"></div>

        <div class="content">
            <div class="container">
                <div class="row">

                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="text-center">
                                    <img class="img-fluid img-circle" src="{{ asset('img/rr.webp') }}"
                                        alt="User profile picture">
                                </div>

                                <ul class="list-group list-group-unbordered my-3">
                                    <li class="list-group-item">
                                        <b> Saldo <span class="float-right text-primary"> 999.999 </span> </b>
                                    </li>
                                    <li class="list-group-item">
                                        <b> Pengeluaran bulan ini <span class="float-right text-danger"> 999.999 </span>
                                        </b>
                                    </li>
                                </ul>
                                <a href="#" class="btn btn-primary"><b>Pemasukan</b></a>
                                <a href="#" class="btn btn-danger float-right"><b>Pengeluaran</b></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h3 class="card-title"> <strong> Pengeluaran </strong> </h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover tableBudgeting">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Nama</th>
                                            <th>File</th>
                                            <th>Pengeluaran</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"> <strong> Pemasukan </strong> </h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover tableBudgeting">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>File</th>
                                            <th>Pengeluaran</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </div>

@endsection
