<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function show(Request $request)
    {
        if (empty($request->all()))
        {
            //initial request
            return view('trip.index');
        }
        else
        {
            $this->validate($request, [
                'numberOfMiles' => 'required|integer|Min:1'
            ]);
            
            $numberOfMiles = $request->input('numberOfMiles', null);
            $estimatedSpeed = $request->input('estimatedSpeed', '60');      //if a speed isn't supplied, start with an initial value of 60
            $roundOff = ($request->has('roundOff')) ? true : false;
            
            $errorMessage = '';
            if (!empty($errors)) {
                $validationPassed = false;
            }
            else
            {
                $validationPassed = true;
            }
            
            if($validationPassed)
            {
                //We have a valid request, calculate the results.
                $totalHours = 0;
                $totalMinutes = 0;
                $totalHours = intdiv($numberOfMiles, $estimatedSpeed);
                $totalMinutes = (($numberOfMiles / $estimatedSpeed) - $totalHours) * 60;        //(decimal result - totalHours) * 60 converts to minutes
                
                if ($roundOff)
                {
                    //We want to round off to the nearest 15 minutes
                    if ($totalMinutes>45)
                    {
                        //Round up to the next hour
                        $totalMinutes = 0;
                        $totalHours++;
                    }
                    else if($totalMinutes>30)
                    {
                        $totalMinutes=45;
                    }
                    else if($totalMinutes>15)
                    {
                        $totalMinutes=30;
                    }
                    else if($totalMinutes>0)
                    {
                        $totalMinutes=15;
                    }
                }
                
                $minute_s = ((int)$totalMinutes != 1) ? 's' : '';
                $hour_s = ((int)$totalHours != 1) ? 's' : '';
                $mile_s = ((int)$numberOfMiles != 1) ? 's' : '';
                    
                return view('trip.index')->with([
                    'validationPassed' => $validationPassed,
                    'numberOfMiles' => $numberOfMiles,
                    'estimatedSpeed' => $estimatedSpeed,
                    'roundOff' => $roundOff,
                    'totalHours' => $totalHours,
                    'totalMinutes' => $totalMinutes,
                    'minute_s' => $minute_s,
                    'hour_s' => $hour_s,
                    'mile_s' => $mile_s
                ]);
            }
            else
            {
                //validation failed                
                return view('trip.index')->with([
                    'validationPassed' => $validationPassed,
                    'numberOfMiles' => $numberOfMiles,
                    'estimatedSpeed' => $estimatedSpeed,
                    'roundOff' => $roundOff
                ]);
            }
        }
    }
}
