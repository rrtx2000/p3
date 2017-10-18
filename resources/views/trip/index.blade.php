@extends('layouts.master')

@section('title')
    Trip child
@endsection

@push('head')
@endpush

@section('content')
    @if(isset($var))
        <h1>The url var is: {{ $var }}</h1>
    @endif
    
    <br/>The Trip computer will go here - this is just copy and pasted html from p2 for now
                <form action='#'>
                <label for='numberOfMiles'>Number of miles you will drive (required): </label>
                <input type='text' name='numberOfMiles' id='numberOfMiles' value=''>
                
                <br/>
                <label for='estimatedSpeed'>Estimated Speed (required): </label>
                <select name='estimatedSpeed' id='estimatedSpeed'>
					<option>5</option>
					<option>10</option>
					<option>15</option>
					<option>20</option>
					<option>25</option>
					<option>30</option>
					<option>35</option>
					<option>40</option>
					<option>45</option>
					<option>50</option>
					<option>55</option>
					<option selected>60</option>
					<option>65</option>
					<option>70</option>
					<option>75</option>
					<option>80</option>
					<option>85</option>
					<option>90</option>
					<option>95</option>
					<option>100</option>
					<option>105</option>
					<option>110</option>
					<option>115</option>
					<option>120</option>
                </select>
                
                <br/>Round up to the nearest 15 minutes: <input type='checkbox' name='roundOff[]' >
                <br/>
                <button type='submit'>Submit</button>
            </form>
@endsection

@push('body')
@endpush