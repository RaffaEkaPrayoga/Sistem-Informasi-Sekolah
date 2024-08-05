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

if ($dataUser['level'] != 1 ) {
    echo "<script>
       alert('Halaman Tidak Ditemukan..');
       window.location = 'siswa.php';
    </script>";
    exit();
}

$id = $_GET['nis'];
$foto = $_GET['foto'];

mysqli_query($koneksi, "DELETE FROM tbl_siswa WHERE nis = '$id'");
if ($foto != 'default-user.png') {
    @unlink('../asset/image/' . $foto);
}

echo "<script>
        alert('Data siswa berhasil di hapus..');
        document.location.href='siswa.php';
    </script>";
return;
?>