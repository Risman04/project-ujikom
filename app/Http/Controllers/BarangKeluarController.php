<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BarangKeluar;
use App\Models\DataBarang;
use App\Models\SatuanBarang;
use Illuminate\Http\Request;
use Session;

class BarangKeluarController extends Controller
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
        $barangkeluar = BarangKeluar::get();
        return view('barangkeluar.index' , ['barangkeluar' => $barangkeluar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = BarangKeluar::kode();
        $databarang = DataBarang::all();
        $satuan = SatuanBarang::all();
        return view('barangkeluar.create', compact('kode', 'databarang', 'satuan'));
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
            'id_transaksi' => 'required',
            'tanggal_keluar' => 'required',
            'id_data_barang' => 'required',
            'jumlah_barang' => 'required',
            'id_satuan_barang' => 'required',
            'alamat' => 'required'
        ]);

        $barangkeluar = new BarangKeluar();
        $barangkeluar->id_transaksi = $request->id_transaksi;
        $barangkeluar->tanggal_keluar = $request->tanggal_keluar;
        $barangkeluar->id_data_barang = $request->id_data_barang;
        $barangkeluar->jumlah_barang = $request->jumlah_barang;
        $barangkeluar->id_satuan_barang = $request->id_satuan_barang;
        $barangkeluar->alamat = $request->alamat;
        $barangkeluar->save();
        return redirect()->route('barangkeluar.index')
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
        $kode = BarangKeluar::kode();
        $barangkeluar = BarangKeluar::findOrFail($id);
        $databarang = DataBarang::all();
        $satuan = SatuanBarang::all();
        return view('barangkeluar.edit', compact('kode','databarang', 'satuan', 'barangkeluar'));
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
            'id_transaksi' => 'required',
            'tanggal_keluar' => 'required',
            'id_data_barang' => 'required',
            'jumlah_barang' => 'required',
            'id_satuan_barang' => 'required',
            'alamat' => 'required'
        ]);

        $barangkeluar = BarangKeluar::findOrFail($id);
        $databarang = DataBarang::findOrFail($id);
        $satuan = SatuanBarang::findOrFail($id);
        $barangkeluar->id_transaksi = $request->id_transaksi;
        $barangkeluar->tanggal_keluar = $request->tanggal_keluar;
        $barangkeluar->id_data_barang = $request->id_data_barang;
        $barangkeluar->jumlah_barang = $request->jumlah_barang;
        $barangkeluar->id_satuan_barang = $request->id_satuan_barang;
        $barangkeluar->alamat = $request->alamat;
        $barangkeluar->save();
        return redirect()->route('barangkeluar.index')
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
        $barangkeluar = BarangKeluar::findOrFail($id);
        $barangkeluar->delete();
        return redirect()->route('barangkeluar.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
