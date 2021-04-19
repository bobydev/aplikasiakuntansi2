<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| this route modified by boby_11190071
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// route home
Route::get('/home', 'HomeController@index')->name('home');

// Route user
Route::resource('/user','UserController');

// route barang
Route::resource('/barang','BarangController');

Route::get('/barang/edit/{id}','BarangController@edit');

Route::get('/barang/hapus/{id}','BarangController@destroy'); 

// route supplier
Route::resource('/supplier','SupplierController');

Route::get('/supplier/edit/{id}','SupplierController@edit');

Route::get('/supplier/hapus/{id}','SupplierController@destroy'); 

// route akun
Route::resource('/akun', 'AkunController');

Route::get('/akun/edit/{id}','AkunController@edit');

Route::get('/akun/hapus/{id}','AkunController@destroy'); 

// route setting

Route::get('/setting', 'SettingController@index')->name('setting.transaksi');

Route::post('/setting/simpan', 'SettingController@simpan');

//  route pemesanan

Route::get('/transaksi', 'PemesananController@index')->name('pemesanan.transaksi'); 

Route::post('/sem/store', 'PemesananController@store'); 

Route::get('/transaksi/hapus/{kd_barang}','PemesananController@destroy'); 

// route DetailPesan 

Route::post('/detail/store', 'DetailPesanController@store'); 

Route::post('/detail/simpan', 'DetailPesanController@simpan');

// route pembelian

Route::get('/pembelian', 'PembelianController@index')->name('pembelian.transaksi'); 

Route::get('/pembelian-beli/{id}', 'PembelianController@edit'); 

Route::post('/pembelian/simpan', 'PembelianController@simpan');

// route cetak faktur

Route::get('laporan.faktur', [App\Http\Controllers\PembelianController::class, 'pdf'])->name('laporan.faktur');

// Route retur

Route::get('/retur','ReturController@index')->name('retur.transaksi'); 

Route::get('/retur-beli/{id}', 'ReturController@edit'); 

Route::post('/retur/simpan', 'ReturController@simpan');

// Route Laporan jurnal

Route::get('/laporan', 'LaporanController@index')->name('laporan.index');

// Route::resource( '/laporan' , 'LaporanController'); 

Route::resource( '/stok' , 'LapStokController'); 

Route::get('/laporan/faktur/{invoice}', 'PembelianController@pdf')->name('cetak.order_pdf'); 

//laporan cetak 

Route::get('/laporan/cetak', 'LaporanController@show');







// Route::resource('kasmasuk', 'KasMasukController');
// Route::get('kasmasuk', [App\Http\Controllers\KasMasukController::class, 'index'])->name('kasmasuk');
// Route::get('inputkm', [App\Http\Controllers\KasMasukController::class, 'create'])->name('kasmasuk.inputkm');
// Route::post('kasmasuk.store', [App\Http\Controllers\KasMasukController::class, 'store'])->name('kasmasuk.store');
// Route::get('detailkm/show/{id}', [App\Http\Controllers\KasMasukController::class, 'show'])->name('detailkm.show/{id}');
// Route::get('kasmasuk/destroy/{id}', [App\Http\Controllers\KasMasukController::class, 'destroy'])->name('kasmasuk.destroy/{id}');








// Route::resource('/barang','BarangController')->middleware('role:admin');