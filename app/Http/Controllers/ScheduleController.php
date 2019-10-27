<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function store(Request $request)
    {
        // die('aku cinta kamu');
        $this->validate($request, [
            'sunday'    => '',
            'monday'    => '',
            'tuesday'   => '',
            'wednesday' => '',
            'thursday'  => '',
            'friday'    => '',
            'saturday'  => ''
        ]);

        $schedule = $request->user()->schedule()->create([
            'sunday'    => $request->json('sunday'),
            'monday'    => $request->json('monday'),
            'tuesday'   => $request->json('tuesday'),
            'wednesday' => $request->json('wednesday'),
            'thursday'  => $request->json('thursday'),
            'friday'    => $request->json('friday'),
            'saturday'  => $request->json('saturday'),
        ]);

        return $schedule;

    }
}
