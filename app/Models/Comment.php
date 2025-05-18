<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

	public $timestamps = false;

	protected $fillable = ['id', 'content', 'name', 'product_fk','rating', 'active'];

    public function product() {
		return $this->belongsTo('App\Models\Product', 'product_fk');
	}

}
