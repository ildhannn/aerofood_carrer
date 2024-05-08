<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
    	'user_id', 'admin_id', 'unit_id', 'divition_id'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function unit() {
        return $this->belongsTo('App\Models\Unit', 'unit_id');
    }

    public function divition() {
        return $this->belongsTo('App\Models\Divition', 'divition_id');
    }
}
