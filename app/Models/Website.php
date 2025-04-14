<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $table = 'website';

	public $timestamps = false;

	protected $fillable = ['id', 'name', 'active', 'link'];

}
