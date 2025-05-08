<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomExtension extends Model
{
    protected $table = 'room_extension';
	protected $fillable = ['room_fk', 'extension_fk'];
	public $timestamps = false;
}
