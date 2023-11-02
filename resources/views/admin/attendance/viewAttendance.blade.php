@extends('layout.layout')

@section('content')
    {{-- <form action="{{ route('markAttendance', [$attendance->id]) }}" method="post">
        @csrf --}}
    <h1 class="text-center">Class {{ $lesson->class->name }}</h1>
    <h2 class="text-center">Begin time {{ $lesson->begin_time }}</h2>
    <h3 class="text-center">Attendance</h3>
    <div>
        <table class="table">
            <tr>
                <th>Student id</th>
                <th>Name</th>
                <th>Status</th>
                <th>Note</th>
            </tr>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->id }}</td>
                    <td>{{ $attendance->student_name }}</td>
                    <td>{{ $attendance->status }}</td>
                    <td>{{ $attendance->notes }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    </form>
@endsection