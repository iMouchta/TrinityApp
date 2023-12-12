@extends('layout/plantilla')

@section('barra')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js">
    <div class="container">
            <h1><center>Grafico de Barras</center></h1>

    </style>
    <div>
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
            document.addEventListener('DOMContentLoaded', function () {
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Evento 1', 'Evento 2', 'Evento 3', 'Evento 4', 'Evento 5', 'Evento 6'],
                        datasets: [{
                            label: 'Numero de inscritos',
                            data: [120, 90, 60, 30, 75, 50],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.7)',
                                'rgba(54, 162, 235, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(153, 102, 255, 0.7)',
                                'rgba(153, 102, 255, 0.7)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(153, 102, 255, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>

    </div>
@endsection