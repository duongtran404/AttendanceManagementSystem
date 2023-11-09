@extends('layout.layout')

@section('content')
    {{-- <form action="{{ route('markAttendance', [$attendance->id]) }}" method="post">
        @csrf --}}
    <h1 class="text-center">Class {{ $lesson->class->name }}</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        {{ Breadcrumbs::render('view attendance',$lesson->class->id) }}
    </nav>
    <h2 class="text-center">Begin time {{ $lesson->begin_time }}</h2>
    <div>
        <table class="table">
            <tr class="text-center">
                <th>Student id</th>
                <th>Name</th>
                <th>Status</th>
                <th>Note</th>
            </tr>
            @foreach ($attendances as $attendance)
                <tr class="text-center">
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
