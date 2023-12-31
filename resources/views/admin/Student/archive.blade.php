@extends('layout.layout')
@section('content')
    @include('layout.success-message')
    @include('layout.error-message')
    <h1 class="text-center">Archive student</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        {{ Breadcrumbs::render('archive student') }}
    </nav>
    <form class="d-flex " role="search" action="{{ route('student') }}" method="post">
        <input class="form-control me-1" type="Search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success me-1" type="submit">Search</button>
    </form>
    {{-- <a href="{{ route('createStudent') }}" class="btn btn-primary mt-3" role="button" aria-disabled="true">New student</a> --}}

    <div>
        <table class="table">
            <tr class="text-center">
                {{-- <th>##</th> --}}
                <th>Student id</th>
                <th>Name</th>
                <th>Gerden</th>
                <th>Phone number</th>
                <th>Email</th>
                <th>Location</th>
                <th>Status</th>
                <th>Notes</th>
                <th>Delete at</th>
                <th>Action</th>
            </tr>
            @foreach ($students as $item)
                <tr class="text-center">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->gerden }}</td>
                    <td>{{ $item->phone_number }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->location }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->notes }}</td>
                    <td>{{ $item->deleted_at }}</td>
                    <td>
                        <form action="{{ route('hard-delete-student', [$item->id]) }}" method="POST">
                            @csrf
                            <a class="btn btn-primary" href="{{ route('restore-student', [$item->id]) }}">Restore</a>
                            @method('DELETE')
                            <button class="btn btn-danger " type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="pagination">
        {{ $students->links() }}
    </div>
@endsection
