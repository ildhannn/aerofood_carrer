<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Candidate extends Model
{
	protected $fillable = [
	   'user_id', 'candidate_id', 'phone', 'nationality', 'province_id', 'city_id', 'address', 'expected_salary', 'birth_date', 'fresh_graduate', 'summary', 'other_info', 'cv', 'experience', 'country', 'ktp', 'bpjs', 'npwp', 'why_hire_me', 'photo', 'sosmed'
	];

	public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function province() {
    	return $this->belongsTo('App\Models\Province', 'province_id');
    }

    public function city() {
    	return $this->belongsTo('App\Models\City', 'city_id');
    }

    public function educations() {
    	return $this->hasMany('App\Models\CandidateEducation', 'candidate_id')->orderBy('qualification', 'DESC')->orderBy('graduate_date', 'DESC');
    }

    public function experiences() {
    	return $this->hasMany('App\Models\CandidateExperience', 'candidate_id')->orderBy('end_date', 'DESC');
    }

    public function skills() {
    	return $this->belongsToMany('App\Models\Skill', 'candidate_skills');
    }

    public function sosmed() {
        return $this->hasOne(Sosmed::class);
    }

    public function savedJobs() {
    	return $this->belongsToMany('App\Models\Job', 'job_saves');
    }

    public function savedJob($job_id) {
        return $this->belongsToMany('App\Models\Job', 'job_saves')->where('job_saves.job_id', $job_id)->first();
    }

    public function jobs() {
    	return $this->belongsToMany('App\Models\Job', 'job_candidates')
    		->withPivot('progress', 'status', 'suitability', 'start_date', 'end_date')
    		->withTimestamps()
            ->orderBy('created_at', 'desc');
    }

    public function job($job_id) {
        return $this->belongsToMany('App\Models\Job', 'job_candidates')
            ->wherePivot('job_id', $job_id)
            ->withPivot('progress', 'status', 'suitability', 'start_date', 'end_date')
            ->withTimestamps();
    }

    public function isJobApplied($job_id) {
        return $this->belongsToMany('App\Models\Job', 'job_candidates')->wherePivot('job_id', $job_id)->get()->count() === 1;
    }

    public function isJobSaved($job_id) {
        return $this->belongsToMany('App\Models\Job', 'job_saves')->where('job_saves.job_id', $job_id)->count() === 1;
    }

    public function answers() {
    	return $this->belongsToMany('App\Models\QuestionChoice', 'test_answers', 'candidate_id', 'answer')
    		->withPivot('test_id', 'job_id', 'finished_time')
    		->withTimestamps();
    }

    public function mbtiAnswers($label = null){
        $answers = $this->belongsToMany('App\Models\QuestionChoice', 'test_answers', 'candidate_id', 'answer')
                    ->wherePivot('test_id', 1)
                    ->withPivot('test_id', 'job_id')
                    ->withTimestamps();

        if($label != null) {
            return $answers->where('label', $label)->get();
        } else {
            return $answers->get();
        }
    }

    public function discAnswers($label = null, $type = null){
        $answers = $this->belongsToMany('App\Models\QuestionChoice', 'test_answers', 'candidate_id', 'answer')
                    ->wherePivot('test_id', 2)
                    ->withPivot('test_id', 'job_id')
                    ->withTimestamps();

        if($label != null && $type != null) {
            if($type == 'm')
                return $answers->where('label', $label)->whereRaw('MOD(question_id, 2) = 0')->get();
            else
                return $answers->where('label', $label)->whereRaw('MOD(question_id, 2) = 1')->get();
        } else {
            return $answers->get();
        }
    }

    public function papiAnswers($label = null, $score = 0){
        $answers = $this->belongsToMany('App\Models\QuestionChoice', 'test_answers', 'candidate_id', 'answer')
                    ->wherePivot('test_id', 3)
                    ->withPivot('test_id', 'job_id')
                    ->withTimestamps();

        if($label != null) {
            return $answers->where('label', $label)->get();
        } else {
            return $answers->get();
        }
    }

    public function jobAnswers($job_id) {
        return $this->belongsToMany('App\Models\QuestionChoice', 'test_answers', 'candidate_id', 'answer')
            ->where('job_id', $job_id)
            ->withPivot('test_id', 'job_id')
            ->withTimestamps()->get();   
    }

    public function jobTestAnswers($job_id, $test_id) {
        return $this->belongsToMany('App\Models\QuestionChoice', 'test_answers', 'candidate_id', 'answer')
            ->where('job_id', $job_id)
            ->wherePivot('test_id', $test_id)
            ->withPivot('test_id', 'job_id')
            ->withTimestamps()->get();   
    }

    public function jobTestIntelAnswers($candidate_id, $job_id) {
        return DB::table('test_intel_answers')
            ->where('job_id', '=', $job_id)
            ->where('candidate_id', '=', $candidate_id)
            ->get();
    }

    public function progress() {
        if ($this->pivot->progress == 1) {
            return 'PVI';
        } elseif ($this->pivot->progress == 2) {
            return 'Tes Online';
        } elseif ($this->pivot->progress >= 3 && $this->pivot->progress <= 7) {
            return 'Interview';
        } elseif ($this->pivot->progress == 8) {
            return 'Medical Check Up';
        } elseif ($this->pivot->progress == 9) {
            return 'Offering';
        } elseif ($this->pivot->progress == 10) {
            return 'Join Date';
        } else {
            return 'Seleksi Dokumen';
        }
    }

    public function mcu($job_id) {
        return $this->hasMany('App\Models\Mcu', 'candidate_id')->where('job_id', $job_id)->first();
    }

    public function offering($job_id) {
        return $this->hasMany('App\Models\Offering', 'candidate_id')->where('job_id', $job_id)->first();
    }

    public function scopeName($query, $name) {
        return $query->join('users', 'users.id', '=' ,'candidates.user_id')
                ->select('candidates.id', 'candidates.candidate_id', 'candidates.city_id', 'candidates.province_id', 'experience', 'expected_salary', 'users.name')
                ->where('users.name', 'LIKE', '%'.$name.'%');
    }

    public function scopeProvince($query, $province_id) {
        return $province_id == 0 ? $query->where('candidates.province_id', '!=', 0) : $query->where('candidates.province_id', $province_id);
    }

    public function scopeEducation($query, $qualification) {
        return $qualification != '' 
            ? $query->join('candidate_educations', 'candidates.id', '=', 'candidate_educations.candidate_id')->where('qualification', $qualification)
            : $query->join('candidate_educations', 'candidates.id', '=', 'candidate_educations.candidate_id')->where('qualification', '!=', '99');
    }

    public function updateExperience(){
        DB::statement("update candidates set experience = (select IFNULL(sum(FLOOR(( year(end_date) - year(start_date)) + (month(end_date) - month(start_date)) / 12 + 0.5)), 0) from candidate_experiences where candidate_id = ".$this->id.") where id = ".$this->id);
    }

    public function isProfileComplete() {

        if($this->skills->count() === 0 || $this->educations->count() === 0) {
            return false;
        }
        $this->isMainProfileComplete();
        return true;
    }

    public function isMainProfileComplete() {
        $profile = [
            'phone', 'address', 'expected_salary', 'birth_date', 'summary', 'cv', 'ktp', 'bpjs', 'npwp', 'why_hire_me', 'photo'
        ];

        if ($this->nationality === 2 && $this->country === null) {
            return false;
        } else if ($this->nationality === 1 && ($this->province_id === null || $this->city_id === null)) {
            return false;
        }

        foreach ($profile as $attributes) {
            if ($this->attributes === null) {
                return false;
            }
        }

        return true;
    }

    public function match($job_id){
        $job = DB::table('jobs')
            ->where('id', '=', $job_id)
            ->get()[0];

        $my_edu = DB::table('candidate_education')
            ->where('candidate_id', '=', $this->id)
            ->orderBy('qualification', 'desc')
            ->get();

        $match = 0;

        if(count($my_edu)){
            if($my_edu[0]->qualification >= $job->min_education){
                $match += 25;
            }
            else if($my_edu[0]->qualification - $job->min_education <= 1) { 
                $match += 10;
            }
        }

        if($this->birth_date){
            $my_birthdate = (int) substr($this->birth_date, 0, 4);
        } else {
            $my_birthdate = 0;
        }    
        $my_age = date("Y") - $my_birthdate;
        $req_age_min = $job->min_age;
        $req_age_max = $job->max_age;

        if($this->birth_date){
            if($req_age_min <= $my_age AND $my_age <= $req_age_max){
                $match += 25;
            }
            else if($my_age < $req_age_min AND $req_age_min - $my_age <= 2){
                $match += 15;
            }
            else if($req_age_max < $my_age AND $my_age - $req_age_max <= 2){
                $match += 15;
            }
            else if($my_age < $req_age_min AND $req_age_min - $my_age <= 4){
                $match += 5;
            }
            else if($req_age_max < $my_age AND $my_age - $req_age_max <= 4){
                $match += 5;
            }
        }

        $my_experience = $this->experience;
        $req_experience = $job->min_experience;

        if($my_experience){
            if($my_experience >= $req_experience){
                $match += 25;
            }
            else if($req_experience - $my_experience <= 1){
                $match += 15;
            }
            else if($req_experience - $my_experience <= 2){
                $match += 10;
            }
            else if($req_experience - $my_experience <= 3){
                $match += 5;
            }
        }

        $my_salary = $this->expected_salary;
        $min_salary = $job->min_salary;
        $max_salary = $job->max_salary;

        if($my_salary){
            if($min_salary <= $my_salary AND $my_salary <= $max_salary){
                $match += 25;
            }
            else if($my_salary < $min_salary){
                $match += 20;
            }
            else if($my_salary - $max_salary <= 2000000) {
                $match += 20;
            }
            else {
                $match += 10 * $max_salary / $my_salary;
            }
        }

        return (int) $match;
    }
}
