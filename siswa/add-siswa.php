<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}
 
require_once "../config.php";

$title = "Tambah Siswa - SMKN 2 Pekanbaru";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if ($dataUser['level'] != 1 ) {
    echo "<script>
       alert('Halaman Tidak Ditemukan..');
       window.location = 'siswa.php';
    </script>";
    exit;
}

$queryNis =  mysqli_query($koneksi, "SELECT max(nis) as maxnis FROM tbl_siswa");
$data = mysqli_fetch_array($queryNis);
$maxnis = $data["maxnis"];

$noUrut = (int) substr($maxnis,3, 3);
$noUrut++;
$maxnis = "NIS".sprintf("%03s", $noUrut);


?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Siswa</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="siswa.php">Siswa</a></li>
                <li class="breadcrumb-item active">Tambah Siswa</li>
            </ol>

            <form action="proses-siswa.php" method="POST" enctype="multipart/form-data">

                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Tambah Siswa</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3 row">
                                    <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                                    <label for="username" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                       <input type="text" class="form-control border-0 border-bottom ps-2" id="nis" name="nis" readonly value="<?= $maxnis ?>" required>
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
                                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                    <label for="kelas" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="kelas" id="kelas" class="form-select border-0 border-bottom" required>
                                            <option selected>--Pilih Kelas--</option>
                                            <option value="X" selected>X</option>
                                            <option value="XI" selected>XI</option>
                                            <option value="XII" selected>XII</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                    <label for="jurusan" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="jurusan" id="jurusan" class="form-select border-0 border-bottom" required>
                                            <option selected>--Pilih Jurusan--</option>
                                            <option value="Teknik Komputer Jaringan" selected>Teknik Komputer Jaringan</option>
                                            <option value="Rekayasa Perangkat Lunak" selected>Rekayasa Perangkat Lunak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <label for="Almat" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder="alamat siswa" required></textarea>
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