<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

	public $timestamps = false;

	protected $fillable = ['id', 'name', 'description', 'content', 'date_start', 'date_end', 'time_start', 'time_end', 'address', 'slug', 'active', 'isdelete'];

	public function image() {
		return $this->hasOne('App\Models\Image', 'id_fk','id')->where('type','event_hinh_dai_dien');
	}
	public function images() {
		return $this->hasMany('App\Models\Image', 'id_fk','id')->where('type','event_hinh_khac')->where('isdelete',0)->orderby('position', 'asc');
	}
}
