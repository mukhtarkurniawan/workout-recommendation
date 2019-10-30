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
            'exerciseType'=> 'required',
            'workoutType' => 'required',
        ]);

        $workout = $request->user()->workout()->create([
            'height'       => $request->json('height'),
            'weight'       => $request->json('weight'),
            'exerciseType' => $request->json('exerciseType'),
            'workoutType'  => $request->json('workoutType')
        ]);

        return $workout;

    }
}
