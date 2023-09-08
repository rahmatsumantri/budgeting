@extends('layouts.main')

@section('title', 'Tambah Pengeluaran')

@section('content')

    <div class="content-wrapper">

        <div class="content-header"></div>

        <div class="content">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"> Tambah Pengeluaran</h3>
                            </div>

                            <form action="{{ route('outcomes.store') }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="date"> Tanggal </label>
                                        <input type="text" name="date"
                                            class="form-control @error('date') is-invalid @enderror tanggal"
                                            value="{{ old('date') }}">

                                        <!-- error message -->
                                        @error('date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="date"> Kategori Pengeluaran </label>
                                        <select name="outcome_category_id"
                                            class="form-control @error('outcome_category_id') is-invalid @enderror"
                                            style="width: 100%;">
                                            @foreach ($outcomeCategories as $outcomeCategory)
                                                <option value="{{ $outcomeCategory->id }}"> {{ $outcomeCategory->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <!-- error message -->
                                        @error('outcome_category_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="name"> Nama </label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}">

                                        <!-- error message -->
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description"> Deskripsi </label>
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                            value="{{ old('description') }}"></textarea>

                                        <!-- error message -->
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="image">File</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            name="image">

                                        <!-- error message -->
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="budget"> Budget </label>
                                        <input type="text" name="budget"
                                            class="form-control @error('budget') is-invalid @enderror budget"
                                            value="{{ old('budget') }}">

                                        <!-- error message -->
                                        @error('budget')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>

@endsection
