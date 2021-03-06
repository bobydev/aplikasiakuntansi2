<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Setting;
use Alert;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $akun = \App\Akun::All();
        $setting = \App\Setting::All();
        return view ('admin.setting.setting', ['akun' => $akun, 'setting' => $setting]);
    }

    public function simpan (Request $request){
        $kode = $request->kode;
        $akun = $request->akun;

        foreach ($akun as $key => $no)
            {
                $input['no_akun'] = $akun[$key];
                Setting::where('id_setting', $kode[$key])->update($input);
            }
        

        Alert::warning('Pesan', 'Pengaturan akun sudah dilakukan');

        return redirect('setting');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    //     $setting = \App\Setting::All(); 
        
    //     return view('admin.setting.transaksi',['setting' => $setting]);
    // }

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
