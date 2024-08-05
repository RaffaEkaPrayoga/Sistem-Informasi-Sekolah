<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}
 
require_once "../config.php";

$title = "Tambah guru - SMKN 2 Pekanbaru";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if ($dataUser['level'] != 1 ) {
    echo "<script>
       alert('Halaman Tidak Ditemukan..');
       window.location = 'guru.php';
    </script>";
    exit;
}

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}else {
    $msg = "";
}

$alert = '';
if ($msg == 'cancel') {
    $alert = '<div class= "alert alert-warning alert-dismissible fade show" role="alert">
    <i class  ="fa-solid fa-xmark"></i>
    Tambah Guru gagal, NIP sudah ada..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if ($msg == 'notimage') {
    $alert = '<div class= "alert alert-warning alert-dismissible fade show" role="alert">
    <i class  ="fa-solid fa-xmark"></i>
    Tambah Guru gagal, file yang di upload bukan gambar..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if ($msg == 'oversize') {
    $alert = '<div class= "alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-triangle-exclamation"></i>
    Tambah guru gagal, maximal ukuran gambar 1 MB..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if ($msg == 'added') {
    $alert = '<div class= "alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i>
    Tambah guru berhasil..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}



?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Guru</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="guru.php">Guru</a></li>
                <li class="breadcrumb-item active">Tambah guru</li>
            </ol>

            <form action="proses-guru.php" method="POST" enctype="multipart/form-data">
                <?php if ($msg != '') {
                    echo $alert;
                }?>

                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Tambah guru</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3 row">
                                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                                    <label for="username" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                       <input type="text" class="form-control border-0 border-bottom ps-2" pattern="[0-9]{18,}" title="minimal 18 angka" id="nip" name="nip" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <label for="nama" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text"  class="form-control border-0 border-bottom" id="nama" name="nama" maxlength="20" required>
                                    </div>
                                </div>
                                
                                <div class="mb-3 row">
                                    <label for="telpon" class="col-sm-2 col-form-label">Telepon</label>
                                    <label for="telpon" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="tel"  class="form-control border-0 border-bottom" id="telpon" name="telpon"  pattern="[0-9]{5,}" title="minimal 5 angka" required>
                                    </div>
                                </div>
                                
                                <div class="mb-3 row">
                                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                                    <label for="agama" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="agama" id="agama" class="form-select border-0 border-bottom" required>
                                            <option selected>--Pilih Agama--</option>
                                            <option value="Islam" selected>Islam</option>
                                            <option value="Kristen" selected>Kristen</option>
                                            <option value="Katholik" selected>Katholik</option>
                                            <option value="Hindu" selected>Hindu</option>
                                            <option value="Budha" selected>Budha</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <label for="Alamat" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder="alamat guru" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center px-5"> 
                                <img src="../asset/image/default-user.png" alt="gambar user" class="mb-3" width="40%">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <small class="text-secondary">Pilih foto PNG, JPG, atau JPEG maximal 1 MB</small>
                                <small class="text-secondary">width = height</small>
                            </div>
                        </div>
                    </div>
                </div>
                    
            </form>
        </div>
    </main>


<?php

require_once "../template/footer.php";

?>