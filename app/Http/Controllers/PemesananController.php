<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Supplier;
use App\Pemesanan;
use App\Pemesanan_tem;
use App\Temp_pesan;
use Alert;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun = \App\Akun::All();
        $barang = \App\Barang::All();
        $supplier = \App\Supplier::All();
        $temp_pesan = \App\Temp_pesan::All();

        //Penomoran otomatis untuk transaksi pemesanan

        $awal = 'TRX';
        $bulanRomawi = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $noUrutAkhir = \App\Pemesanan::max('no_pesan');
        $no = 1;
        $format = sprintf("%03s", abs((int)$noUrutAkhir + 1)) . '/' . $awal . '/' . $bulanRomawi[date('n')] . '/' . date('Y');

        return view ('pemesanan.pemesanan', ['barang' => $barang, 'akun' => $akun, 'supplier' => $supplier, 'temp_pemesanan' => $temp_pesan, 'format' => $format]);

    }

    public function tambahOrder()
    {
        return view('pemesanan.pemesanan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi jika barang sudah ada pada tabel temporari maka qty akan diedit

        if(Pemesanan_tem::where('kd_barang', $request->brg)->exists()){
            Alert::warning('Pesan', 'Barang sudah ada. Update QTY?');
            Pemesanaan_tem::where('kd_barang', $request->brg)->update(['qty_pesan' => $request->qty]);

            return redirect('transaksi');
        } else{
            Pemesanan_tem::create([
                'qty_pesan' => $request->qty,
                'kd_barang' => $request->brg
            ]);

            return redirect('transaksi');
        }
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
    public function destroy($kd_barang)
    {
        //
        $barang = \App\Pemesanan_tem::findOrFail($kd_barang);
        $barang->delete();

        Alert::success('Pesan', 'Data sudah dihapus');

        return redirect('transaksi');
    }
}
