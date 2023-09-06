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
                
                            <form id="quickForm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                            placeholder="Password">
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                                            <label class="custom-control-label" for="exampleCheck1">I agree to the <a
                                                    href="#">terms of service</a>.</label>
                                        </div>
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

{{-- inline javascript --}}
@push('script')
@endpush



