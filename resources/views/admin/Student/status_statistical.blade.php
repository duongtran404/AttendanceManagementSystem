@extends('layout.layout')
@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        {{ Breadcrumbs::render('statistical') }}
    </nav>
    <html>

    <head>
        {{-- <h1> Total number of students: {{ $sum }}</h1>
    <br>
    <h2><label class="mt-05" for="currently_enrolled">Currently enrolled: {{ $currently_enrolled }} student for about: {{ $percent_ce }}%</label></h2>
    <br>
    <h2><label for="leave_of_absence">Leave of absence: {{ $leave_of_absence }} student for about: {{ $percent_la }}%</label></h2>
    <br>
    <h2><label for="dropped_out">Dropped out: <b>{{ $dropped_out }}</b> student for about: <b>{{ $percent_do }}%</b></label></h2>
    <a class="btn btn-primary" href="{{ route('student') }}">< Back</a> --}}

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['currently enroller', {{ $percent_ce }}],
                    ['Leave of absence', {{ $percent_la }}],
                    ['Dropped out', {{ $percent_do }}]
                ]);

                var options = {
                    title: 'student status percent',
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
        </script>
    </head>

    <body>
        <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    </body>

    </html>
@endsection
