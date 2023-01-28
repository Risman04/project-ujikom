<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SatuanBarang;

class SatuanBarangController extends Controller
{
    public function _construct()
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
        $satuan= SatuanBarang::all();
        return view('satuan.index' , compact('satuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('satuan.create');
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
            'nama_satuan_barang' => 'required',
        ]);

        $satuan = new SatuanBarang();
        $satuan->nama_satuan_barang = $request->nama_satuan_barang;
        $satuan->save();
        return redirect()->route('satuan.index')
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
        $satuan = SatuanBarang::findOrFail($id);
        return view('satuan.edit', compact('satuan'));
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
            'nama_satuan_barang' => 'required',
        ]);

        $satuan = SatuanBarang::findOrFail($id);
        $satuan->nama_satuan_barang = $request->nama_satuan_barang;
        $satuan->save();
        return redirect()->route('satuan.index')
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
        $satuan = SatuanBarang::findOrFail($id);
        $satuan->delete();
        return redirect()->route('satuan.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
