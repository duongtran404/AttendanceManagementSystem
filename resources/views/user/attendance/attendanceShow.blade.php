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
        <tr>
            <td>1</td>
            <td>riki123</td>
            <td>Duong123</td>
            <td>absent</td>
            <td>di muon 15p</td>
        </tr>
    </table>
</div>
@endsection