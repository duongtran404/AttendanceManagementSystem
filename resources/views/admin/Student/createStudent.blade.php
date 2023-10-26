@extends('layout.layout')

@section('content')
<form class="form mt-5" action="{{route('createStudent')}}" method="post">
    @csrf
    <h3 class="text-center text-dark">New student</h3>
    <div class="form-group">
        <label for="email" class="text-dark">Student id: </label><br>
        <input type="text" name="student_id" class="form-control" >
        @error('student_id')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
    </div>
    <div class="form-group mt-3">
        <label for="name" class="text-dark">Name: </label><br>
        <input type="text" name="student_name" id="email" class="form-control" >
        @error('name')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="gerden" class="text-dark">Gerden:</label><br>
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="position" >
            <option selected>Open this select menu</option>
            <option value="male">male</option>
            <option value="female">female</option>
            <option value="another">another</option>
        </select>
    </div>
    
    <div class="form-group mt-3">
        <label for="confirm-password" class="text-dark">Email :</label><br>
        <input type="email" name="email" id="email" class="form-control" >
        @error('email')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="confirm-password" class="text-dark">Phone number :</label><br>
        <input type="text" name="phone_number" id="phone_nmber" class="form-control" >
        @error('phone_number')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="confirm-password" class="text-dark">Location :</label><br>
        <input type="text" name="Location" id="Location" class="form-control" >
        @error('location')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="remember-me" class="text-dark"></label><br>
        <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
    </div>
</form>
@endsection