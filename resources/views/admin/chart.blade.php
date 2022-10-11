@extends('layouts.dashboard')
@section('content')


    <div>
        <canvas id="myChart"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = [
          
        ];
      
        const data = {
          labels: labels,
          datasets: [{
            label: 'Statistiche ordini ricevuti',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
          }]
        };
      
        const config = {
          type: 'line',
          data: data,
          options: {}
        };
      </script>

    <script>
        const myChart = new Chart(
        document.getElementById('myChart'),
        config
        );
  </script>
      

@endsection