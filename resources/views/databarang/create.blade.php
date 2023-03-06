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
                                <input type="text" class="form-control boxed @error('kode_barang') is-invalid @enderror"
                                    name="kode_barang" id="kode" value="{{ $kode }}" readonly>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function() {
        $('#category').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: '/admin/getSub_category/' + category_id,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#sub_category').empty();
                            $('#sub_category').append(
                                '<option hidden>Pilih Sub Kategori</option>');
                            $.each(data, function(key, sub_category) {
                                $('select[name="sub_category_id"]').append(
                                    '<option value="' + sub_category.id + '">' +
                                    sub_category.name + '</option>');
                            });
                        } else {
                            $('#sub_category').empty();
                        }
                    }
                });
            } else {
                $('#sub_category').empty();
            }
        });
    });
</script>