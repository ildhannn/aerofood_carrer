<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{   
    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_CLOSED = 2;
    const STATUS_DELETED = 99;
    const CANDIDATE_PASS = 1;
    const CANDIDATE_FAIL = 33;
    const CANDIDATE_MATCHED = 1;
    const CANDIDATE_SHORTLISTED = 2;
    const CANDIDATE_NOT_SUITABLE = 44;
    const CANDIDATE_NOT_PVI = 55;

	protected $fillable = [
		'preq', 'job_id', 'title', 'description', 'min_education', 'min_age', 'max_age',
		'min_experience', 'min_salary', 'max_salary', 'start_date', 'end_date', 'status', 'province_id', 'city_id', 'field_id', 'field_specialization_id', 'created_by', 'preq_file', 'need', 'has_intelligence_test'
	];

    // public function min_education() {
    //     if ($this->min_education == 0) 
    //         return 'SMA/Sederajat';
    //     else if ($this->min_education == 1) 
    //         return 'D1';
    //     else if ($this->min_education == 2) 
    //         return 'D2';
    //     else if ($this->min_education == 3) 
    //         return 'D3';
    //     else if ($this->min_education == 4) 
    //         return 'D4';
    //     else if ($this->min_education == 5) 
    //         return 'S1';
    //     else if ($this->min_education == 6) 
    //         return 'S2';
    //     else if ($this->min_education == 7) 
    //         return 'S3';
    // }
    public function min_education() {
        if ($this->min_education == 0) 
            return 'SMA / Sederajat';
        else if ($this->min_education == 1) 
            return 'D1-D4';
        else if ($this->min_education == 2) 
            return 'S1-S3';
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'admin_id');
    }

    public function createdBy() {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function province() {
    	return $this->belongsTo('App\Models\Province', 'province_id');
    }

    public function city() {
    	return $this->belongsTo('App\Models\City', 'city_id');
    }

    public function location() {
    	return $this->city().', '.$this->province();
    }

    public function field() {
    	return $this->belongsTo('App\Models\Field', 'field_id');
    }

    public function fieldSpecialization() {
    	return $this->belongsTo('App\Models\FieldSpecialization', 'field_specialization_id');
    }

    public function scopeField($query, $field_id) {
        if(Auth::user() == null || Auth::user()->candidate) {
            return $field_id == 0 ? $query->where('field_id', '!=', 0) : $query->where('field_id', $field_id)->where('status', 1);
        }
        if(Auth::user()->admin) { 
            return $field_id == 0 ? $query->where('field_id', '!=', 0) : $query->where('field_id', $field_id);
        }
    }

    public function scopeProvince($query, $province_id) {
        if(Auth::user() == null || Auth::user()->candidate) {
            return $province_id == 0 ? $query->where('province_id', '!=', 0) : $query->where('province_id', $province_id)->where('status', 1);
        }
        if(Auth::user()->admin) { 
            return $province_id == 0 ? $query->where('province_id', '!=', 0) : $query->where('province_id', $province_id);
        }
    }

    public function scopeTitle($query, $title) {
        if(Auth::user() == null || Auth::user()->candidate) {
            return $query->where('title', 'like', '%'.$title.'%')->where('status', 1);
        }
        if(Auth::user()->admin) { 
            return $query->where('title', 'like', '%'.$title.'%');
        }
    }

    public function benefits() {
    	return $this->belongsToMany('App\Models\Benefit', 'job_benefits')->withTimestamps();
    }

    public function employmentTypes() {
    	return $this->belongsToMany('App\Models\EmploymentType', 'job_employment_types')->withTimestamps();
    }

    public function steps() {
        return $this->belongsToMany('App\Models\Step', 'job_steps')
            ->withPivot('due_date')
            ->withTimestamps();
    }

    public function jobStep($step_id) {
        return $this->belongsToMany('App\Models\Step', 'job_steps')
            ->where('step_id', $step_id)
            ->withPivot('due_date')
            ->withTimestamps()->first();
    }

    public function candidateFilters() {
    	return $this->hasMany('App\Models\JobCandidateFilter', 'job_id');
    }

    public function interviews() {
    	return $this->hasMany('App\Models\JobInterview', 'job_id');
    }

    public function interviewer($step_id) {
        return $this->hasMany('App\Models\JobInterview', 'job_id')->where('step_id', $step_id)->first();
    }

    public function interviewResults($job_interview_id, $job_id, $candidate_id){
        return $this->hasManyThrough('App\Models\JobInterviewResult', 'App\Models\JobInterview')
            ->where('job_interview_results.job_interview_id', $job_interview_id)
            ->where('job_interview_results.job_id', $job_id)
            ->where('job_interview_results.candidate_id', $candidate_id)->first();
    }

    public function interviewResultDetail($job_interview_id, $job_id, $candidate_id, $form_id){
        return $this->hasManyThrough('App\Models\JobInterviewResult', 'App\Models\JobInterview')
            ->where('job_interview_results.job_interview_id', $job_interview_id)
            ->where('job_interview_results.job_id', $job_id)
            ->where('job_interview_results.candidate_id', $candidate_id)
            ->join('job_interview_result_details', 'job_interview_results.id', '=', 'job_interview_result_id')
            ->where('interview_form_id', $form_id)
            ->select('job_interview_result_details.*')->first();
    }

    public function savedBy(){
        return $this->belongsToMany('App\Models\Candidate', 'job_saves');
    }

    public function isSaved($candidate_id){
        return $this->belongsToMany('App\Models\Candidate', 'job_saves')
            ->where('job_saves.candidate_id', $candidate_id);
    }    

    public function candidates() {
        return $this->belongsToMany('App\Models\Candidate', 'job_candidates')
            ->withPivot('progress', 'status', 'suitability', 'start_date', 'end_date')
            ->withTimestamps();
    }

    public function isApplied($candidate_id) {
        return $this->belongsToMany('App\Models\Candidate', 'job_candidates')
            ->where('job_candidates.candidate_id', $candidate_id)
            ->withPivot('progress', 'status', 'suitability', 'start_date', 'end_date')
            ->withTimestamps();
    }

    public function candidateMatches() {
        return $this->belongsToMany('App\Models\Candidate', 'job_candidates')
            ->withPivot('progress', 'status', 'suitability', 'start_date', 'end_date')
            ->withTimestamps();
    }

    public function candidateProgress($condition, $step_id) {
        return $this->belongsToMany('App\Models\Candidate', 'job_candidates')
            ->withPivot('progress', 'status')
            ->where('progress', $condition, $step_id)->get();
    }

    public function candidateProgressStatus($condition, $step_id, $status) {
        return $this->belongsToMany('App\Models\Candidate', 'job_candidates')
            ->withPivot('progress', 'status', 'suitability', 'start_date', 'end_date')
            ->where('progress', $condition, $step_id)
            ->where('status', $status)->get();
    }

    public function jobCandidate($candidate_id) {
        return $this->belongsToMany('App\Models\Candidate', 'job_candidates')
            ->withPivot('progress', 'status', 'suitability', 'start_date', 'end_date')
            ->withTimestamps()
            ->where('candidates.candidate_id', $candidate_id)->first();
    }

    public function pviCandidateAnswers($candidate_id) {
        return $this->hasManyThrough('App\Models\PviAnswer', 'App\Models\Pvi')
            ->where('candidate_id', $candidate_id)->get();
    }

    public function pvis() {
        return $this->hasMany('App\Models\Pvi', 'job_id');
    }

    public function mcu($candidate_id) {
        return $this->hasMany('App\Models\Mcu', 'job_id')->where('candidate_id', $candidate_id)->first();
    }

}
