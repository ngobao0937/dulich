<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    protected $table = 'extensions';
	protected $fillable = [
        'id',
        'name',
        'menu_fk',
        'isdelete',
        'active'
    ];
	public $timestamps = false;

    public function menu()
    {
        return $this->belongsTo('App\Models\Menu', 'menu_fk');
    }
}
