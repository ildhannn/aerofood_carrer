<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divition extends Model
{
    protected $fillable = [
        'divition'
    ];

    public function units() {
        return $this->hasMany('App\Models\Unit', 'divition_id');
    }

    public function admins() {
        return $this->hasMany('App\Models\Admin', 'divition_id');
    }
}
