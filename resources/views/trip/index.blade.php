@extends('layouts.master')

@section('title')
    P3 - Trip Time Computer - index blade
@endsection

@push('head')
@endpush

@section('content')
	<h1 class='mycenter'>Alan Martinson - P3 For CSCI E15</h1>
        <h2 id='program_title'>Trip Time Calculator</h2>
    
    @if ($errors->any())
	<div class="alert alert-danger">
	    <ul>
		@foreach ($errors->all() as $error)
		    <li>{{ $error }}</li>
		@endforeach
	    </ul>
	</div>
    @endif
    
    
<?php

    if (isset($_GET['numberOfMiles'])){
	$numberOfMiles = $_GET['numberOfMiles'];
    }
    else {
	$numberOfMiles = '';
    }
    
    if (isset($_GET['estimatedSpeed'])){
	$estimatedSpeed = $_GET['estimatedSpeed'];
    }
    else {
	$estimatedSpeed = '60';
    }
    
    if (isset($_GET['roundOff'])){
	$roundOff = true;
	$roundOffChecked = " checked='checked'";
    }
    else {
	$roundOff = false;
	$roundOffChecked = "";
    }
?>

    <div>
	This application calculates the estimated time a trip will take you.
	You enter the number of miles you will drive, your anticipated estimated speed, and
	if you want to round the results up to the nearest 15 minutes.
	<br/>
	<br/>
    </div>

	<form action='#'>
	    <label for='numberOfMiles'>Number of miles you will drive (required): </label>
	    <input type='text' name='numberOfMiles' id='numberOfMiles' value='{{ $numberOfMiles or '' }}'>
	    
	    <br/>
	    <label for='estimatedSpeed'>Estimated Speed (required): </label>
	    <select name='estimatedSpeed' id='estimatedSpeed'>
		
		<?php
			
		    $MINIMUM_SPEED = 5;
		    $MAXIMUM_SPEED = 120;
		    for ($i=$MINIMUM_SPEED; $i<=$MAXIMUM_SPEED; $i= $i+5){
			if($i == $estimatedSpeed){
			    $estimatedSpeedSelected = " selected";
			}
			else {
			    $estimatedSpeedSelected = "";
			}
			
			echo("\t\t\t\t\t<option" . $estimatedSpeedSelected . ">" . $i . "</option>\n");
		    }
		?>
	    </select>
	    
	    <br/>Round up to the nearest 15 minutes: <input type='checkbox' name='roundOff[]' {{ ($roundOff) ? ' CHECKED' : '' }}>
	    <br/>
	    <button type='submit'>Submit</button>
	</form>
	
	@if (isset($totalMinutes))
		
                <div id='results'>
                    <h2>Results</h2>
                    
			
                    Based on your expected average speed of {{ $estimatedSpeed }} mph, it will take you
                    {{ $totalHours }} hour{{ $hour_s }}
                    and {{(int)$totalMinutes}} minute{{ $minute_s }}
                    to travel {{ $numberOfMiles }} mile{{ $mile_s }}.
		
                    
                    
                   
                </div>
	
	
	@endif
	
	
	
@endsection

@push('body')
@endpush