@extends('layout.layout')
@section('content')

@include('layout.success-message')
@include('layout.error-message')
    <h1 class="text-center">ATTENDANCE REPORT</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        {{ Breadcrumbs::render('attendance report') }}
    </nav>
    <form class="d-flex " role="search" action="{{ route('searchClassReport') }}" method="get">
        @csrf
        <input class="form-control me-1" type="Search" placeholder="Search" aria-label="Search" name="search" value="{{ $search }}">
        <button class="btn btn-outline-success me-1" type="submit">Search</button>
    </form>
    <form action="">
        <div>
            <table class="table">
                <tr class="text-center">
                    <th>Class name</th>
                    <th>Subject</th>
                    <th>Teacher</th>
                    <th>Begin date</th>
                    <th>End date</th>
                    <th>Option</th>
                </tr>
                @foreach ($class as $item)
                    <tr class="text-center">
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->class_subject->subject->name }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->begin_date }}</td>
                        <td>{{ $item->end_date }}</td>

                        <td>
                            <a class="btn btn-primary" href="{{ route('lessonReport',[$item->id]) }}">List Attendanced</a>
                            <a class="btn btn-primary" href="{{ route('attendance-statistical',[$item->id]) }}">Attendance statistical</a>
                            {{-- <a class="btn btn-primary" href="{{ route('attendance-record',[$item->id]) }}">Attendance record</a> --}}
                        </td>

                    </tr>
                @endforeach
            </table>
        </div>
        <div class="pagination">
            {{ $class->links() }}
        </div>
    </form>
@endsection
