@extends('layout.layout')
@section('content')
    <h1></h1>
    <form class="d-flex " role="search" action="" method="">
        <input class="form-control me-1" type="Search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        {{-- <a class="btn btn-primary" href="{{ route("archiveLesson",[$id]) }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
                <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
              </svg>
        </a> --}}
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
                <th>Option</th>
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
                    <td><a class="btn btn-primary" href="{{ route('viewAttendance',[$item->id]) }}">View</a></td>
                    {{-- <td>
                        <a class="btn btn-primary" href="{{ route('editLesson', [$item->id]) }}"> Edit</a>

                    </td>
                    <td>
                        <form action="{{ route('deleteLesson',[$item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary" type="submit">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('attendance',[$item->id]) }}" class="btn btn-primary " role="button"
                            aria-disabled="true">Attendance</a>
                    </td>
                </tr> --}}
            @endforeach

        </table>
    </div>
@endsection
