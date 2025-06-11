<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    protected $table = 'others';

	public $timestamps = false;

	protected $fillable = ['id', 'name', 'link', 'description', 'type'];

	public function image() {
		return $this->hasOne('App\Models\Image', 'id_fk','id')->where('type','other');
	}
}
