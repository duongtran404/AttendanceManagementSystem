@extends('layout.layout')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{route('register')}}" method="post">
                @csrf
                <h3 class="text-center text-dark">Register</h3>
                <div class="form-group">
                    <label for="email" class="text-dark">User name:</label><br>
                    <input type="text" name="user_name" class="form-control" >
                    @error('user_name')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="email" class="text-dark">Email:</label><br>
                    <input type="email" name="email" id="email" class="form-control" >
                    @error('email')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">Password:</label><br>
                    <input type="password" name="password" id="password" class="form-control" >
                    @error('password')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="confirm-password" class="text-dark">Confirm Password:</label><br>
                    <input type="password" name="password_confirmation" id="confirm-password" class="form-control" >
                    @error('password_confirmation')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="position" class="text-dark">Position:</label><br>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="position" >
                        <option selected>Open this select menu</option>
                        <option value="admin">admin</option>
                        <option value="teacher">teacher</option>
                        <option value="student">student</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="remember-me" class="text-dark"></label><br>
                    <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
                </div>
                <div class="text-right mt-2">
                    <a href="/login" class="text-dark">Login here</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
