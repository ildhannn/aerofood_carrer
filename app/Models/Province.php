<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{	

    protected $fillable = [
        'province'
    ];
    
    public function cities() {
        return $this->hasMany('App\Models\City', 'province_id');
    }

    public function candidates() {
        return $this->hasMany('App\Models\Candidate', 'province_id');
    }

    public function jobs() {
        return $this->hasMany('App\Models\Job', 'province_id')->whereStatus(1);
    }

    public function candidateFilters() {
    	return $this->hasMany('App\Models\JobCandidateFilter', 'province_id');
    }
}
