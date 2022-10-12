@extends('layouts.dashboard')
@section('content')


    <div>
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const labels = <?php echo json_encode(array_reverse($time_stamp));?>
      
        const data = {
          labels: labels,
          datasets: [
            {
                label: 'Statistiche ordini ricevuti',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: <?php echo json_encode($orders);?>,
            },
            {
                label: 'Statistiche entrate ricevute',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: <?php echo json_encode($revenues);?>,
            }
        ]

        };
      
        const config = {
          type: 'bar',
          data: data,
          options: {}
        };
      
        const myChart = new Chart(
        document.getElementById('myChart'),
        config
        );
    </script>
@endsection