<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'program', 'set', 'repetition'
    ];

    protected $casts = [
        'program' => 'int'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
