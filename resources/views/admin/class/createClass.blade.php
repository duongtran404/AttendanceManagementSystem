@extends('layout.layout')
@section('content')
    <form class="form mt-5" action="{{ route('createClass') }}" method="post">
        @csrf
        <h3 class="text-center text-dark">New Class</h3>

        <div class="form-group mt-3">
            <label for="name" class="text-dark">Class Name: </label><br>
            <input type="text" name="name" id="name" class="form-control">
            @error('name')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="gerden" class="text-dark">Subject:</label><br>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="subject">
                <option selected>Open this select menu</option>
                @foreach ($subjects as $item)
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="gerden" class="text-dark">Teacher:</label><br>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="teacher_name">
                <option selected>Open this select menu</option>
                @foreach ($teachers as $value)
                    <option value="{{ $value->name }}">{{ $value->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="begin_date" class="text-dark">Begin date: </label><br>
            <input type="date" name="begin_date" id="begin_date" class="form-control">
            @error('begin_date')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="end_date" class="text-dark">End date: </label><br>
            <input type="date" name="end_date" id="end_date" class="form-control">
            @error('end_date')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="remember-me" class="text-dark"></label><br>
            <input type="submit" name="submit" class="btn btn-dark btn-md" value="Save">
        </div>

    </form>
@endsection
