<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MbtiDevelopment extends Model
{
    public function mbti() {
    	return $this->belongsTo('App\Models\Mbti', 'mbti_id');
    }
}
