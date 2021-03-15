<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LapStok extends Model
{
    //
    protected $table = "lap_stok"; 
    protected $fillable = ['kd_barang','nm_barang','harga','stok','beli','retur'];
}
