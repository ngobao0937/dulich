<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLog extends Model
{
    protected $table = 'product_logs';

	public $timestamps = false;

	protected $fillable = ['id', 'product_fk', 'user_fk', 'old_start_date', 'new_start_date', 'old_end_date', 'new_end_date'];
}
