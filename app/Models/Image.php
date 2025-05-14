<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
	protected $fillable = [
        'id',
        'ten',
        'id_fk',
        'type',
        'isdelete',
        'position',
        'tile'
    ];
	public $timestamps = false;
}
