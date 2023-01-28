@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data Barang
                    </div>
                    <div class="card-body">
                        <form action="{{ route('databarang.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Kode Barang</label>
                                <input type="text" class="form-control  @error('kode_barang') is-invalid @enderror"
                                    name="kode_barang">
                                @error('kode_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Barang</label>
                                <input type="text" class="form-control  @error('nama_barang') is-invalid @enderror"
                                    name="nama_barang">
                                @error('nama_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Barang</label>
                                <select name="id_jenis_barang" class="form-control @error('id_jenis_barang') is-invalid @enderror" id="">
                                    @foreach($jenis as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_jenis_barang }}</option>
                                    @endforeach
                                @error('id_jenis_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jumlah Barang</label>
                                <input type="number" class="form-control  @error('jumlah_barang') is-invalid @enderror"
                                    name="jumlah_barang">
                                @error('jumlah_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Satuan</label>
                                <select name="id_satuan_barang" class="form-control @error('id_satuan_barang') is-invalid @enderror" id="">
                                    @foreach($satuan as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_satuan_barang }}</option>
                                    @endforeach
                                @error('id_satuan_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </select>
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
