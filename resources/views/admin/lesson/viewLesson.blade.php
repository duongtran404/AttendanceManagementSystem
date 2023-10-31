@extends('layout.layout')
@section('content')
    <h1></h1>
    <form class="d-flex " role="search" action="" method="">
        <input class="form-control me-1" type="Search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <div>
        <table class="table">
            <tr>
                <th></th>
                <th>Class name</th>
                <th>Subject</th>
                <th>Teacher</th>
                <th>Time Begin</th>
                <th>Location</th>
                <th></th>
                <th>Option</th>
                <th></th>
            </tr>
            @foreach ($lessons as $item)
                <tr>
                    <td></td>
                    <td>{{ $item->class->name }}</td>
                    <td>{{ $item->class->class_subject->subject->name }}</td>
                    <td>{{ $item->class->user->name }}</td>
                    <td>{{ $item->begin_time }}</td>
                    <td>{{ $item->location->name }}, 
                        {{ $item->location->address }}
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('editLesson', ['id' => $item->id]) }}"> Edit</a>

                    </td>
                    <td>
                        <form action="" method="GET">
                            @csrf
                            @method('delete')
                            <button class="btn btn-primary" type="submit">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('attendance') }}" class="btn btn-primary " role="button"
                            aria-disabled="true">Attendance</a>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@endsection
