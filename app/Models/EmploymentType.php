<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmploymentType extends Model
{
    protected $fillable = [
    	'type'
    ];

    public function jobs() {
    	return $this->belongsToMany('App\Models\Job', 'job_employment_types')->withTimestamps();
    }
}
