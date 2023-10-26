@extends('layout.layout')
@section('content')
<form class="form mt-5" action="{{route('editLesson')}}" method="post">
    @csrf
    <h3 class="text-center text-dark">Edit Lesson</h3>
    <div class="form-group">
        <label for="subject" class="text-dark">Subject: </label><br>
        <input type="text" name="student_id" class="form-control" >
        @error('subject')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
    </div>
    <div class="form-group mt-3">
        <label for="time_begin" class="text-dark">Time begin: </label><br>
        <input type="datetime-local" name="time_begin" id="time_begin" class="form-control" >
        @error('time_begin')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="Location" class="text-dark">Location: </label><br>
        <input type="text" name="location" id="location" class="form-control" >
        @error('location')
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

<form action="" method="GET">
    @csrf
    @method('delete')
    <button class="btn btn-primary mt-1" type="submit">delete</button>
</form>
    
</form>
@endsection