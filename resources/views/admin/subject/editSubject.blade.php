@extends('layout.layout')

@section('content')
    <h1 class="text-center">Edit subject</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        {{ Breadcrumbs::render('edit subject', $subject->id) }}
    </nav>
    <form class="form mt-5" action="{{ route('editSubject', [$subject->id]) }}" method="post">
        @csrf
        <div class="form-group mt-3">
            <label for="name" class="text-dark">Name(*) : </label><br>
            <input type="text" name="name" id="name" class="form-control" value="{{ $subject->name }}">
            @error('name')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="credits" class="text-dark">Credits(*) : </label><br>
            <input type="text" name="credits" id="credits" class="form-control" value="{{ $subject->credits }}">
            @error('credits')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="notes" class="text-dark">Notes : </label><br>
            <input type="text" name="notes" id="notes" class="form-control" value="{{ $subject->notes }}">
            @error('notes')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="remember-me" class="text-dark"></label><br>
            <input type="submit" name="submit" class="btn btn-dark btn-md" value="Save">
        </div>
    </form>
@endsection
