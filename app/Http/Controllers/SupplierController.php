<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;


class SupplierController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $supplier = \App\Supplier::All(); 
        
        return view('admin.supplier.supplier',['supplier' => $supplier]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.supplier.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $tambah_supp = new \App\Supplier; 
        $tambah_supp->kd_supp = $request->addkdsupp; 
        $tambah_supp->nm_supp = $request->addnmsupp; 
        $tambah_supp->alamat = $request->addalamat; 
        $tambah_supp->no_telp = $request->addnotelp; 
        $tambah_supp->save(); 
        
        Alert::success('Pesan ','Data berhasil disimpan'); 
        
        return redirect('/supplier');
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
    public function edit($kd_supp)
    {
        //
        $supplier = DB::table('supplier')->where('kd_supp', $kd_supp)->get();
        
        return view('admin.supplier.editSupp', ['supplier'=> $supplier]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        // DB::table('barang')->where('kd_barang', $request->kd_barang)->update([
        //     'kd_barang' => $request->addkdbrg,
        //     'nm_barang' => $request->addnmbrg,
        //     'harga' => $request->addharga,
        //     'stok' => $request->addstok,
        //     ]);

        Alert::success('Pesan ','Data berhasil diupdate'); 
        
        return redirect('/supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_supp)
    {
        //
        $supp = \App\Supplier::findOrFail($kd_supp); 
        $supp->delete(); 
        
        Alert::success('Pesan ','Data berhasil dihapus'); 
        
        return redirect()->route('supplier.index');
    }
}
