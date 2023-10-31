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
                    <form action="{{ route('hard-delete-lesson', [$item->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-primary mt-1" type="submit">delete</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('restore-lesson', [$item->id]) }}" method="GET">
                        @csrf
                        <button class="btn btn-primary mt-1" type="submit">Restore</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
</div>
@endsection