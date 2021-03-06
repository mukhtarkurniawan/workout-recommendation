<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $fillable = [
        'height', 'weight', 'workoutType', 'exerciseType'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
