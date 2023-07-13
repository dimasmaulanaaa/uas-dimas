@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>

        <div class="row">
            <div class="col-md-6">
                <canvas id="chartPendudukUmur" width="400" height="400"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="chartPendudukJenisKelamin" width="400" height="400"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctxPendudukUmur = document.getElementById('chartPendudukUmur').getContext('2d');
        var chartPendudukUmur = new Chart(ctxPendudukUmur, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($pendudukUmurLabels) !!},
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: {!! json_encode($pendudukUmurData) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        var ctxPendudukJenisKelamin = document.getElementById('chartPendudukJenisKelamin').getContext('2d');
        var chartPendudukJenisKelamin = new Chart(ctxPendudukJenisKelamin, {
            type: 'bar',
            data: {
                labels: {!! json_encode($pendudukJenisKelaminLabels) !!},
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: {!! json_encode($pendudukJenisKelaminData) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
    </script>
@endsection
