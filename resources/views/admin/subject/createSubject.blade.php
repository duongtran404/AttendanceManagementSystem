@extends('layout.layout')

@section('content')
    
    <form class="form mt-5" action="{{ route('createSubject') }}" method="post">
        @csrf
        <h3 class="text-center text-dark">New subject</h3>
        <div class="form-group mt-3">
            <label for="name" class="text-dark">Name(*) : </label><br>
            <input type="text" name="name" id="name" class="form-control">
            @error('name')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="credits" class="text-dark">Credits(*) : </label><br>
            <input type="text" name="credits" id="credits" class="form-control">
            @error('credits')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="notes" class="text-dark">Notes : </label><br>
            <input type="text" name="notes" id="notes" class="form-control">
            @error('notes')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="remember-me" class="text-dark"></label><br>
            <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
        </div>
    </form>
@endsection
