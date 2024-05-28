<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function candidate() {
        return $this->hasOne('App\Models\Candidate', 'user_id');
    }

    public function admin() {
        return $this->hasOne('App\Models\Admin', 'user_id');
    }

    public function jobs() {
        return $this->hasMany('App\Models\Job', 'created_by');
    }
}
