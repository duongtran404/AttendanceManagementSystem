@extends('layout.layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6">
                <form class="form mt-5" action="{{ route('register') }}" method="post">
                    @csrf
                    <h3 class="text-center text-dark">Register</h3>
                    <div class="form-group">
                        <label for="name" class="text-dark">User name(*):</label><br>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="email" class="text-dark">Email(*):</label><br>
                        <input type="email" name="email" id="email" class="form-control">
                        @error('email')
                            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="password" class="text-dark">Password(*):</label><br>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="confirm-password" class="text-dark">Confirm Password(*):</label><br>
                        <input type="password" name="password_confirmation" id="confirm-password" class="form-control">
                        @error('password_confirmation')
                            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                        @enderror
                    </div>
                    {{-- <div class="form-group mt-3">
                        <label for="gerden" class="text-dark">Gerden(*):</label><br>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="gerden">
                            <option selected>Open this select menu</option>
                            <option value="male">male</option>
                            <option value="female">female</option>
                            <option value="another">another</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="role" class="text-dark">Role(*):</label><br>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="role">
                            <option selected>Open this select menu</option>
                            <option value="admin">admin</option>
                            <option value="teacher">teacher</option>
                            <option value="student">student</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="phone_number" class="text-dark">Phone Number(*):</label><br>
                        <input type="text" name="phone_number" id="phone_number" class="form-control">
                        @error('phone_number')
                            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="location" class="text-dark">Location(*):</label><br>
                        <input type="text" name="location" id="location" class="form-control">
                        @error('location')
                            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="department" class="text-dark">Department:</label><br>
                        <input type="text" name="department" id="department" class="form-control">
                        @error('department')
                            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="status" class="text-dark">Status:</label><br>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="status">
                            <option selected></option>
                            <option value="currently enrolled">Curently enrolled</option>
                            <option value="dropped out">Dropped out</option>
                            <option value="leave of absence">Leave of absence</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="title" class="text-dark">Title:</label><br>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="title">
                            <option selected></option>
                            <option value="lecturer">lecturer</option>
                            <option value="associate professor">associate professor</option>
                            <option value="professor">professor</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="note" class="text-dark">Notes:</label><br>
                        <input type="text" name="notes" id="notes" class="form-control">
                        @error('notes')
                            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="remember-me" class="text-dark"></label><br>
                        <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
                    </div>
                    {{-- <div class="text-right mt-2">
                        <a href="/" class="text-dark">Login here</a>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
@endsection
