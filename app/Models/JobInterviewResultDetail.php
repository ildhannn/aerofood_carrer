<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobInterviewResultDetail extends Model
{	
	protected $fillable = [
		'job_interview_result_id', 'interview_form_id', 'rating', 'description'
	];

    public function result() {
    	return $this->belongsTo('App\Models\JobInterviewResult', 'job_interview_result_id');
    }
}
