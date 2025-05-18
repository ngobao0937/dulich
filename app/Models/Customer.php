<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

	public $timestamps = false;

	protected $fillable = ['id', 'name', 'email', 'phone', 'content', 'promotion_fk'];
}
