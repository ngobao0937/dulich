<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
	public $timestamps = false;
    protected $fillable = [
        'name'
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'permission_role', 'permission_fk', 'role_fk');
    }

}
