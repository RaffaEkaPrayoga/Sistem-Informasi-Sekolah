<?php

    require_once "../config.php";

    $fungsi = new Fungsi();

    // jika tombol simpan di tekan
    if (isset($_POST['simpan'])){
        // ambil value elemen yang di posting
        $gambar     = trim(htmlspecialchars( $_FILES['image']['name']));
        $username   = trim(htmlspecialchars( $_POST['username']));
        $nama       = trim(htmlspecialchars( $_POST['nama']));
        $jabatan    = $_POST['jabatan'];
        $alamat     = trim(htmlspecialchars( $_POST['alamat']));
        $Pass       = trim(htmlspecialchars( $_POST['Pass']));
        $confPass   = trim(htmlspecialchars( $_POST['confPass']));
        $level      = 3;

        // upload gambar
        if ($gambar != null){
            $url = 'add-user.php';
            $gambar = $fungsi->uploadimg($url);
        }else{
            $gambar = 'default-user.png';
        }

        // CEK USERNAME
        $cekUsername = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$username'");
        if (mysqli_num_rows($cekUsername) > 0){
            header("location:login.php?msg=cancel");
            return;
        }

        // CEK PASSWORD
        if ($Pass != $confPass){
            header("location:login.php?msg=err1");
            exit;
        }

        $pass = password_hash($Pass, PASSWORD_DEFAULT);

        // Insert data pengguna baru
        mysqli_query($koneksi, "INSERT INTO tbl_user VALUES(null, '$username', '$pass', '$nama', '$alamat', '$jabatan', '$gambar', $level) ");
        header("location: login.php?msg=added");
        }

?>