@extends('layouts.admin')
@section('content')
    <canvas id="fileDownloadChart" width="200" height="100"></canvas>
@endsection

@section('javascript')
    <script src="{{ asset('js/Chart.bundle.min.js') }}"></script>
    <script>
        var ctx = document.getElementById('fileDownloadChart').getContext('2d');
        var fileDownloadChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode(array_keys($file_downloads_stat)) !!},
                datasets: [{
                    label: '# Total Download Counts',
                    data: {!! json_encode(array_values($file_downloads_stat)) !!},
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection