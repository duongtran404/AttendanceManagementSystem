@extends('layout.layout')

@section('content')
@include('layout.success-message')
<h1>CLASS ARCHIVE</h1>
<form class="d-flex " role="search" action="{{ route('searchClass') }}" method="get">
    @csrf
    <input class="form-control me-1" type="Search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>

    <div>
        <table class="table">
            <tr class="text-center">
                <th>Class name</th>
                <th>Subject</th>
                <th>Teacher</th>
                <th>Begin date</th>
                <th>End date</th>
                <th>Deleted at</th>
                <th>Action</th>
            </tr>
            @foreach ($class as $item)
                <tr class="text-center">
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->class_subject->subject->name }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->begin_date }}</td>
                    <td>{{ $item->end_date }}</td>
                    <td>{{ $item->deleted_at }}</td>

                    <td>
                        <form action="{{ route('hard-delete-class',[$item->id]) }}" method="post">
                            @csrf
                            <a class="btn btn-primary" href="{{ route('restore-class',[$item->id]) }}">Restore</a>
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>
    </div>
@endsection