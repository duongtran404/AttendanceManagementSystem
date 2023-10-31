@extends('layout.layout')

@section('content')
<form class="form mt-5" action="{{ route('insertLesson',[$id]) }}" method="post">
    @csrf
    <h1 class="text-center text-dark">{{ $classes->name }}</h1>
    <h3 class="text-center text-dark">{{ $classes->class_subject->subject->name }}</h3>
    <div class="form-group mt-3">
        <label for="begin_time" class="text-dark">Begin time: </label><br>
        <input type="datetime-local" name="begin_time" id="begin_time" class="form-control" >
        @error('begin_time')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="location" class="text-dark">Location: </label><br>
        <input type="text" name="location" id="location" class="form-control" >
        @error('location')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="address" class="text-dark">Address: </label><br>
        <input type="text" name="address" id="address" class="form-control" >
        @error('address')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="remember-me" class="text-dark"></label><br>
        <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
    </div>
    
</form>
@endsection