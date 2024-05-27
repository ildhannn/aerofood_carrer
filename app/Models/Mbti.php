<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mbti extends Model
{
    public function explanations() {
    	return $this->hasMany('App\Models\MbtiExplanation', 'mbti_id');
    }

    public function developments() {
    	return $this->hasMany('App\Models\MbtiDevelopment', 'mbti_id');
    }
}
