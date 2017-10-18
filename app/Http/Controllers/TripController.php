<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Debugbar;

class TripController extends Controller
{
    public function index()
    {
        return 'Show initial form';
    }
    
    //This will calculate the time 
    public function showResults()
    {
        return 'Show results here';
    }
    
    public function show($var = '')
    {
        Debugbar::addMessage(__FILE__ . ' function show', 'Tracing');
        if ($var == ''){
            return view('trip.index');
        }
        else {
            return view('trip.index')->with(['var' => $var]);
        }
    }
    
}
