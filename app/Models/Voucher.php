<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'vouchers';
	protected $fillable = ['name', 'stt', 'content', 'price', 'chiet_khau', 'start_date', 'end_date', 'active', 'isdelete', 'product_fk'];
	public $timestamps = false;

	public function product(){
	    return $this->belongsTo('App\Models\Product', 'product_fk');	
	}

	public function image() {
		return $this->hasOne('App\Models\Image', 'id_fk','id')->where('type','voucher');
	}
}
