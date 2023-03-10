@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-14">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data Barang Masuk
                        <a href="{{ route('barangmasuk.create') }}" class="btn btn-sm btn-primary" style="float: right">
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
                                        <th>Tanggal Masuk</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Pengirim</th>
                                        <th>Jumlah Barang</th>
                                        <th>Satuan Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($barangmasuk as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->id_transaksi }}</td>
                                            <td>{{ $data->tanggal_masuk }}</td>
                                            <td>{{ $data->DataBarang2->kode_barang ?? ""}}</td>
                                            <td>{{ $data->DataBarang2->nama_barang ?? ""}}</td>
                                            <td>{{ $data->DataSupplier->nama_supplier ?? "" }}</td>
                                            <td>{{ $data->jumlah_barang }}</td>
                                            <td>{{ $data->SatuanBarang->nama_satuan_barang ?? ""}}</td>

                                            <td>
                                                <form action="{{ route('barangmasuk.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('barangmasuk.edit', $data->id) }}"
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
