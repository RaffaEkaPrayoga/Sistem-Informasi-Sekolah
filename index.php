<?php

    session_start();

    if (!isset($_SESSION["ssLogin"])) {
        header("Location: auth/login.php");
        exit;
    }

    require_once "config.php";

    $title = "Dashboard - SMKN 2 Pekanbaru";
    require_once "template/header.php";
    require_once "template/navbar.php";
    require_once "template/sidebar.php";

    $querySiswa = mysqli_query($koneksi, "SELECT * FROM tbl_siswa");
    $jmlSiswa = mysqli_num_rows($querySiswa);

    $queryGuru = mysqli_query($koneksi, "SELECT * FROM tbl_guru");
    $jmlGuru = mysqli_num_rows($queryGuru);

    $lulusUjian = mysqli_query($koneksi, "SELECT * FROM tbl_ujian WHERE hasil_ujian = 'LULUS'");
    $jmlLulus = mysqli_num_rows($lulusUjian);

    $gagalUjian = mysqli_query($koneksi, "SELECT * FROM tbl_ujian WHERE hasil_ujian = 'GAGAL'");
    $jmlGagal = mysqli_num_rows($gagalUjian);

    $nis = array();
    $total = array();
    while ($data = mysqli_fetch_array($lulusUjian)) {
        $nis[] = $data['nis'];
        $total[] = $data['total_nilai'];
    }

?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Siswa</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link text-decoration-none" href="siswa/siswa.php"><?= $jmlSiswa . ' Orang' ?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Jumlah Guru</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link text-decoration-none" href="guru/guru.php"><?= $jmlGuru . ' Orang' ?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Jumlah Siswa Lulus Ujian</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link text-decoration-none" href="ujian/ujian.php"><?= $jmlLulus . ' Orang' ?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Jumlah Siswa Gagal Ujian</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link text-decoration-none" href="ujian/ujian.php"><?= $jmlGagal . ' Orang' ?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Rangking Siswa
                                        <button onclick="printChart()" class="btn btn-primary float-end"><i class="fa-solid fa-magnifying-glass"></i> Export to PDF</button>
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" height="70"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </main>

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
function printChart() {
    const myWindow = window.open("print-chart.php", "", "width=1000, height=400");
    }
</script>

    <?php
     require_once "template/footer.php";
    ?>