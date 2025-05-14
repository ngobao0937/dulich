<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';

	public $timestamps = false;

	protected $fillable = ['id', 'name', 'active', 'position', 'link', 'type', 'isdelete', 'description', 'start_date', 'end_in', 'product_fk', 'email', 'tagline', 'issave', 'price', 'link360'];

	public function image() {
		return $this->hasOne('App\Models\Image', 'id_fk','id')->where('type','promotion');
	}

	public function product() {
		return $this->belongsTo('App\Models\Product', 'product_fk');
	}
}
