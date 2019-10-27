<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;

class WorkoutController extends Controller
{
    public function store(Request $request)
    {
        // die('aku cinta kamu');
        $this->validate($request, [
            'height'      => 'required',
            'weight'      => 'required',
            'workoutType' => 'required',
            'bodyFat'     => '',
        ]);

        $workout = $request->user()->workout()->create([
            'height'       => $request->json('height'),
            'weight'       => $request->json('weight'),
            'workoutType'  => $request->json('workoutType'),
            'bodyFat'      => $request->json('bodyFat')
        ]);

        return $workout;

    }
}
