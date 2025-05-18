<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table = 'products';
	protected $fillable = [
		'name',
		'address',
		'location',
		'hotline',
		'phone',
		'email',
		'website',
		'facebook',
		'instagram',
		'twitter',
		'youtube',
		'tiktok',
		'link360',
		'content',
		'map',
		'chatbot',
		'extension_fk',
		'menu_fk',
		'active',
		'isdelete',
		'slug',
		'meta_keywords',
		'meta_description',
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
	// public function images() {
	// 	return $this->hasMany('App\Models\Image', 'id_fk','id')->where('type','product_hinh_khac')->where('isdelete',0)->orderby('position', 'asc');
	// }
	// public function banners() {
	// 	return $this->hasMany('App\Models\Image', 'id_fk','id')->where('type','product_banner')->where('isdelete',0)->orderby('position', 'asc');
	// }
	public function banners() {
		return $this->hasMany('App\Models\Banner', 'product_fk')->where('type', 'product')->orderby('position', 'asc');
	}
	public function images() {
		return $this->hasMany('App\Models\Banner', 'product_fk')->where('type', 'product_images')->orderby('position', 'asc');
	}
	public function vouchers() {
		return $this->hasMany('App\Models\Voucher', 'product_fk','id')->where('isdelete',0)->orderby('stt', 'asc');
	}

	public function promotionsThuong() {
		return $this->hasMany('App\Models\Promotion', 'product_fk')->where('type', 1)->where('isdelete',0)->orderby('position', 'asc');
	}
	public function promotionsPhong() {
		return $this->hasMany('App\Models\Promotion', 'product_fk')->where('type', 2)->where('isdelete',0)->orderby('position', 'asc');
	}

	public function promotionThuongMain()
	{
		return $this->hasOne('App\Models\Promotion', 'product_fk')
			->where('type', 1)
			->where('isdelete', 0)
			->where('position', 1);
	}

	public function promotionPhongMain()
	{
		return $this->hasOne('App\Models\Promotion', 'product_fk')
			->where('type', 2)
			->where('isdelete', 0)
			->where('position', 1);
	}

	public function approvedComments()
	{
		return $this->hasMany('App\Models\Comment', 'product_fk')
					->where('active', 1);
	}

	public function getAverageRatingAttribute()
	{
		$average = $this->approvedComments()->avg('rating');
		return $average ? round($average) : 0;
	}

	public function approvedCommentsCount()
	{
		return $this->approvedComments()->count();
	}

}
