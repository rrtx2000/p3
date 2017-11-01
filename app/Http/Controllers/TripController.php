<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Debugbar;

class TripController extends Controller
{
    /*
    public function index()
    {
        return 'Show initial form';
    }
    
    //This will calculate the time 
    public function showResults()
    {
        return 'Show results here';
    }
    */
    
    public function show(Request $request)
    {
        #$showDumps = true;
        $showDumps = false;
        if($showDumps)
        {
            //dump($request);           //See all the properties and methods available in the $request object
            dump($request->all());      //See just the form data from the $request object
            
            dump('has numberOfMiles=' . $request->has('numberOfMiles'));
            dump('numberOfMiles=' . $request->input('numberOfMiles'));        //See just the form data for numberOfMiles
            
            dump('has estimatedSpeed=' . $request->has('estimatedSpeed'));
            dump('estimatedSpeed=' . $request->input('estimatedSpeed'));        //See just the form data for estimatedSpeed
            
            dump('has roundOff=' . $request->has('roundOff'));
            echo("<br>roundOff contents:"); echo("<pre>" . print_r($request->input('roundOff'), 1) . "</pre>");
            
            dump('fullUrl=' . $request->fullUrl());
            dump('method=' . $request->method());
            dump('isMethod get=' . $request->isMethod('get'));
            dump('isMethod post=' . $request->isMethod('post'));
        }
        
        //Debugbar::addMessage('File: ' . __FILE__ . ' - Line: ' . __LINE__ . ' - function: ' . __FUNCTION__, 'Tracing');
        if (empty($request->all()))
        {
            //initial request
            return view('trip.index');
        }
        else
        {
            $errors = '';
            
            //if ($request->has('numberOfMiles')) {
                $this->validate($request, [
                    'numberOfMiles' => 'required|integer|Min:1'
                ]);
            //}
            

            
            //dump($errors);exit;

            
            $numberOfMiles = $request->input('numberOfMiles', null);
            $estimatedSpeed = $request->input('estimatedSpeed', '60');      //if a speed isn't supplied, start with an initial value of 60
            $roundOff = ($request->has('roundOff')) ? true : false;
            
            $errorMessage = '';
            //@todo - validate here
            if ($errors) {
                $validationPassed = false;
            }
            else
            {
                $validationPassed = true;
            }
            
            //$totalHours = NULL;
            //$totalMinutes = NULL;
            
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
