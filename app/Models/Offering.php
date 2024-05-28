<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offering extends Model
{
    protected $fillable = [
		'candidate_id', 'job_id', 'offering'
	];
    public function candidate() {
    	return $this->belongsTo('App\Models\Candidate', 'candidate_id');
    }
    public function job() {
    	return $this->belongsTo('App\Models\Job', 'job_id');
    }
}
