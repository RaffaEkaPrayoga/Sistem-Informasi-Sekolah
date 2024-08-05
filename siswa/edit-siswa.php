<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}
 
require_once "../config.php";

$title = "Update Siswa - SMKN 2 Pekanbaru";
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

$nis = $_GET['nis'];

$siswa = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE nis = '$nis'");
$data = mysqli_fetch_array($siswa);

?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Siswa</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="siswa.php">Siswa</a></li>
                <li class="breadcrumb-item active">Update Siswa</li>
            </ol>

            <form action="proses-siswa.php" method="POST" enctype="multipart/form-data">

            <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i> Update Siswa</span>
                    <button type="submit" name="update" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Update</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="mb-3 row">
                                <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                                <label for="username" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -50px;">
                                    <input type="text" class="form-control border-0 border-bottom ps-2" id="nis" name="nis" readonly value="<?= $nis ?>" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <label for="nama" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -50px;">
                                    <input type="text"  class="form-control border-0 border-bottom" id="nama" name="nama" maxlength="20" required value="<?= $data['nama'] ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                <label for="kelas" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -50px;">
                                    <select name="kelas" id="kelas" class="form-select border-0 border-bottom" required>
                                        <?php
                                        $kelas = ["X", "XI", "XII" ];
                                        foreach ($kelas as $kls){
                                            if ($data['kelas'] == $kls) { ?>
                                                <option value="<?= $kls; ?>"><?= $kls; ?></option>
                                            <?php } else {  ?>
                                                <option value="<?= $kls; ?>"><?= $kls; ?></option>
                                       <?php 
                                            } 
                                        }?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                    <label for="jurusan" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -50px;">
                                    <select name="jurusan" id="jurusan" class="form-select border-0 border-bottom" required>
                                        <?php
                                        $jurusan = ["Rekayasa Perangkat Lunak", "Teknik Komputer Jaringan"];

                                        foreach ($jurusan as $jrs){
                                            if ($data['jurusan'] == $jrs) { ?>
                                                <option value="<?= $jrs; ?>" selected><?= $jrs; ?></option>
                                            <?php } else {  ?>
                                                <option value="<?= $jrs; ?>"><?= $jrs; ?></option>
                                       <?php 
                                            }
                                        }?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <label for="Almat" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -50px;">
                                    <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder="alamat siswa" required><?= $data ["alamat"] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-center px-5"> 
                            <input type="hidden" name="fotoLama" value="<?= $data['foto'] ?>">
                            <img src="../asset/image/<?= $data['foto'] ?>" alt="gambar user" class="mb-3 rounded-circle" width="40%">
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