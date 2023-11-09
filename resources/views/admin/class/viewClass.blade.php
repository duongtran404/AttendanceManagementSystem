@extends('layout.layout')
@section('content')
    @include('layout.success-message')
    @include('layout.error-message')
    <h1 class="text-center">CLASS MANAGEMENT</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        {{ Breadcrumbs::render('class') }}
    </nav>
    <form class="d-flex " role="search" action="{{ route('searchClass') }}" method="get">
        @csrf
        <input class="form-control me-1" type="Search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        <a class="btn btn-primary" href="{{ route('archiveClass') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-archive-fill" viewBox="0 0 16 16">
                <path
                    d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z" />
            </svg>
        </a>
    </form>

    <a class="btn btn-primary mt-3" href="{{ route('createClass') }}">New Class</a>

        <div>
            <table class="table">
                <tr class="text-center">
                    <th>Class name</th>
                    <th>Subject</th>
                    <th>Teacher</th>
                    <th>Begin date</th>
                    <th>End date</th>
                    <th>Action</th>
                </tr>
                @foreach ($class as $item)
                    <tr class="text-center">
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->class_subject->subject->name }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->begin_date }}</td>
                        <td>{{ $item->end_date }}</td>
                        <td>
                            <form action="{{ route('deleteClass', [$item->id]) }}" method="POST">
                                @csrf
                                <a class="btn btn-primary" href="{{ route('editClass', [$item->id]) }}"> Edit</a>
                                <a class="btn btn-primary" href="{{ route('createLesson', [$item->id]) }}">New lesson</a>
                                <a class="btn btn-primary" href="{{ route('lesson', [$item->id]) }}">Schedule</a>
                                <a class="btn btn-primary" href="{{ route('class_member',[$item->id]) }}">Student List</a>
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
@endsection
