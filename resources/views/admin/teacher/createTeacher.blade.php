@extends('layout.layout')

@section('content')
    <h1 class="text-center text-dark">New teacher</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        {{ Breadcrumbs::render('new teacher') }}
    </nav>
    <form class="form mt-5" action="{{ route('createTeacher') }}" method="post">
        @csrf
        <div class="form-group mt-3">
            <label for="name" class="text-dark">Name(*) : </label><br>
            <input type="text" name="name" id="name" class="form-control">
            @error('name')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="gerden" class="text-dark">Gerden:</label><br>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="gerden">
                <option selected>Open this select menu</option>
                <option value="male">male</option>
                <option value="female">female</option>
                <option value="another">another</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="email" class="text-dark">Email(*) :</label><br>
            <input type="email" name="email" id="email" class="form-control">
            @error('email')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="location" class="text-dark">Phone number :</label><br>
            <input type="text" name="phone_number" id="phone_nmber" class="form-control">
            @error('phone_number')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="location" class="text-dark">Location :</label><br>
            <input type="text" name="location" id="location" class="form-control">
            @error('location')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="Notes" class="text-dark">Notes :</label><br>
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
