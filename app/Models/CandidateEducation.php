<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateEducation extends Model
{
	const SMA_SEDERAJAT = 0;
	const D12 = 1;
	const D3 = 2;
	const DS = 3;
	const S2 = 4;

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
            return 'D1-D2';
        } elseif ($this->qualification == 2) {
            return 'D3';
        }elseif ($this->qualification == 3) {
            return 'D4-S1';
        }elseif ($this->qualification == 4) {
            return 'S2';
        }
    }
}
