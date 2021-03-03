<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    // jika tidak didefinisikan, maka Primary Key akan terdetek id

    protected $primaryKey = 'kd_barang'; 
    public $incrementing = false; 
    
    protected $keyType = 'string';
    public $timestamps = false; 
    
    protected $table = "barang"; 
    protected $fillable=['kd_barang','nm_barang','harga','stok'];

}
