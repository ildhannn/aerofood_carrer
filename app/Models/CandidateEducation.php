<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateEducation extends Model
{
	const SMA_SEDERAJAT = 0;
	const D = 1;
	const S = 2;

    protected $fillable = [ 
    	'candidate_id', 'institute', 'graduate_date', 'qualification', 'field_id', 'major', 'GPA', 'info'
    ];

    public function candidate() {
    	return $this->belongsTo('App\Models\Candidate', 'candidate_id');
    }

    public function field() {
    	return $this->belongsTo('App\Models\Field', 'field_id');
    }

    public function qualification() {
        if ($this->qualification == 0) {
            return 'SMA / Sederajat';
        } elseif ($this->qualification == 1) {
            return 'D1-D4';
        } elseif ($this->qualification == 2) {
            return 'S1-S3';
        }
    }
}
