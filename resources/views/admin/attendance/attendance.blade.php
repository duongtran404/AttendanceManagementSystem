@extends('layout.layout')

@section('content')
<h1 class="text-center">SUBJECT NAME</h1>
<h2 class="text-center">TIME BEGIN: {{ '10:30 18/10/2023' }}</h2>
<h3 class="text-center">Attendance</h3>
<div>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Student id</th>
            <th>Name</th>
            <th>Status</th>
            <th>Note</th>
        </tr>
        @foreach ($attendance as $item)           
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection