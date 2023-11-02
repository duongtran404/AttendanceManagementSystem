@extends('layout.layout')
@section('content')
    <h1>CLASS MANAGEMENT</h1>
    <form class="d-flex " role="search" action="" method="">
        <input class="form-control me-1" type="Search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

    <form action="">

        <div>
            <table class="table">
                <tr>
                    <th>Class name</th>
                    <th>Subject</th>
                    <th>Teacher</th>
                    <th>Begin date</th>
                    <th>End date</th>
                    <th>Option</th>
                </tr>
                @foreach ($class as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->class_subject->subject->name }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->begin_date }}</td>
                        <td>{{ $item->end_date }}</td>

                        <td>
                            {{-- <a class="btn btn-primary" href="{{ route('createLesson', [$item->id]) }}">new lesson</a> --}}
                            {{-- <a class="btn btn-primary" href="{{ route('editLesson', [$item->id]) }}"> Edit</a> --}}
                            {{-- <a class="btn btn-primary" href="">Delete</a> --}}
                            <a class="btn btn-primary" href="{{ route('lessonReport',[$item->id]) }}">About</a>
                        </td>

                    </tr>
                @endforeach
            </table>
        </div>
    </form>
@endsection