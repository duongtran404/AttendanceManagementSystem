@extends('layout.layout')
@section('content')
    @include('layout.success-message')
    @include('layout.error-message')
    <h1 class="text-center">Archive Teacher</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        {{ Breadcrumbs::render('archive teacher') }}
    </nav>
    <form class="d-flex " role="search" action="{{ route('searchStudent') }}" method="get">
        @csrf
        <input class="form-control me-1" type="Search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success me-1" type="submit">Search</button>
        {{-- <a class="btn btn-primary" href="{{ route('archiveTeacher') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-archive-fill" viewBox="0 0 16 16">
            <path
                d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z" />
        </svg>
    </a> --}}

    </form>
    <div>
        <table class="table">
            <tr class="text-center">
                <th>Id</th>
                <th>Name</th>
                <th>Gerden</th>
                <th>Phone number</th>
                <th>Email</th>
                <th>Location</th>
                <th>Notes</th>
                <th>Action</th>
            </tr>
            @foreach ($teachers as $item)
                <tr class="text-center">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->gerden }}</td>
                    <td>0{{ $item->phone_number }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->location }}</td>
                    <td>{{ $item->notes }}</td>
                    <td>
                        <form action="{{ route('hard-delete-teacher', [$item->id]) }}" method="POST">
                            @csrf
                            <a class="btn btn-primary" href="{{ route('restore-teacher', [$item->id]) }}">Restore</a>
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="pagination">
            {{ $teachers->links() }}
        </div>
    </div>
@endsection
