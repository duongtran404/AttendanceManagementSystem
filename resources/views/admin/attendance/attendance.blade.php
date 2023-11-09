@extends('layout.layout')

@section('content')
<h1 class="text-center">Attendance</h1>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    {{ Breadcrumbs::render('attendance',$attendance->id) }}
</nav>
    <form action="{{ route('markAttendance', [$attendance->id]) }}" method="post">
        @csrf
        <h2 class="text-center">{{ $attendance->class->name }}</h2>
        <h3 class="text-center">Begin time: {{ $attendance->begin_time }}</h3>
        <div>
            <table class="table">
                <tr class="text-center">
                    <th>Student id</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Note</th>
                </tr>
                @foreach ($attendance->class->class_member as $item)
                    @if ($item->user->status == 'currently enrolled' && $item->user->deleted_at == null)
                    <tr class="text-center">
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
                    @endif
                    @endforeach
            </table>
        </div>

        <button class="btn btn-dark" type="submit">Save</button>
    </form>
@endsection
