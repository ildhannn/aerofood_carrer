<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateSkill extends Model
{
    protected $fillable = ['candidate_id', 'field_id', 'skill'];

    public function candidate() {
    	return $this->belongsTo('App\Models\Candidate', 'candidate_id');
    }

    public function field() {
    	return $this->belongsTo('App\Models\Field', 'field_id');
    }
}
