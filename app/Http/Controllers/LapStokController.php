<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LapStok; 
use PDF; 
use DB;

class LapStokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = LapStok::All(); 

        return view ('laporan.stok',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $periode = $request->get('periode'); 
        if($periode == 'All') { 
            $bb = \App\LapStok::All(); 
            $akun = \App\Akun::All();
            $pdf = PDF::loadview ('laporan.print', ['laporan' => $bb, 'akun' => $akun])->setPaper('A4','landscape'); 
            
            return $pdf->stream(); 
        } elseif($periode == 'periode'){ 
            $tglawal=$request->get('tglawal'); 
            $tglakhir=$request->get('tglakhir'); 
            $akun = \App\Akun::All(); 
            $bb = DB::table('barang')->whereBetween('tgl_jurnal', [$tglawal,$tglakhir]) ->orderby('tgl_jurnal','ASC')->get(); 
            
            $pdf = PDF::loadview('laporan.print',['laporan'=>$bb, 'akun' => $akun])->setPaper('A4','landscape'); 
            
            return $pdf->stream(); 
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
