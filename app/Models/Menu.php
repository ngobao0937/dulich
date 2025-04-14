<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;

class Menu extends Model
{
    protected $table = 'menus';
	public $timestamps = false;
	protected $fillable = ['id', 'name', 'menu_fk', 'slug', 'active', 'public'];

	public function products() {
		return $this->hasmany('App\Models\Product', 'menu_fk');
	}

	public function image() {
		return $this->hasOne('App\Models\Image', 'id_fk','id')->where('type','menu');
	}
}
