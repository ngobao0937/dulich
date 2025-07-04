<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $table = 'periods';
	public $timestamps = false;
	protected $fillable = ['id', 'name', 'price', 'user_fk', 'isdelete', 'het_han_sau'];
}
