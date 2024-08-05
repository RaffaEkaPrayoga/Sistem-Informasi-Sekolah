<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";
 
// jika tombol simpan di tekan
if (isset($_POST['simpan'])){
    // ambil value elemen yang di posting
    $curPass   = trim(htmlspecialchars( $_POST['curPass']));
    $newPass   = trim(htmlspecialchars( $_POST['newPass']));
    $confPass   = trim(htmlspecialchars( $_POST['confPass']));


    $userName = $_SESSION['ssUser'];
    $queryUser = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$userName'");
    $data = mysqli_fetch_array($queryUser);

    if ($newPass != $confPass){
        header("location:password.php?msg=err1");
        exit;
    }

    if (!password_verify($curPass, $data['password'])) {
        header("location:password.php?msg=err2");
    }else {
        $pass = password_hash($newPass, PASSWORD_DEFAULT);
        mysqli_query($koneksi, "UPDATE tbl_user SET password = '$pass' WHERE  username = '$userName'");
        header("location:password.php?msg=updated");
        exit;
    }
}  

?>