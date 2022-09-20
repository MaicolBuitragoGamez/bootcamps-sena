<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable=[ 'title', 
    'description', 
    'weeks',
    'average_cost',
    'minimum_skill'
    ];
}
