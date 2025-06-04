<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
	public $timestamps = false;
    protected $fillable = [
        'name',
        'isdelete'
    ];

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'permission_role', 'role_fk', 'permission_fk');
    }

}
