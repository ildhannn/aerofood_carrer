<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobCandidateFilter extends Model
{
    protected $fillable = [
        'job_id', 'province_id', 'city_id', 'min_salary', 'min_education', 'min_experience', 'min_age', 'nationality'
    ];

    public function job() {
    	return $this->belongsTo('App\Models\Job', 'job_id');
    }

    public function province() {
    	return $this->belongsTo('App\Models\Province', 'province_id');
    }

	public function city() {
    	return $this->belongsTo('App\Models\City', 'city_id');
    }
}
