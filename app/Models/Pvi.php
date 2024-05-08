<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pvi extends Model
{

	protected $fillable = ['job_id', 'question'];

    public function job() {
    	return $this->belongsTo('App\Models\Job', 'job_id');
    }

    public function answers() {
    	return $this->hasMany('App\Models\PviAnswer', 'pvi_id');
    }

    public function candidateAnswer($candidate_id) {
    	return $this->hasMany('App\Models\PviAnswer', 'pvi_id')
    		->where('candidate_id', $candidate_id)->first();
    }
    
}
