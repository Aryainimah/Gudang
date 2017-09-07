<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //

    protected $fillable = ['id_barang'];
    protected $visible = ['id_barang'];
    public $timestamps = true;
    
    public function gudangs() 
    {
    	return $this->belongsTo('App\Gudang', 'id_barang');
    }
}
