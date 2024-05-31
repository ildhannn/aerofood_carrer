<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldSpecialization extends Model
{
    protected $fillable = [
        'field_id', 'specialization'
    ];

    public function field() {
        return $this->belongsTo('App\Models\field', 'field_id');
    }

    public function jobs() {
    	return $this->hasMany('App\Models\Job', 'field_specialization_id');
    }
}
