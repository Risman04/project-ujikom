<?php

namespace App\Http\Controllers;

use App\Models\DataSupplier;
use Illuminate\Http\Request;
use Session;

class DataSupplierController extends Controller
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
        $supplier= DataSupplier::all();
        return view('supplier.index' , compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = DataSupplier::kode();
        $supplier = DataSupplier::all();
        return view('supplier.create' , compact('kode', 'supplier'));
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
            'kode_supplier' => 'required',
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|min:12',
        ]);

        $supplier = new DataSupplier();
        $supplier->kode_supplier = $request->kode_supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat = $request->alamat;
        $supplier->telepon = $request->telepon;
        $supplier->save();
        return redirect()->route('supplier.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataSupplier  $dataSupplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataSupplier  $dataSupplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = DataSupplier::findOrFail($id);
        $kode= DataSupplier::kode();
        return view('supplier.edit', compact('kode', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataSupplier  $dataSupplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validasi
        $validated = $request->validate([
            'kode_supplier' => 'required',
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|min:12',
        ]);

        $supplier = DataSupplier::findOrFail($id);
        $supplier->kode_supplier = $request->kode_supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat = $request->alamat;
        $supplier->telepon = $request->telepon;
        $supplier->save();
        return redirect()->route('supplier.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataSupplier  $dataSupplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = DataSupplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('supplier.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
