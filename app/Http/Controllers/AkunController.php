<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $akun = \App\Akun::all();
        return view('admin.akun.akun', ['akun' => $akun]); //array
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.akun.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //untuk menyimpan data
        $tambah_akun = new \App\Akun;

        $tambah_akun->no_akun = $request->addnoakun;
        $tambah_akun->nm_akun = $request->addnmakun;
        $tambah_akun->save(); //method

        Alert::success('Pesan', 'Data tersimpan'); //child dari alert, sukses atau gagal disebut polymorpy

        return redirect('/akun'); //prosedur

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
    public function edit($no_akun)
    {
        //
        $akun = DB::table('akun')->where('no_akun', $no_akun)->get();
        
        return view('admin.akun.editAkun', ['akun'=> $akun]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $no_akun)
    {
        //untuk update data
        $update_akun = \App\Akun::findOrFail($no_akun);

        $update_akun->no_akun = $request->addnoakun;
        $update_akun->nm_akun = $request->addnmakun;
        $update_akun->save(); //method

        Alert::success('Update', 'Data terupdate'); //child dari alert, sukses atau gagal disebut polymorpy

        return redirect('/akun'); //prosedur
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($no_akun)
    {
        //
        $akun = \App\Akun::findOrFail($no_akun);
        $akun->delete();

        Alert::success('Pesan', 'Data terhapus');

        return redirect()->route('akun.index');
    }
}
