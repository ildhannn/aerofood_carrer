<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobInterviewResult extends Model
{

	const NOT_RECOMMENDED = 0;
	const RECOMMENDED = 1;
	const TO_BE_CONSIDERED = 2;

    protected $fillable = [
		'job_id', 'job_interview_id', 'candidate_id', 'remark', 'result'
	];

	public function jobInterview() {
		return $this->belongsTo('App\Models\JobInterview', 'job_interview_id');
	}

	public function details() {
		return $this->hasMany('App\Models\JobInterviewResultDetail', 'job_interview_result_id');
	}

	public function detail($interview_form_id){
		return $this->hasMany('App\Models\JobInterviewResultDetail', 'job_interview_result_id')
				->where('interview_form_id', $interview_form_id)
				->first();
	}
}
