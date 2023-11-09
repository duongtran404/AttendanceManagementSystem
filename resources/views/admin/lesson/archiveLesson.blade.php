@extends('layout.layout')
@section('content')
<h1 class="text-center">Archive lesson</h1>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    {{ Breadcrumbs::render('archive lesson',$lesson->id) }}
</nav>
<form class="d-flex " role="search" action="" method="">
    <input class="form-control me-1" type="Search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
<div>
    <table class="table">
        <tr>
            <th>Teacher</th>
            <th>Subject</th>
            <th>Time Begin</th>
            <th>Location</th>
            <th>Deleted at</th>
            <th>Option</th>
            <th></th>
        </tr>
        @foreach ($lessons as $item)
            <tr>
                <td>{{ $item->class->user->name }}</td>
                <td>{{ $item->class->class_subject->subject->name }}</td>
                <td>{{ $item->begin_time }}</td>
                <td>{{ $item->location->name }}, 
                    {{ $item->location->address }}
                </td>
                <td>{{ $item->deleted_at->format('d/m/Y H:i:s') }}</td>
                <td>
                    <form action="{{ route('hard-delete-lesson', [$item->id]) }}" method="POST">
                        @csrf
                        <a class="btn btn-primary" href="{{ route('restore-lesson', [$item->id]) }}">Restore</a>
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
</div>
@endsection