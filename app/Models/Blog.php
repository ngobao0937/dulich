<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

	protected $table = 'blogs';

	public $timestamps = false;

	protected $fillable = ['id', 'name', 'description', 'content', 'active', 'public', 'slug', 'position', 'view'];


	public function image() {
		return $this->hasOne('App\Models\Image', 'id_fk','id')->where('type','blog_hinh_dai_dien');
	}
}