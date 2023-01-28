@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Satuan Barang
                    </div>
                    <div class="card-body">
                        <form action="{{ route('satuan.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Satuan Barang</label>
                                <input type="text" class="form-control  @error('nama_satuan_barang') is-invalid @enderror"
                                    name="nama_satuan_barang">
                                @error('nama_satuan_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
