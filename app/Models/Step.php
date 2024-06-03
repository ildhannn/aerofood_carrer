<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    public function jobs() {
        return $this->belongsToMany('App\Models\Job', 'job_steps')
            ->withPivot('due_date')
            ->withTimestamps();
    }
}
