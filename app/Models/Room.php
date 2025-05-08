<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
	protected $fillable = [
		'name',
		'content',
        'price',
		'product_fk',
		'slug',
		'isdelete',
		'active',
		'meta_keywords',
		'meta_description'
    ];
	public $timestamps = false;

	public function extensions() {
		return $this->belongsToMany('App\Models\Extension', 'room_extension', 'room_fk', 'extension_fk');
	}

    public function product(){
	    return $this->belongsTo('App\Models\Product', 'product_fk');	
	}
	public function image() {
		return $this->hasOne('App\Models\Image', 'id_fk','id')->where('type','room_hinh_dai_dien');
	}
	public function vr360() {
		return $this->hasOne('App\Models\Image', 'id_fk','id')->where('type','room_vr360');
	}
	public function images() {
		return $this->hasMany('App\Models\Image', 'id_fk','id')->where('type','room_hinh_khac')->where('isdelete',0)->orderby('position', 'asc');
	}
}
