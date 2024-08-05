<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Siswa - SMKN 2 Pekanbaru";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Siswa</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Siswa</li>
            </ol>

        <div class="card">
            <div class="card-header">
            <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Siswa</span>

            <?php if ($dataUser['level'] == 1) { ?>
            <a href="<?= $main_url ?>siswa/add-siswa.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah Siswa</a>
            <?php } ?>

            </div>
            <div class="card-body">
                <table class="table table-hover" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col"><center>Foto</center></th>
                            <th scope="col"><center>Nis</center></th>
                            <th scope="col"><center>Nama</center></th>
                            <th scope="col"><center>Kelas</center></th>
                            <th scope="col"><center>Jurusan</center></th>
                            <th scope="col"><center>Alamat</center></th>

                            <?php if ($dataUser['level'] == 1) { ?>
                            <th scope="col"><center>Operasi</center></th>
                            <?php } ?>

                        </tr>
                    </thead>
                    <tbody>
                        <tr >
                            <?php
                            $no = 1;
                            $querySiswa = mysqli_query($koneksi, "SELECT * FROM tbl_siswa");
                            while ($data = mysqli_fetch_array($querySiswa)) { ?>

                            <th scope"row"><center><?= $no++ ?></center></th>
                            <td><center><img src="../asset/image/<?= $data['foto'] ?>" class="rounded-circle" alt="foto siswa" width="60px" ></center></td>
                            <td><center><?= $data['nis'] ?></center></td>
                            <td><center><?= $data['nama'] ?></center></td>
                            <td><center><?= $data['kelas'] ?></center></td>
                            <td><center><?= $data['jurusan'] ?></center></td>
                            <td><center><?= $data['alamat'] ?></center></td>
                            
                            <?php if ($dataUser['level'] == 1) { ?>
                             <td>
                                <center>
                                    <a href="edit-siswa.php?nis=<?= $data['nis'] ?>" class="btn btn-warning" title="Update Siswa"><i class="fa-solid fa-pen" ></i> </a>
                                    <a href="hapus-siswa.php?nis=<?= $data['nis'] ?>&foto=<?= $data['foto'] ?>" class="btn btn-danger" title="Hapus Siswa" onclick="return confirm('Anda yakin akan menghapus data ini ?')"><i class="fa-solid fa-trash" ></i> </a>
                                </center>
                            </td >
                            <?php } ?>
                            
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div> 
    </main>


<?php
require_once "../template/footer.php";
?>