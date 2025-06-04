<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'birthday',
        'sex',
        'user_name',
        'phone',
        'super_user',
        'role_fk'
    ];

    public function isSuperUser()
    {
        return $this->super_user == 1;
    }

    public function image() {
		return $this->hasOne('App\Models\Image', 'id_fk','id')->where('type','user_hinh_dai_dien');
	}

    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_fk');
    }

    public function hasPermission($permissionId)
    {
        return $this->role && $this->role->permissions->contains('id', $permissionId);
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'product_user', 'user_fk', 'product_fk');
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
