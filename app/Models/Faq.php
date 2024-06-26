<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public $timestamps = false;

    protected $table = 'faq';

    protected $fillable = [
        'id', 'question', 'answer'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
