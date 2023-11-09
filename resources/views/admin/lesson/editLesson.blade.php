@extends('layout.layout')
@section('content')
<h1 class="text-center text-dark">{{ $lessons->class->name }}</h1>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    {{ Breadcrumbs::render('edit lesson',$lessons->id) }}
</nav>
    <form class="form mt-5" action="{{ route('updateLesson', [$lessons->id]) }}" method="post">
        @csrf
        {{-- <h3 class="text-center text-dark">{{ $lessons->class->class_subject->subject->name }}</h3> --}}
        <div class="form-group mt-3">
            <label for="begin_time" class="text-dark">Begin time: </label><br>
            <input type="datetime-local" name="begin_time" id="begin_time" class="form-control" value="{{ date('Y-d-m H:i:s', strtotime($lessons->begin_time)) }}">
            @error('begin_time')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="location" class="text-dark">Location: </label><br>
            <input type="text" name="location" id="location" class="form-control" value="{{ $lessons->location->name }}">
            @error('location')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="address" class="text-dark">Address: </label><br>
            <input type="text" name="address" id="address" class="form-control" value="{{ $lessons->location->address }}">
            @error('address')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="remember-me" class="text-dark"></label><br>
            <input type="submit" name="submit" class="btn btn-dark btn-md" value="Save">
        </div>
    </form>
@endsection
