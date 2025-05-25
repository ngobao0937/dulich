<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromotionPublic extends Model
{
    protected $table = 'promotion_public';

    protected $fillable = [
        'promotion_fk', 'menu_fk', 'position'
    ];
    public $timestamps = false;

    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promotion_fk');
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_fk');
    }
}
