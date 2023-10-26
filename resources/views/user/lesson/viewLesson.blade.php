@extends('layout.layout')
@section('content')
    <h1>LESSON MANAGEMENT</h1>
    <form class="d-flex " role="search" action="" method="">
        <input class="form-control me-1" type="Search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

    <form action="">
        <a href="{{ route('createLesson') }}" class="btn btn-primary mt-3" role="button" aria-disabled="true">New
            lesson</a>
        <div>
            <table class="table">
                <tr>
                    <th>##</th>
                    <th>Subject</th>
                    <th>Time begin</th>
                    <th>Location</th>
                    <th>Teacher</th>
                    <th>CRUD</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Laravel</td>
                    <td>10:30 25/10/2023</td>
                    <td>Room 1</td>
                    <td>hoapc</td>
                    <td>
                        <form action="{{ route('editLesson') }}" method="get">
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </form>
@endsection
