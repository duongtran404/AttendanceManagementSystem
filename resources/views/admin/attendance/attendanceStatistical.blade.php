@extends('layout.layout')
@section('content')
    {{-- <h1 class="text-center">Class {{ $attendance->class->name }}</h1>
<h2 class="text-center">Begin time {{ $attendance->begin_time }}</h2>
<h3 class="text-center">Attendance</h3> --}}
    <div>
        <table class="table">
            <tr>

                <th>Class Name</th>
                <th>persent persent: </th>
            </tr>
            @foreach ($lessonStatistical as $item)
                <tr>
                    <td>{{ $item['subject'] }}</td>
                    <td>{{ $item['statistical'] }} %</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
