@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data Barang
                        <a href="{{ route('databarang.create') }}" class="btn btn-sm btn-primary" style="float: right">
                            Tambah Data
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Jumlah Barang</th>
                                        <th>Satuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($databarang as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->kode_barang }}</td>
                                            <td>{{ $data->nama_barang }}</td>
                                            <td>{{ $data->JenisBarang->nama_jenis_barang ?? "" }}</td>
                                            <td>{{ $data->jumlah_barang }}</td>
                                            <td>{{ $data->SatuanBarang->nama_satuan_barang ?? ""}}</td>

                                            <td>
                                                <form action="{{ route('databarang.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('databarang.edit', $data->id) }}"
                                                        class="btn btn-sm btn-outline-warning">
                                                        Edit
                                                    </a>
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Apakah Anda Yakin?')">Delete
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
