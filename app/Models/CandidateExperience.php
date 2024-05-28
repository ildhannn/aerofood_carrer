<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateExperience extends Model
{
	protected $fillable = [
		'candidate_id',
	    'position',
	    'company',
	    'start_date',
	    'end_date',
		'still_work',
	    'nationality',
	    'aboard_location',
	    'province_id',
	    'city_id',
	    'field_id',
	    'salary',
	    'description'
    ];

    public function candidate() {
    	return $this->belongsTo('App\Models\Candidate', 'candidate_id');
    }

    public function province() {
    	return $this->belongsTo('App\Models\Province', 'province_id');
    }

	public function city() {
    	return $this->belongsTo('App\Models\City', 'city_id');
    }

	public function field() {
    	return $this->belongsTo('App\Models\Field', 'field_id');
    }    
}
