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
            <td>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="present" checked>
                    <label class="form-check-label" for="exampleRadios1">
                      present
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="absent">
                    <label class="form-check-label" for="exampleRadios2">
                      absent
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="exampleRadios3" value="late">
                    <label class="form-check-label" for="exampleRadios3">
                      late
                    </label>
                  </div>
            </td>
            <td><input type="text"></td>
        </tr>
    </table>
</div>
@endsection