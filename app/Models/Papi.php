<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Papi extends Model
{
    protected $fillable = ['type', 'max_score', 'norm', 'role'];
}
