<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
    	'test_id', 'question', 'type'
    ];

    public function test() {
    	return $this->belongsTo('App\Models\Test', 'test_id');
    }

    public function choices() {
    	return $this->hasMany('App\Models\QuestionChoice', 'question_id');
    }
}
