<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
