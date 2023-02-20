@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-14">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data Barang Keluar
                        <a href="{{ route('barangkeluar.create') }}" class="btn btn-sm btn-primary" style="float: right">
                            Tambah Data
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Transaksi</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Barang</th>
                                        <th>Satuan Barang</th>
                                        <th>Tujuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($barangkeluar as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->id_transaksi }}</td>
                                            <td>{{ $data->tanggal_keluar }}</td>
                                            <td>{{ $data->barangkeluar2->kode_barang ?? ""}}</td>
                                            <td>{{ $data->DataBarang2->nama_barang ?? ""}}</td>
                                            <td>{{ $data->jumlah_barang }}</td>
                                            <td>{{ $data->SatuanBarang->nama_satuan_barang ?? ""}}</td>
                                            <td>{{ $data->alamat }}</td>

                                            <td>
                                                <form action="{{ route('barangkeluar.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('barangkeluar.edit', $data->id) }}"
                                                        class="btn btn-sm btn-outline-warning" style="border-radius: 20px">
                                                        Edit
                                                    </a>
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Apakah Anda Yakin?')" style="border-radius: 20px">
                                                        Delete
                                                    </button>
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
@endsection
