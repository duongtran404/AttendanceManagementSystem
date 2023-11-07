@extends('layout.layout')
@section('content')
<form class="form mt-5" action="{{ route('editClass',[$class->id]) }}" method="post">
    @csrf
    <h3 class="text-center text-dark">Edit Class</h3>

    <div class="form-group mt-3">
        <label for="name" class="text-dark">Class Name: </label><br>
        <input type="text" name="name" id="name" class="form-control" value="{{ $class->name }}">
        @error('name')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="gerden" class="text-dark">Subject:</label><br>
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="subject">
            <option value="{{ $subject->subject->id }}" selected>{{ $subject->subject->name }}</option>
            @foreach ($subjects as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mt-3">
        <label for="gerden" class="text-dark">Teacher:</label><br>
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="teacher_name">
            <option value="{{ $teacher->user->id }}" selected>{{ $teacher->user->name }}</option>
            @foreach ($teachers as $value)
                <option value="{{ $value->id }}">{{ $value->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mt-3">
        <label for="begin_date" class="text-dark">Begin date: </label><br>
        <input type="date" name="begin_date" id="begin_date" class="form-control" value="{{ date('Y-d-m', strtotime($class->begin_date)) }}">
        @error('begin_date')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="end_date" class="text-dark">End date: </label><br>
        <input type="date" name="end_date" id="end_date" class="form-control" value="{{ date('Y-d-m', strtotime($class->end_date)) }}">
        @error('end_date')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
    </div>

    <div class="form-group mt-3">
        <a class="btn btn-primary" href="{{ route('class') }}">< Back</a>
        <label for="remember-me" class="text-dark"></label>
        <input type="submit" name="submit" class="btn btn-dark btn-md" value="Save">
        
    </div>
    
</form>
@endsection