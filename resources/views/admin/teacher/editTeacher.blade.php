@extends('layout.layout')

@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    {{ Breadcrumbs::render('edit teacher',[$teacher->id]) }}
</nav>
    <form class="form mt-5" action="{{ route('editTeacher',[$teacher->id]) }}" method="post">
        @csrf
        <h3 class="text-center text-dark">Edit teacher</h3>
        <div class="form-group mt-3">
            <label for="name" class="text-dark">Name(*) : </label><br>
            <input type="text" name="name" id="name" class="form-control" value="{{ $teacher->name }}">
            @error('name')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="gerden" class="text-dark">Gerden:</label><br>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="gerden">
                <option value="{{ $teacher->gerden }}" selected>{{ $teacher->gerden }}</option>
                <option value="male">male</option>
                <option value="female">female</option>
                <option value="another">another</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="email" class="text-dark">Email(*) :</label><br>
            <input type="email" id="email" class="form-control" value="{{ $teacher->email }}" disabled>
        </div>

        <div class="form-group mt-3">
            <label for="location" class="text-dark">Phone number :</label><br>
            <input type="text" name="phone_number" id="phone_nmber" class="form-control" value="{{ $teacher->phone_number }}">
            @error('phone_number')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="location" class="text-dark">Location :</label><br>
            <input type="text" name="location" id="location" class="form-control" value="{{ $teacher->location }}">
            @error('location')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="Notes" class="text-dark">Notes :</label><br>
            <input type="text" name="notes" id="notes" class="form-control" value="{{ $teacher->notes }}">
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