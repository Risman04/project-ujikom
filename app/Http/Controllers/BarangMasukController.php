<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\DataBarang;
use App\Models\SatuanBarang;
use App\Models\DataSupplier;
use Illuminate\Http\Request;
use Session;


class BarangMasukController extends Controller
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
        $barangmasuk = BarangMasuk::get();
        return view('barangmasuk.index' , ['barangmasuk' => $barangmasuk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = BarangMasuk::kode();
        $supplier = DataSupplier::all();
        $databarang = DataBarang::all();
        $satuan = SatuanBarang::all();
        return view('barangmasuk.create', compact('kode', 'databarang', 'satuan', 'supplier'));
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
            'tanggal_masuk' => 'required',
            'id_data_barang' => 'required',
            'id_supplier' => 'required',
            'jumlah_barang' => 'required',
            'id_satuan_barang' => 'required'
        ]);

        $barangmasuk = new BarangMasuk();
        $barangmasuk->id_transaksi = $request->id_transaksi;
        $barangmasuk->tanggal_masuk = $request->tanggal_masuk;
        $barangmasuk->id_data_barang = $request->id_data_barang;
        $barangmasuk->id_supplier = $request->id_supplier;
        $barangmasuk->jumlah_barang = $request->jumlah_barang;
        $barangmasuk->id_satuan_barang = $request->id_satuan_barang;
        $barangmasuk->save();
        return redirect()->route('barangmasuk.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kode = BarangMasuk::kode();
        $barangmasuk = BarangMasuk::findOrFail($id);
        $databarang = DataBarang::all();
        $supplier = DataSupplier::all();
        $satuan = SatuanBarang::all();
        return view('databarang.edit', compact('kode','databarang', 'satuan', 'barangmasuk', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validasi
        $validated = $request->validate([
            'id_transaksi' => 'required',
            'tanggal_masuk' => 'required',
            'id_data_barang' => 'required',
            'id_supplier' => 'required',
            'jumlah_barang' => 'required',
            'id_satuan_barang' => 'required'
        ]);

        $barangmasuk = BarangMasuk::findOrFail($id);
        $databarang = DataBarang::findOrFail($id);
        $satuan = SatuanBarang::findOrFail($id);
        $supplier = DataSupplier::findOrFail($id);
        $barangmasuk->id_transaksi = $request->id_transaksi;
        $barangmasuk->tanggal_masuk = $request->tanggal_masuk;
        $barangmasuk->id_data_barang = $request->id_data_barang;
        $barangmasuk->id_supplier = $request->id_supplier;
        $barangmasuk->jumlah_barang = $request->jumlah_barang;
        $barangmasuk->id_satuan_barang = $request->id_satuan_barang;
        $barangmasuk->save();
        return redirect()->route('barangmasuk.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangmasuk = BarangMasuk::findOrFail($id);
        $barangmasuk->delete();
        return redirect()->route('barangmasuk.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
