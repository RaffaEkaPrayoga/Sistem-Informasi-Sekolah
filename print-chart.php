<?php


session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "config.php";
$lulusUjian = mysqli_query($koneksi, "SELECT * FROM tbl_ujian WHERE hasil_ujian = 'LULUS'");
$nis = array();
$total = array();
while ($data = mysqli_fetch_array($lulusUjian)) {
    $nis[] = $data['nis'];
    $total[] = $data['total_nilai'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.</title>
</head>
<body>
    <div style="text-align: center;">
        <h2 style="margin-bottom: -15px">Laporan Perangkingan</h2>
        <h2 style="margin-bottom: 15px">SMKN 2 Pekanbaru </h2>
    </div>
        <div class="card-body"><canvas id="myBarChart" height="80"></canvas></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= json_encode($nis) ?>,
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: <?= json_encode($total) ?>,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 700,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
</script>
<script type="text/javascript">
    setTimeout(function(){
        window.print();
    },3000);
    </script>
</body>
</html>