<?php


session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}
 
require_once "../config.php";

$userLogin = $_SESSION['ssUser'];
$cekUser   = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$userLogin'");
$dataUser  = mysqli_fetch_assoc($cekUser);

if ($dataUser['level'] == 3 ) {
    echo "<script>
       alert('Halaman Tidak Ditemukan..');
       window.location = 'pelajaran.php';
    </script>";
    exit;
}

$id = $_GET["id"];

mysqli_query($koneksi, "DELETE FROM tbl_pelajaran WHERE id = $id");

header("location: pelajaran.php?msg=deleted");
?>