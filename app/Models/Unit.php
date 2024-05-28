<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'divition_id', 'unit'
    ];

    public function divition() {
        return $this->belongsTo('App\Models\Divition', 'divition_id');
    }

    public function admins() {
        return $this->hasMany('App\Models\Admin', 'unit_id');
    }
}
