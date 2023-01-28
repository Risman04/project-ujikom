<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisBarang;

class JenisBarangController extends Controller
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
        $jenis= JenisBarang::all();
        return view('jenis.index' , compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis.create');
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
            'nama_jenis_barang' => 'required',
        ]);

        $jenis = new JenisBarang();
        $jenis->nama_jenis_barang = $request->nama_jenis_barang;
        $jenis->save();
        return redirect()->route('jenis.index')
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
        $jenis = JenisBarang::findOrFail($id);
        return view('jenis.edit', compact('jenis'));
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
        //// validasi
        $validated = $request->validate([
            'nama_jenis_barang' => 'required',
        ]);

        $jenis = JenisBarang::findOrFail($id);
        $jenis->nama_jenis_barang = $request->nama_jenis_barang;
        $jenis->save();
        return redirect()->route('jenis.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis = JenisBarang::findOrFail($id);
        $jenis->delete();
        return redirect()->route('jenis.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
