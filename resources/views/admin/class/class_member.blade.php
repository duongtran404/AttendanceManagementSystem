@extends('layout.layout')
@section('content')
<h1 class="text-center">{{ $class->name }}</h1>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    {{ Breadcrumbs::render('class member',$class->id) }}
</nav>
<form class="d-flex " role="search" action="{{-- route('searchMember',[$id]) --}}" method="get">
    @csrf
    <input class="form-control me-1" type="Search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success me-1" type="submit">Search</button>
</form>
    <a class="btn btn-primary mb-3 mt-3" href="{{ route('student-list',[$id]) }}">Add student to list</a>
    <div>
        <table class="table">
            <tr class="text-center">
                <th>Id</th>
                <th>Name</th>
                <th>Phone number</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            @foreach ($members as $item)
                <tr class="text-center">
                    <td>{{ $item->user->id }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>0{{ $item->user->phone_number }}</td>
                    <td>{{ $item->user->email }}</td>
                    <td>
                        <form action="{{ route('deleteMember',[$item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="pagination">
        {{ $members->links() }}
    </div>
@endsection
