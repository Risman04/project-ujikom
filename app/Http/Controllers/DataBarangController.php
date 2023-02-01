<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarang;
use App\Models\JenisBarang;
use App\Models\SatuanBarang;
use App\Models\BarangMasuk;


class DataBarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databarang = DataBarang::get();
        return view('databarang.index' , ['databarang' => $databarang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = JenisBarang::all();
        $satuan = SatuanBarang::all();
        $masuk = BarangMasuk::all();
        return view('databarang.create', compact('jenis', 'satuan', 'masuk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi
        $validated = $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'id_jenis_barang' => 'required',
            'id_jumlah_barang' => 'required',
            'id_satuan_barang' => 'required',
        ]);

        $databarang = new DataBarang();
        $databarang->kode_barang = $request->kode_barang;
        $databarang->nama_barang = $request->nama_barang;
        $databarang->id_jenis_barang = $request->id_jenis_barang;
        $databarang->id_jumlah_barang = $request->id_jumlah_barang;
        $databarang->id_satuan_barang = $request->id_satuan_barang;
        $databarang->save();
        return redirect()->route('databarang.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $databarang = DataBarang::findOrFail($id);
        $jenis = JenisBarang::all();
        $satuan = SatuanBarang::all();
        $masuk = BarangMasuk::all();
        return view('databarang.edit', compact('databarang', 'jenis', 'satuan', 'masuk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validasi
        $validated = $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'id_jenis_barang' => 'required',
            'id_jumlah_barang' => 'required',
            'id_satuan_barang' => 'required',
        ]);

        $databarang = DataBarang::findOrFail($id);
        $jenis = JenisBarang::findOrFail($id);
        $satuan = SatuanBarang::findOrFail($id);
        $databarang->kode_barang = $request->kode_barang;
        $databarang->nama_barang = $request->nama_barang;
        $databarang->id_jenis_barang = $request->id_jenis_barang;
        $databarang->id_jumlah_barang = $request->id_jumlah_barang;
        $databarang->id_satuan_barang = $request->id_satuan_barang;
        $databarang->save();
        
        return redirect()->route('databarang.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $databarang = DataBarang::findOrFail($id);
        $databarang->delete();
        return redirect()->route('databarang.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
