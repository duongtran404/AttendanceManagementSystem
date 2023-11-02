@extends('layout.layout')

@section('content')
    <form class="form mt-5" action="{{ route('updateStudent', [$students->id]) }}" method="post">
        @method('post')
        @csrf
        <h3 class="text-center text-dark">Edit student</h3>
        <div class="form-group">
            <label for="id" class="text-dark">Student id: {{ $students->id }}</label><br>
        </div>
        <div class="form-group mt-3">
            <label for="name" class="text-dark">Name: </label><br>
            <input type="text" name="name" id="name" class="form-control" value="{{ $students->name }}">
            @error('name')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="gerden" class="text-dark">Gerden:</label><br>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="gerden">
                <option selected>{{ $students->gerden }}</option>
                <option value="male">male</option>
                <option value="female">female</option>
                <option value="another">another</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="phone_number" class="text-dark">Phone number :</label><br>
            <input type="text" name="phone_number" id="phone_number" class="form-control"
                value="0{{ $students->phone_number }}">
            @error('phone_number')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="location" class="text-dark">Location :</label><br>
            <input type="text" name="location" id="location" class="form-control" value="{{ $students->location }}">
            @error('location')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="status" class="text-dark">Status:</label><br>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="status">
                <option selected>{{ $students->status }}</option>
                <option value="currently enrolled">currently enrolled</option>
                <option value="dropped out">dropped out</option>
                <option value="leave of absence">leave of absence</option>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="notes" class="text-dark">Notes :</label><br>
            <input type="text" name="notes" id="notes" class="form-control" value="{{ $students->notes }}">
            @error('location')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>

        <a class="btn btn-primary" href="{{ route('student') }}">< Back</a>

            <button class="btn btn-primary" type="submit">Save</button>

        {{-- <form action="{{ route('deleteStudent', [$students->id]) }}" method="POST">
            @csrf
                @method('DELETE') 
            <button class="btn btn-primary mt-1" type="submit">delete</button>
        </form> --}}
    </form>
@endsection
