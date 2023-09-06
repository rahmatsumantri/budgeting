@extends('layouts.main')

@section('title', 'Kategori Pengeluaran')

@section('content')

    <div class="content-wrapper">

        <div class="content-header"></div>

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"> <strong> Kategori Pengeluaran </strong> </h3>
                                <div class="float-right">
                                    <a href="{{ route('outcome-categories.create') }}" class="btn btn-primary btn-outline">
                                        Tambah </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover tableBudgeting">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th width='15%'></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($outcomeCategories as $outcomeCategory)
                                            <tr>
                                                <td> {{ $outcomeCategory->name }} </td>
                                                <td class="text-center d-flex justify-content-center">
                                                    <a href="{{ route('outcome-categories.edit', $outcomeCategory->id) }}"
                                                        class="btn btn-sm btn-primary mr-2"> <i class="fas fa-edit"></i> </a>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('outcome-categories.destroy', $outcomeCategory->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
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

{{-- inline javascript --}}
@push('script')
@endpush
