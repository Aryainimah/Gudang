<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    //

    protected $fillable = ['nama_barang', 'merk','jumlah','harga','kuantitas','total_harga'];
    protected $visible = ['nama_barang', 'merk','jumlah','harga','kuantitas','total_harga'];
    public $timestamps = true;
    
    public function history () 
    {  
     	return $this->hasMany('App\History');
    }

}
