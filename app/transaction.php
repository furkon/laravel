<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    //
     protected $table = 'transactions';

     public function product(){
		return $this->belongsTo('App\Product','product_id');
	}
}
