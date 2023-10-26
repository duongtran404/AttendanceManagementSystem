@extends('layout.layout')

@section('content')
<form class="form mt-5" action="{{route('createLesson')}}" method="post">
    @csrf
    <h3 class="text-center text-dark">New Lesson</h3>
    <div class="form-group">
        <label for="subject" class="text-dark">Subject: </label><br>
        <input type="text" name="subject" class="form-control" >
        @error('Subject')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
    </div>
    <div class="form-group mt-3">
        <label for="timedate" class="text-dark">Time begin: </label><br>
        <input type="datetime-local" name="time_begin" id="time_begin" class="form-control" >
        @error('time_begin')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="confirm-password" class="text-dark">Location: </label><br>
        <input type="text" name="location" id="location" class="form-control" >
        @error('Create')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="class_id" class="text-dark">Class ID: </label><br>
        <input type="text" name="class_id" id="class_id" class="form-control" >
        @error('class_id')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="remember-me" class="text-dark"></label><br>
        <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
    </div>
    
</form>
@endsection