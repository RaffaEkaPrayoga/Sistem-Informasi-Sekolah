<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:./auth/login.php");
    exit;
}
  
require_once "../config.php";

$fungsi = new Fungsi();

// jika tombol simpan di tekan
if (isset($_POST['simpan'])){
    // ambil value elemen yang di posting
    $id         =  $_POST['id'];
    $nama       = trim(htmlspecialchars( $_POST['nama']));
    $email      = trim(htmlspecialchars( $_POST['email']));
    $status     = $_POST['status'];
    $akreditasi = $_POST['akreditasi'];
    $alamat     = trim(htmlspecialchars( $_POST['alamat']));
    $visimisi   = trim(htmlspecialchars( $_POST['visimisi']));
    $gbr        = trim(htmlspecialchars( $_POST['gbrLama']));

    // cek dulu gambar yang di upload user
        if ($_FILES ['image']['error'] === 4){
            $gbrSekolah = $gbr ;
            
        }else{
            $url = 'proses-sekolah.php';
            $gbrSekolah = $fungsi->uploadimg($url);
            @unlink('../asset/image/' . $gbr );
        }

        mysqli_query($koneksi, "UPDATE tbl_sekolah SET 
                                                    nama ='$nama', 
                                                    email = '$email',  
                                                    status = '$status' , 
                                                    akreditasi = '$akreditasi', 
                                                    alamat = '$alamat', 
                                                    visimisi = '$visimisi', 
                                                    gambar = '$gbrSekolah' 
                                                    WHERE id= $id ");

        header("location: profile-sekolah.php?msg=updated");
        return; 
}
?>