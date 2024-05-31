<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name', 'skill_lainnya'];

    public function candidates(){
    	return $this->belongsToMany('App\Models\Candidate', 'candidate_skills');
    }
    
}
