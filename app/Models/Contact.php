<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

	public $timestamps = false;

	protected $fillable = ['id', 'name', 'company', 'address', 'phone', 'fax', 'email', 'title', 'content', 'active', 'isdelete'];

}
