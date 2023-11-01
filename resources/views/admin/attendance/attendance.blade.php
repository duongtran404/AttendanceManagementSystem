@extends('layout.layout')

@section('content')
    <form action="{{ route('markAttendance', [$attendance->id]) }}" method="post">
        @csrf
        <h1 class="text-center">Class {{ $attendance->class->name }}</h1>
        <h2 class="text-center">Begin time {{ $attendance->begin_time }}</h2>
        <h3 class="text-center">Attendance</h3>
        <div>
            <table class="table">
                <tr>
                    <th>Student id</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Note</th>
                </tr>
                @foreach ($attendance->class->class_member as $item)
                    <tr>
                        <td>{{ $item->user->id }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>
                          <input type="hidden" name="user_id[{{ $item->user->id }}]" value="{{ $item->user->id }}">

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status[{{ $item->user->id }}]"
                                    value="absent">
                                <label class="form-check-label" for="">absent</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status[{{ $item->user->id }}]"
                                    value="present">
                                <label class="form-check-label" for="">present</label>
                            </div>

                            <input type="hidden" name="lesson_id[{{ $item->user->id }}]" value="{{ $attendance->id }}">
                            
                        </td>
                        <td>
                            <input type="text" name="notes[{{ $item->user->id}}]">
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <button class="btn btn-primary" type="submit">save</button>
    </form>
@endsection
