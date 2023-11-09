@extends('layout.layout')
@section('content')

    <h1 class="text-center">Class {{ $lesson->class->name }}</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        {{ Breadcrumbs::render('attendance statistical',$lesson->class_id) }}
    </nav>
    <div>
        <table class="table">
            <tr>
                <th>Lesson ID</th>
                <th>Persent persent: </th>
                <th>present/total</th>
            </tr>
            @foreach ($lessonStatistical as $item)
                <tr>
                    <td>{{ $item['lesson_id'] }}</td>
                    <td>{{ $item['statistical'] }} %</td>
                    <td>{{ $item['attendance'] }}/{{ $item['total'] }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{-- <html>

    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['bar']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['ID', 'Present', 'Absent'],
                    @foreach ($lessonStatistical as $item)
                        [{{ $item['lesson_id'] }}, {{ $item['attendance'] }}, {{ $item['absent'] }}],
                    @endforeach
                ]);

                var options = {
                    chart: {
                        title: 'Statistical',
                    },
                    bars: 'horizontal' // Required for Material Bar Charts.
                };

                var chart = new google.charts.Bar(document.getElementById('barchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>
    </head>

    <body>
        <div id="barchart_material" style="width: 900px; height: 500px;"></div>
    </body>

    </html> --}}
@endsection
