<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiptLog extends Model
{
    protected $table = 'receipt_logs';

	public $timestamps = false;

	protected $fillable = ['id', 'receipt_fk', 'user_fk', 'hanh_dong'];
}
