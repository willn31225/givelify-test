<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mood;
use App\Http\Controllers\Controller;

class MoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($month, $year)
    {
        return [
            'status' => 'success',
            'data' => Mood::whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->get()
        ];
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $level = request()->input('level');
        $message = request()->input('message');

        // Validate

        $mood = Mood::create([
            'level' => $level,
            'message' => $message
        ]);

        if ($mood) {
            return [
                'status' => 'success',
                'data' => $mood->attributesToArray()
            ];
        }

        return [
            'status' => 'failure',
            'data' => null
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mood = Mood::findOrFail($id);

        return [
            'status' => 'success',
            'data' => $mood->attributesToArray()
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $level = $request->input('level');
        $message = $request->input('message');

        // Validate

        $mood = Mood::findOrFail($id);

        $mood->level = $level;
        $mood->message = $message;

        if ($mood->save()) {
            return [
                'status' => 'success',
                'data' => $mood->attributesToArray()
            ];
        }

        return [
            'status' => 'failure',
            'data' => null
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mood = Mood::findOrFail($id);

        if ($mood->delete()) {
            return [
                'status' => 'success',
                'data' => null
            ];
        }

        return [
            'status' => 'failure',
            'data' => null
        ];
    }
}
