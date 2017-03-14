<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //

    public function transaction(){
		return $this->hasMany('App\transaction','product_id');
	}
}
