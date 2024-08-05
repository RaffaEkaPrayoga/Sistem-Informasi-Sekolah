<?php

    session_start();

    if (!isset($_SESSION["ssLogin"])) {
        header("location:./auth/login.php");
        exit;
    }

    require_once "../config.php";

    $fungsi = new Fungsi;

    // jika tombol simpan di tekan
    if (isset($_POST['simpan'])){
        // ambil value elemen yang di posting
        $username   = trim(htmlspecialchars( $_POST['username']));
        $nama       = trim(htmlspecialchars( $_POST['nama']));
        $jabatan    = $_POST['jabatan'];
        $alamat     = trim(htmlspecialchars( $_POST['alamat']));
        $gambar     = trim(htmlspecialchars( $_FILES['image']['name']));
        $password   = 1234;
        $pass       = password_hash($password, PASSWORD_DEFAULT);
        $level      = 3;
 
 
        // CEK USERNAME
        $cekUsername = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$username'");
        if (mysqli_num_rows($cekUsername) > 0){
            header("location:add-user.php?msg=cancel");
            return;
        }

        // upload gambar
        if ($gambar != null){
            $url = 'add-user.php';
            $gambar = $fungsi->uploadimg($url);
        }else{
            $gambar = 'default-user.png';
        }


        mysqli_query($koneksi, "INSERT INTO tbl_user VALUES(null, '$username', '$pass', '$nama' , '$alamat', '$jabatan', '$gambar', $level) ");

        header("location: add-user.php?msg=added");
        return; 


    }

?>