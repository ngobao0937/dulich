<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
	protected $fillable = [
		'name',
		'model',
		'short_description',
		'long_description',
		'menu_fk',
		'slug',
		'isdelete',
		'active',
		'meta_keywords',
		'meta_description'
    ];
	public $timestamps = false;
	public function user() {
		return $this->belongsTo('App\Models\User', 'user_id');
	}
	// accesstor
	public function getUserNameAttribute() {
		if (!empty($this->user)) return $this->user->user_name;
		return 'empty';
	}
	public function menu() {
		return $this->belongsTo('App\Models\Menu', 'menu_fk');
	}
	public function image() {
		return $this->hasOne('App\Models\Image', 'id_fk','id')->where('type','product_hinh_dai_dien');
	}
	public function documents() {
		return $this->hasMany('App\Models\Document', 'product_fk','id')->where('isdelete', 0);
	}
}
