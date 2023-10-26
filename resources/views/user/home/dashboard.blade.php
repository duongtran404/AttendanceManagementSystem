@extends('layout.layout')
@section('content')
    <form class="d-flex " role="search" action="{{route('dashboard')}}" method="GET">
        @csrf
        <input class="form-control me-2" type="search" placeholder="Search with subject" aria-label="Search">
        <label for="search begin_date">begin date</label>
        <input class="form-control me-1" type="date" placeholder="Search" aria-label="Search">
        <label for="search begin_date">end date</label>
        <input class="form-control me-1" type="date" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <h1 class="h1 mt-4">LESSON LIST</h1>
    <div>
        <table class="table">
            <tr>
                <th>#</th>
                <th>Subject</th>
                <th>Time begin</th>
                <th>Location</th>
                <th>Teacher</th>
                <th>Attendance</th>
            </tr>
            <tr>
                <td>1</td>
                <td>toan</td>
                <td>10:30</td>
                <td>room 1</td>
                <td>datphan</td>
                <td>
                    <a href="/attendance" class="btn btn-primary " role="button" aria-disabled="true">Attendance</a>
                </td>
            </tr>
        </table>
    </div>
@endsection
