@extends('layout.plantilla')

@section('frecuencia')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js">
    <div class="container">
        <h1><center>Grafico de Líneas con Polígono</center></h1>
        
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
                        labels: ['Evento 1', 'Evento 2', 'Evento 3', 'Evento 4', 'Evento 5'],
                        datasets: [{
                            label: 'Tiempo en horas',
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
