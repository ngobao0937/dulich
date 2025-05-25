<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $table = 'sponsors';

	public $timestamps = false;

	protected $fillable = ['id', 'name', 'active', 'position', 'link'];

	public function image() {
		return $this->hasOne('App\Models\Image', 'id_fk','id')->where('type','sponsor');
	}
}
