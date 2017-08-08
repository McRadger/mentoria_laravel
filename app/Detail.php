<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = ['product_id','quantity','price','created_at','updated_at'];

    public function product()
    {
    	return $this->belongsTo('App\Product','product_id');
    }

}
