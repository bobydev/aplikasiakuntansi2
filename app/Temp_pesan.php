<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temp_pesan extends Model
{
    //jika tidak di definisikan maka primary key akan terdetek id

    protected $primaryKey = 'kd_barang'; 
    public $incrementing = false; 
    
    protected $keyType = 'string';
    public $timestamps = false; 
    
    protected $table = "view_temp_pesan"; 
    protected $fillable = ['kd_barang','nm_barang','harga', 'stok'];
}
