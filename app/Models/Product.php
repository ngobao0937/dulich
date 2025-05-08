<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
	protected $fillable = [
		'name',
		'address',
		'phone',
		'email',
		'link',
		'content',
		'extension_fk',
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
	public function getUserNameAttribute() {
		if (!empty($this->user)) return $this->user->user_name;
		return 'empty';
	}
	public function menus() {
		return $this->belongsToMany('App\Models\Menu', 'product_menu', 'product_fk', 'menu_fk');
	}
	public function extension() {
		return $this->hasMany('App\Models\Extension', 'extension_fk');
	}
	public function image() {
		return $this->hasOne('App\Models\Image', 'id_fk','id')->where('type','product_hinh_dai_dien');
	}
	public function video() {
		return $this->hasOne('App\Models\Image', 'id_fk','id')->where('type','product_video');
	}
	public function vr360() {
		return $this->hasOne('App\Models\Image', 'id_fk','id')->where('type','product_vr360');
	}
	public function images() {
		return $this->hasMany('App\Models\Image', 'id_fk','id')->where('type','product_hinh_khac')->where('isdelete',0)->orderby('position', 'asc');
	}
	public function vouchers() {
		return $this->hasMany('App\Models\Voucher', 'product_fk','id')->where('isdelete',0)->orderby('stt', 'asc');
	}
}
