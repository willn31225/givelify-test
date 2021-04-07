<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MoodColorController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        switch ($id) {
            case 1:
                $backgroundColor = '1-color';
                $buttonColor = '#353A4B';
                break;
            case 2:
                $backgroundColor = '2-color';
                $buttonColor = '#5563AA';
                break;
            case 3:
                $backgroundColor = '3-color';
                $buttonColor = '#7184E7';
                break;
            case 4:
                $backgroundColor = '4-color';
                $buttonColor = '#C788E6';
                break;
            case 5:
                $backgroundColor = '5-color';
                $buttonColor = '#F7678A';
                break;
            default:
                $backgroundColor = 'default-color';
                $buttonColor = 'none';
                breeak;
        }

        return [
            'status' => 'success',
            'data' => ['background-color' => $backgroundColor, 'button-color' => $buttonColor]
        ];
    }
}
