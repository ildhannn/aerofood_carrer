<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillLainnya extends Model
{
    protected $fillable = ['name'];

    public function candidates(){
    	return $this->belongsToMany('App\Models\Candidate', 'candidate_skills_lainnya');
    }
}
