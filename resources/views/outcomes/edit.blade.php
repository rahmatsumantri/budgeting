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
                                <h3 class="card-title"> Tambah Kategori Pengeluaran</h3>
                            </div>

                            <form action="{{ route('outcome-categories.update', $outcomeCategory->id) }}" method="POST">

                                @csrf
                                @method('PUT')
                                
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name"> Nama </label>
                                        <input type="text" name="name"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('name', $outcomeCategory->name) }}">

                                        <!-- error message untuk name -->
                                        @error('name')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>

@endsection
