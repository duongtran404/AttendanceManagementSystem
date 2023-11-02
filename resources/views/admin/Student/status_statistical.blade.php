@extends('layout.layout')
@section('content')
    <h1> Total number of students: {{ $sum }}</h1>
    <h2><label for="currently_enrolled">Currently enrolled: {{ $currently_enrolled }} account for about: {{ $percent_ce }}%</label></h2>
    <br>
    <h2><label for="leave_of_absence">Leave of absence: {{ $leave_of_absence }} account for about: {{ $percent_la }}%</label></h2>
    <br>
    <h2><label for="dropped_out">Dropped out: {{ $dropped_out }} account for about: {{ $percent_do }}%</label></h2>
    <a class="btn btn-primary" href="{{ route('student') }}">< Back</a>
@endsection