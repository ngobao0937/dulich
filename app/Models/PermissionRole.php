<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $table = 'permission_role';
	public $timestamps = false;
    protected $fillable = [
        'permission_fk',
        'role_fk'
    ];
    
}
