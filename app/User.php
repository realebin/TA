<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use \Conner\Tagging\Taggable;

class User extends Authenticatable
{
    use Taggable;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',   'role_id','telepon_user','alamat_user','username'
    ];

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

    public function role()
    {
        // return $this->belongsTo('App\Topik','id_topik');
        return $this->belongsTo('App\Role', 'role_id');
        // dd($this->belongsTo('App\Topik'));
        // return $this->hasMany('App\Topik','id_topik');
    }
    public function su()
    {
        return $this->hasMany('App\SeminarUser');
    }
}
