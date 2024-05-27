<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

	protected $fillable = [
        'province_id', 'city'
    ];

    public function province() {
        return $this->belongsTo('App\Models\City', 'province_id');
    }

    public function jobs() {
        return $this->hasMany('App\Models\Job', 'city_id');
    }

    public function candidates() {
        return $this->hasMany('App\Models\Candidate', 'city_id');
    }

    public function candidateFilters() {
    	return $this->hasMany('App\Models\JobCandidateFilter', 'city_id');
    }
}
