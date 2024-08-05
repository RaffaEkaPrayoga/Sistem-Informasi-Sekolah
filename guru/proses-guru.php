<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}
 
require_once "../config.php";

$fungsi = new Fungsi;

    // jika tombol simpan di tekan
    if (isset($_POST['simpan'])){
        // ambil value elemen yang di posting
        $nip        = htmlspecialchars($_POST['nip']);
        $nama       = htmlspecialchars($_POST['nama']);
        $telpon     = htmlspecialchars($_POST['telpon']);
        $agama      = $_POST["agama"];
        $alamat     = htmlspecialchars($_POST['alamat']);
        $foto       = htmlspecialchars($_FILES['image']['name']);

 

        $cekNIP = mysqli_query($koneksi, "SELECT nip FROM tbl_guru WHERE nip = '$nip'");
        if (mysqli_num_rows($cekNIP) >  0){
            header('location: add-guru.php?msg=cancel');
            return;
        }

        // upload gambar
        if ($foto != null){
            $url = "add-guru.php";
            $foto = $fungsi->uploadimg($url);
        }else{
            $foto = 'default-user.png';
        }

        mysqli_query($koneksi, "INSERT INTO tbl_guru VALUES(null, '$nip', '$nama', '$alamat', '$telpon', '$agama', '$foto')");

        header("location: add-guru.php?msg=added");
        return;

        
    }
  
    if (isset($_POST['update'])) {
        $id         = $_POST['id'];
        $nip        = htmlspecialchars($_POST['nip']);
        $nama       = htmlspecialchars($_POST['nama']);
        $telpon     = htmlspecialchars($_POST['telpon']);
        $agama      = $_POST["agama"];
        $alamat     = htmlspecialchars($_POST['alamat']);
        $foto       = htmlspecialchars($_POST['fotoLama']);

        $sqlGuru = mysqli_query($koneksi, "SELECT * FROM tbl_guru WHERE id = $id");
        $data = mysqli_fetch_array($sqlGuru);
        $curNIP = $data['nip'];

        $newNIP =  mysqli_query($koneksi, "SELECT nip FROM tbl_guru WHERE nip = $nip");

        if ($nip != $curNIP) {
            if (mysqli_num_rows($newNIP) > 0) {
                header("location:guru.php?msg=cancel");
                return;
            }
        }


        if ($_FILES ['image']['error'] === 4){
            $fotoGuru = $foto;
        }else{
            $url ="guru.php";
            $fotoGuru = $fungsi->uploadimg($url);
            if ($foto != 'default-user.png') {
                @unlink('../asset/image' . $foto);
            }
        }
  
    mysqli_query($koneksi, "UPDATE tbl_guru SET
                            nip      = '$nip',
                            nama     = '$nama',
                            telpon   = '$telpon',
                            agama    = '$agama',
                            alamat   = '$alamat',                 
                            foto     = '$fotoGuru'
                            WHERE id ='$id'
                            ");     
                            
    header("location:guru.php?msg=updated");
    return;                
        
    }

?> 