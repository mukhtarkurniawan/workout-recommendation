<?php

namespace App\Http\Controllers;
use App\Models\Workout;
use App\Models\Chest;
use App\Models\Schedule;
use App\Models\Result;

use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function store(Request $request)
    {
        $workout = json_decode(Workout::get('workoutType'), true);

        // die($workout[0]["workoutType"]);

        if($workout[0]["workoutType"]=="dada"){
            $weight = json_decode(Workout::get('weight'), true);

            // echo $weight[0]["weight"]; 
            // die($weight[0]["weight"]);

            $berat = $weight[0]["weight"];

            if($berat <= 60){
                // die('hard');
                $exercise       = json_decode(Workout::get('exerciseType'), true);

                if($exercise[0]["exerciseType"]=="bulking"){
                    // die('bulking');
                    $exercise = $request->user()->result()->create([
                        'program'   => '8',
                        'set'       => '4',
                        'repetition'=> '5',
                    ]);

                    return $exercise;

                } else if ($exercise[0]["exerciseType"]=="hypermetropi"){
                    // die('hypermetropi');
                    $exercise = $request->user()->result()->create([
                        'program'   => '6',
                        'set'       => '4',
                        'repetition'=> '10',
                    ]);

                    return $exercise;

                } else if ($exercise[0]["exerciseType"]=="cutting"){
                    // die('cutting');
                    $exercise = $request->user()->result()->create([
                        'program'   => '4',
                        'set'       => '6',
                        'repetition'=> '15',
                    ]);

                    return $exercise;

                } else {
                    return response()->json(['error' => 'data tidak dapat dimasukkan'], 203);
                }

            } else {
                die('soft');
                $bulking       = $workouts->intersect(Workout::whereIn('exerciseType', ['bulking'])
                                ->get());
                $hypermetrophi = $workouts->intersect(Workout::whereIn('exerciseType', ['hypermetrophi'])
                                ->get());
                $cutting       = $workouts->intersect(Workout::whereIn('exerciseType', ['cutting'])
                                ->get());


                if($bulking){
                    // die('soft');
                    $exercise = $request->user()->result()->create([
                        'program'   => '8',
                        'set'       => '4',
                        'repetition'=> '5',
                    ]);

                    return $exercise;

                } else if ($hypermetrophi){
                    $exercise = $request->user()->result()->create([
                        'program'   => '6',
                        'set'       => '4',
                        'repetition'=> '10',
                    ]);

                    return $exercise;

                } else if ($cutting){
                    $exercise = $request->user()->result()->create([
                        'program'   => '4',
                        'set'       => '6',
                        'repetition'=> '15',
                    ]);

                    return $exercise;

                } else {
                    return response()->json(['error' => 'data tidak dapat dimasukkan'], 203);
                }

            }

        } else {
            return response()->json(['error' => 'Not Found'], 404);
        }
    }



    public function show(Request $request){

        $program = json_decode(Result::get('program'), true);

        // $program = Result::get('program');
        $count = $program[0]["program"];

        // echo $count;
        // die($program);

        for($i=1; $i<=$count; $i++){
            echo Chest::where('id',$i)->get();
        };

        // die(Chest::get()->where('id',1));
        return view('result', compact('array'));
    }
}
