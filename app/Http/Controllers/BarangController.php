<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barang = \App\Barang::All(); 
        
        return view('admin.barang.barang',['barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.barang.input');
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
        $tambah_barang = new \App\Barang; 
        $tambah_barang->nm_barang = $request->addnmbrg; 
        $tambah_barang->kd_barang = $request->addkdbrg; 
        $tambah_barang->harga = $request->addharga; 
        $tambah_barang->stok = $request->addstok; 
        $tambah_barang->save(); 
        
        Alert::success('Pesan ','Data berhasil disimpan'); 
        
        return redirect('/barang');
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
    public function edit($kd_barang)
    {
        //
        $barang = DB::table('barang')->where('kd_barang', $kd_barang)->get();
        
        return view('admin.barang.editBarang', ['barang'=> $barang]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kd_barang)
    {
        $update_barang = \App\Barang::findOrFail($kd_barang);

        $update_barang->nm_barang = $request->addnmbrg; 
        $update_barang->kd_barang = $request->addkdbrg; 
        $update_barang->harga = $request->addharga; 
        $update_barang->stok = $request->addstok; 
        $update_barang->save(); 

        Alert::success('Update', 'Data terupdate'); //child dari alert, sukses atau gagal disebut polymorpy

        return redirect('/akun'); //prosedur
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_barang)
    {
        //
        $barang = \App\Barang::findOrFail($kd_barang); 
        $barang->delete(); 
        
        Alert::success('Pesan ','Data berhasil dihapus'); 
        
        return redirect()->route('barang.index');
    }
}
