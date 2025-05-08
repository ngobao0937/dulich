<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMenu extends Model
{
    protected $table = 'product_menu';
	protected $fillable = ['product_fk', 'menu_fk'];
	public $timestamps = false;
}
