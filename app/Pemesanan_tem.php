<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan_tem extends Model
{
    //jika tidak di definisikan maka primary key akan terdetek id

    protected $primaryKey = 'kd_barang'; 
    public $incrementing = false; 
    
    protected $keyType = 'string';
    public $timestamps = false; 
    
    protected $table = "temp_pemesanan"; 
    protected $fillable = ['kd_barang','qty_pesan'];
}
