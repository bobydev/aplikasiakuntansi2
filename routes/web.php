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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/user','UserController');

Route::resource('/barang','BarangController');

Route::get('/barang/edit/{id}','BarangController@edit');

Route::get('/barang/hapus/{id}','BarangController@destroy'); 

Route::resource('/supplier','SupplierController');

Route::get('/supplier/edit/{id}','SupplierController@edit');

Route::get('/supplier/hapus/{id}','SupplierController@destroy'); 





// Route::resource('/barang','BarangController')->middleware('role:admin');