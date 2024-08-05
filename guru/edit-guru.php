<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}
 
require_once "../config.php";

$title = "Edit guru - SMKN 2 Pekanbaru";
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

$id = $_GET['id'];

$queryGuru = mysqli_query($koneksi, "SELECT * FROM tbl_guru WHERE id = $id");
$data = mysqli_fetch_array($queryGuru);




?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Guru</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="guru.php">Guru</a></li>
                <li class="breadcrumb-item active">Update guru</li>
            </ol>

            <form action="proses-guru.php" method="POST" enctype="multipart/form-data">
                
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-to-square"></i> Update guru</span>
                        <button type="submit" name="update" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Update</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <div class="mb-3 row">
                                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                                    <label for="username" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                       <input type="text" class="form-control border-0 border-bottom ps-2" pattern="[0-9]{18,}" title="minimal 18 angka" id="nip" name="nip" value="<?= $data['nip'] ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <label for="nama" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text"  class="form-control border-0 border-bottom" id="nama" name="nama"  value="<?= $data['nama'] ?>" required>
                                    </div>
                                </div>
                                
                                <div class="mb-3 row">
                                    <label for="telpon" class="col-sm-2 col-form-label">Telepon</label>
                                    <label for="telpon" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="tel"  class="form-control border-0 border-bottom" id="telpon" name="telpon"  pattern="[0-9]{5,}" title="minimal 5 angka" value="<?= $data['telpon'] ?>" required>
                                    </div>
                                </div>
                                
                                <div class="mb-3 row">
                                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                                    <label for="agama" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="agama" id="agama" class="form-select border-0 border-bottom" required>
                                        <?php
                                        $agama = ["Islam", "Kristen", "Katholik", "Hindu", "Budha" ];
                                        foreach ($agama as $rlg){ 
                                            if ($data['agama'] == $rlg) { ?>
                                                <option value="<?= $rlg ?>" selected><?= $rlg ?></option>
                                            <?php } else {  ?>
                                                <option value="<?= $rlg ?>" ><?= $rlg ?></option>
                                       <?php 
                                            }
                                        }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <label for="Alamat" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder="alamat guru" required><?= $data['alamat'] ?></textarea>
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