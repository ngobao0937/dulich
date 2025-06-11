<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';

	public $timestamps = false;

	protected $fillable = ['id', 'name', 'active', 'position', 'link', 'type', 'description', 'product_fk', 'isMobile', 'show_text'];

	public function image() {
		return $this->hasOne('App\Models\Image', 'id_fk','id')->where('type','banner');
	}
}
