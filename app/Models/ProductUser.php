<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductUser extends Model
{
    protected $table = 'product_user';
	protected $fillable = ['product_fk', 'user_fk'];

	public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_fk');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_fk');
    }
}
