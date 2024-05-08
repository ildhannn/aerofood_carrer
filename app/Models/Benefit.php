<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    protected $fillable = [
    	'benefit'
    ];

    public function jobs() {
    	return $this->belongsToMany('App\Models\Job', 'job_benefits')->withTimestamps();
    }
}
