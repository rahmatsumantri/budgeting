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
                                        <b> Saldo <span class="float-right text-primary">
                                                {{ number_format($balance, 0, ',', '.') }} </span> </b>
                                    </li>
                                    <li class="list-group-item">
                                        <b> Pengeluaran bulan ini <span class="float-right text-danger">
                                                {{ number_format($outcome_month, 0, ',', '.') }} </span>
                                        </b>
                                    </li>

                                    <li class="list-group-item">
                                        <b> Pengeluaran hari ini <span class="float-right text-danger">
                                                {{ number_format($outcome_day, 0, ',', '.') }} </span>
                                        </b>
                                    </li>
                                </ul>

                                <ul class="list-group list-group-unbordered my-3">
                                    <li class="list-group-item">
                                        <b> Saldo Keropak<span class="float-right text-primary">
                                                {{ number_format($balance_keropak, 0, ',', '.') }} </span> </b>
                                    </li>
                                    <li class="list-group-item">
                                        <b> Pengeluaran Keropak <span class="float-right text-danger">
                                                {{ number_format($outcome_keropak, 0, ',', '.') }} </span>
                                        </b>
                                    </li>
                                </ul>
                                <a href="{{ route('incomes.create') }}" class="btn btn-primary"><b>Pemasukan</b></a>
                                <a href="{{ route('outcomes.create') }}"
                                    class="btn btn-danger float-right"><b>Pengeluaran</b></a>
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
                                            <th>Nama</th>
                                            <th>Kategori</th>
                                            <th>File</th>
                                            <th>Pengeluaran</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($outcomes as $outcome)
                                            <tr>
                                                <td class="align-middle"> {{ date('d/m/Y', strtotime($outcome->date)) }} </td>
                                                <td> {{ $outcome->name }} <br> <small>{{ $outcome->description }}</small></td>
                                                <td class="align-middle"> {{ $outcome->outcamecategory->name }} </td>
                                                <td class="text-center">
                                                    <img src="{{ Storage::url('public/outcomes/') . $outcome->image }}"
                                                        class="rounded" style="width: 150px" alt="">
                                                </td>
                                                <td class="text-right align-middle"> {{ number_format($outcome->budget, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('outcomes.destroy', $outcome->id) }}"
                                                        method="POST">

                                                        @csrf
                                                        @method('DELETE')

                                                        <a href="{{ route('outcomes.edit', $outcome->id) }}"
                                                            class="btn btn-sm btn-primary mr-2"> <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button type="submit" class="btn btn-sm btn-danger"> <i
                                                                class="fas fa-trash"></i> </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
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
                                        @foreach ($incomes as $income)
                                            <tr>
                                                <td class="align-middle"> {{ date('d/m/Y', strtotime($income->date)) }} </td>
                                                <td class="align-middle"> {{ $income->name }} <br> <small>{{ $income->description }}</small></td>
                                                <td class="text-center align-middle">
                                                    <img src="{{ Storage::url('public/incomes/') . $income->image }}"
                                                        class="rounded" style="width: 150px" alt="">
                                                </td>
                                                <td class="text-right align-middle"> {{ number_format($income->budget, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('incomes.destroy', $income->id) }}"
                                                        method="POST">

                                                        @csrf
                                                        @method('DELETE')

                                                        <a href="{{ route('incomes.edit', $income->id) }}"
                                                            class="btn btn-sm btn-primary mr-2"> <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button type="submit" class="btn btn-sm btn-danger"> <i
                                                                class="fas fa-trash"></i> </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
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
