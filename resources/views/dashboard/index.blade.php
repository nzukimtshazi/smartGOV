<!-- app/views/dashboard/index.blade.php -->
@extends('layout/layout')

<!DOCTYPE html>
<html lang="en">
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMARTGOV</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
</head>

<body>
<h1>MY DASHBOARD</h1>
<div class="btn-group mr-2 mb-sm-0 float-sm-right mt-1">
    <a href="{{ route('dashboard') }}" role="button"
       class="btn btn-sm btn-outline-info waves-light waves-effect">
        <i class="ri-add-circle-line align-middle mr-2"></i><strong>All Modules</strong></a>
    <a href="{{ route('ambulanceHistory') }}" role="button"
       class="btn btn-sm btn-outline-info waves-light waves-effect">
        <i class="ri-add-circle-line align-middle mr-2"></i>Air Ambulance History</a>
    <a href="{{ route('complaintHistory') }}" role="button"
       class="btn btn-sm btn-outline-info waves-light waves-effect">
        <i class="ri-add-circle-line align-middle mr-2"></i>Complaint Management History</a>
    <a href="{{ route('incidentHistory') }}" role="button"
       class="btn btn-sm btn-outline-info waves-light waves-effect">
        <i class="ri-add-circle-line align-middle mr-2"></i>Incident History</a>
</div>
<canvas id="incidentChart" style="width: 300px; height: 300px;"></canvas>
<script>
    var ctx = document.getElementById('incidentChart').getContext('2d');

    var data = {
        labels: [
                @foreach($daily_stats as $stats)
                    ["{{ $stats->name }}", "{{ $stats->count }}"],
            @endforeach
        ],
        datasets: [{
            label: 'SMARTGOV STATS',
            data: [
                @foreach($daily_stats as $stats)
                {{ $stats->count }},
                @endforeach
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    };

    var totalIncidentsCount = 0;
    @foreach($daily_stats as $stats)
            totalIncidentsCount += {{ $stats->count }};
            @endforeach

    var incidentChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: true, // Make it non-responsive if needed
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw + ' incidents';
                                }
                            }
                        },
                        datalabels: {
                            display: true,
                            color: '#000',
                            formatter: function(value, context) {
                                if (context.chart.config.type === 'bar') {
                                    return 'TOTAL NUMBER OF INCIDENTS\n' + totalIncidentsCount;
                                }
                                return value;
                            }
                        }
                    }
                }
            });
</script>
</body>
@endsection
</html>