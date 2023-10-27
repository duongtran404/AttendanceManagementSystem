@extends('layout.layout')
@section('content')
    <h1>STUDENT MANAGEMENT</h1>
    <form class="d-flex " role="search" action="{{ route('student') }}" method="post">
        <input class="form-control me-1" type="Search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    {{-- <a href="{{ route('createStudent') }}" class="btn btn-primary mt-3" role="button" aria-disabled="true">New student</a> --}}

    <div>
        <table class="table">
            <tr>
                {{-- <th>##</th> --}}
                <th>Student id</th>
                <th>Name</th>
                <th>Gerden</th>
                <th>Phone number</th>
                <th>Email</th>
                <th>Location</th>
                <th>Status</th>
                <th>Notes</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($students as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->gerden }}</td>
                    <td>0{{ $item->phone_number }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->location }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->notes }}</td>
                    <td>
                        <form action="{{ route('editStudent', $item->id) }}" method="get">
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </form>
                    </td>
                    {{-- <a class="btn btn-primary" href="{{ route('deleteStudent', [$item->id]) }}">Delete</a> --}}
                    <td>
                        <form action="{{ route('deleteStudent', [$item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary mt-1" type="submit">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            {{-- <tr>
                <td>1</td>
                <td>riki123</td>
                <td>duong tran</td>
                <td>male</td>
                <td>012345</td>
                <td>test@test.com</td>
                <td>Ha Noi</td>
                <td>
                    <form action="{{route('editStudent')}}" method="get">
                        <button class="btn btn-primary" type="submit">Edit</button>
                    </form>
                </td>
            </tr> --}}
        </table>
    </div>
@endsection
