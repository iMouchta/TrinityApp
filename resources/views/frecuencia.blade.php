@extends('layout/plantilla')

@section('frecuencia')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js">
    <div class="container">
            <h1><center>Grafico de Barras</center></h1>

            <style>
       body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        canvas {
            margin-top: 50px;
        }
    </style>
    <div>
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Categoría 1', 'Categoría 2', 'Categoría 3', 'Categoría 4', 'Categoría 5'],
                    datasets: [{
                        label: 'Frecuencias',
                        data: [120, 90, 60, 30, 75],
                        fill: true,
                        borderColor: '#3498db',
                        borderWidth: 2,
                        pointRadius: 5,
                        pointBackgroundColor: '#3498db',
                        pointBorderColor: 'transparent',
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