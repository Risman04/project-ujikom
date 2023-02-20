@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data Barang Masuk
                    </div>
                    <div class="card-body">
                        <form action="{{ route('barangkeluar.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Id Transaksi</label>
                                <input type="text" class="form-control  @error('id_transaksi') is-invalid @enderror"
                                    name="id_transaksi" id="kode" value="{{$kode}}" readonly>
                                @error('id_transaksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Keluar</label>
                                <input type="date" class="form-control  @error('tanggal_keluar') is-invalid @enderror"
                                    name="tanggal_keluar">
                                @error('tanggal_keluar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Barang</label>
                                <select name="id_data_barang" class="form-control @error('id_data_barang') is-invalid @enderror" id="">
                                    @foreach($databarang as $data)
                                        <option value="{{ $data->id }}">{{ $data->kode_barang }} | {{ $data->nama_barang }}</option>
                                    @endforeach
                                @error('id_data_barang')
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
                                <label class="form-label">Tujuan</label>
                                <input type="number" class="form-control  @error('alamat') is-invalid @enderror"
                                    name="alamat">
                                @error('alamat')
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
