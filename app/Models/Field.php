<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
	protected $fillable = [
        'field'
    ];
    
    public function specializations() {
        return $this->hasMany('App\Models\FieldSpecialization', 'field_id');
    }

    public function jobs() {
    	return $this->hasMany('App\Models\Job', 'field_id')->whereStatus(1);
    }
}
