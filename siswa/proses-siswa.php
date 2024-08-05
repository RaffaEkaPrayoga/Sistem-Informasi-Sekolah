<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}
 
require_once "../config.php";

$fungsi = new Fungsi();

    // jika tombol simpan di tekan
    if (isset($_POST['simpan'])){
        // ambil value elemen yang di posting
        $nis        = $_POST['nis'];
        $nama       = htmlspecialchars($_POST['nama']);
        $kelas      = $_POST["kelas"];
        $jurusan    = $_POST["jurusan"];
        $alamat     = htmlspecialchars($_POST['alamat']);
        $foto       = htmlspecialchars($_FILES['image']['name']);


        // upload  gambar
        if ($foto != null) {
            $url = "add-siswa.php";
            $foto = $fungsi->uploadimg($url);
        } else {
            $foto = 'default-user.png';
        }
        
 
        mysqli_query($koneksi, "INSERT INTO tbl_siswa VALUES( '$nis', '$nama', '$alamat', '$kelas', '$jurusan', '$foto')");

        echo "<script>
                alert('Data siswa berhasil di simpan');
                document.location.href='add-siswa.php';
             </script>";
        return;
    } elseif (isset($_POST['update'])) {
        $nis        = $_POST['nis'];
        $nama       = htmlspecialchars($_POST['nama']);
        $kelas      = $_POST["kelas"];
        $jurusan    = $_POST["jurusan"];
        $alamat     = htmlspecialchars($_POST['alamat']);
        $foto       = htmlspecialchars($_POST['fotoLama']);

        if ($_FILES ['image']['error'] === 4){
            $fotoSiswa = $foto;
        }else{
            $url ="siswa.php";
            $fotoSiswa = $fungsi->uploadimg($url);
            if ($foto != 'default-user.png') {
                @unlink('../asser/image' . $foto);
            }
        }
 
    mysqli_query($koneksi, "UPDATE tbl_siswa SET
                            nama    = '$nama',
                            kelas   = '$kelas',
                            jurusan = '$jurusan',
                            alamat  = '$alamat',                 
                            foto    = '$fotoSiswa'
                            WHERE NIS ='$nis'
                            ");     
                            
    echo "<script>
            alert('Data siswa berhasil di update..');
            document.location.href='siswa.php';
          </script>";
    return;                    
        
    }

?> 