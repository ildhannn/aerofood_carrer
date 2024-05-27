<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sosmed extends Model
{
    protected $fillable = ['instagram', 'x', 'linkedin', 'tiktok', 'candidate_id', 'field_id'];

    public function candidates(){
        return $this->belongsTo(Candidate::class);
    }

    public function field() {
    	return $this->belongsTo('App\Models\Field', 'field_id');
    }
}
