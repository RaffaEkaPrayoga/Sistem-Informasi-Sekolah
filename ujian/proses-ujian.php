<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";

    // jika tombol simpan di tekan
    if (isset($_POST['simpan'])){
        // ambil value elemen yang di posting
        $noUjian   = htmlspecialchars($_POST['noUjian']);
        $tgl       = htmlspecialchars($_POST['tgl']);
        $nis       = htmlspecialchars($_POST['nis']);
        $jurusan   = htmlspecialchars($_POST['jurusan']);
        $sum       = htmlspecialchars($_POST['sum']);
        $min       = htmlspecialchars($_POST['min']);
        $max       = htmlspecialchars($_POST['max']);
        $avg       = htmlspecialchars($_POST['avg']);
 
        if ($min < 50 or $avg < 60){
            $hasilUjian = "GAGAL";
        }else {
            $hasilUjian = "LULUS";
        }

        $mapel   = $_POST['mapel'];
        $jurus   = $_POST['jurus'];
        $nilai   = $_POST['nilai'];

        mysqli_query($koneksi, "INSERT INTO tbl_ujian VALUES('$noUjian', '$tgl', '$nis', '$jurusan', $sum, $min, $max, $avg, '$hasilUjian')");


        foreach ($mapel as $key => $mpl ){
            mysqli_query($koneksi, "INSERT INTO tbl_nilai_ujian VALUES(null, '$noUjian', '$mpl', '$jurus[$key]', $nilai[$key])");
        }

        header("location:nilai-ujian.php?msg=$hasilUjian&nis=$nis");
        return;

    }
 