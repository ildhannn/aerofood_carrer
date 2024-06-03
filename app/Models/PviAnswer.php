<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PviAnswer extends Model
{
	protected $fillable = ['pvi_id', 'candidate_id', 'answer'];
    
    public function pvi() {
    	return $this->belongsTo('App\Models\Pvi', 'pvi_id');
    }
    
    public function answer() {
        return $this->belongsTo('App\Models\Pvi', 'candidate_id');
    }
    
}
