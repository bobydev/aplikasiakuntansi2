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
|
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








// Route::resource('/barang','BarangController')->middleware('role:admin');