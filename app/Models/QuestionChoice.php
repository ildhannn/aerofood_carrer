<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionChoice extends Model
{
    protected $fillable = [
    	'question_id', 'choice'
    ];

    public function question() {
    	return $this->belongsTo('App\Models\Question', 'question_id');
    }

    public function tests() {
    	return $this->belongsToMany('App\Models\Candidate', 'test_answers', 'answer', 'candidate_id')
            ->withPivot('test_id', 'job_id', 'finished_time')
    		->withTimestamps();
    }
}
