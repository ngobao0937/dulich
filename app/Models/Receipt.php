<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Receipt extends Model
{
    protected $table = 'receipts';
	public $timestamps = false;
	protected $fillable = ['id', 'product_fk', 'user_fk', 'ngay_thu', 'het_han_sau', 'ngay_het_han', 'so_tien', 'ghi_chu', 'isdelete', 'name_period', 'period_fk'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_fk');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_fk');
    }
}
