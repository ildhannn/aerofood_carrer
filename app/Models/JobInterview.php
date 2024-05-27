<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobInterview extends Model
{

	protected $fillable = [
		'job_id', 'interviewer', 'step_id'
	];

    public function job() {
    	return $this->belongsTo('App\Models\Job', 'job_id');
    }

    public function step() {
    	return $this->belongsTo('App\Models\Step', 'step_id');
    }

    public function results() {
    	return $this->hasMany('App\Models\JobInterviewResult', 'job_interview_id');
    }
}
