@extends('layout.layout')
@section('content')
<h1 class="text-center">Add member</h1>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    {{ Breadcrumbs::render('add member',$class->id) }}
</nav>
<form class="d-flex " role="search" action="{{ route('searchMemberNotInClass',[$class->id])}}" method="get">
    @csrf
    <input class="form-control me-1" type="Search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success me-1" type="submit">Search</button>
</form>
<div>
    <table class="table">
        <tr class="text-center">
            <th>Id</th>
            <th>Name</th>
            <th>Phone number</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @foreach ($studentNotInClass as $item)
            <tr class="text-center">
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>0{{ $item->phone_number }}</td>
                <td>{{ $item->email }}</td>
                <td><form action="{{ route('add-member',[$item->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="class_id" value="{{ $id }}">
                    <button class="btn btn-primary" type="submit">ADD</button>
                </form>
                </td>
            </tr>
            
        @endforeach
    </table>
</div>
<div class="pagination">
    {{ $studentNotInClass->links() }}
</div>
@endsection