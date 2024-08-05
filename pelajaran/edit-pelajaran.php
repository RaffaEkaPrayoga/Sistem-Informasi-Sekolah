<?php


session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";

$title = "Mata Pelajaran - SMKN 2 Pekanbaru";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if ($dataUser['level'] == 3 ) {
    echo "<script>
       alert('Halaman Tidak Ditemukan..');
       window.location = 'pelajaran.php';
    </script>";
    exit;
}

$id = $_GET['id'];
$queryPelajaran = mysqli_query($koneksi, "SELECT * FROM tbl_pelajaran WHERE id = $id");
$data = mysqli_fetch_array($queryPelajaran);

?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update - Mata Pelajaran</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="pelajaran.php">Back</a></li>
            </ol>

            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                                <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i> Edit Pelajaran</span>
                            </div>
                            <div class="card-body">
                                <form action="proses-pelajaran.php" method="POST">
                                    <input type="number" name="id" value="<?= $id ?>" hidden>
                                    <div class="mb-3 row">
                                        <label for="pelajaran" class="form-label ps-1">Pelajaran</label>
                                        <input type="text" class="form-control" id="pelajaran" name="pelajaran" placeholder="mata pelajaran" value="<?= $data ['pelajaran'] ?>">
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="jurusan" class="form-label ps-1">Jurusan</label>
                                        <select name="jurusan" id="jurusan" class="form-select" required>
                                        <?php
                                        $jurusan = ["Umum", "Teknik Komputer Jaringan", "Rekayasa Perangkat Lunak" ];
                                        foreach ($jurusan as $jrs){ 
                                            if ($data['jurusan'] == $jrs) { ?>
                                                <option value="<?= $jrs ?>" selected><?= $jrs ?></option>
                                            <?php } else {  ?>
                                               <option value="<?= $jrs ?>" ><?= $jrs ?></option>
                                       <?php 
                                            }
                                        }?>
                                        </select>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="guru" class="col-form-label ps-1">guru</label>
                                        <select name="guru" id="guru" class="form-select border-0 border-bottom" required>
                                            <?php
                                            $queryGuru = mysqli_query($koneksi, "SELECT * FROM tbl_guru");
                                            while ($dataGuru = mysqli_fetch_array($queryGuru)) {
                                            if ($data['guru'] ==  $dataGuru['nama'] ) { ?>
                                                <option value="<?= $dataGuru['nama'] ?>" selected><?= $dataGuru['nama'] ?></option>
                                            <?php } else {  ?>
                                                <option value="<?= $dataGuru['nama'] ?>"><?= $dataGuru['nama'] ?></option>
                                             <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="update"><i class="fa-solid fa-pen"></i> Update</button>
                                    <a href="pelajaran.php" class="btn btn-danger" ><i class="fa-solid fa-xmark"></i> Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                <div class="col-8 text-center">
                    <div class="card">
                       <div class="card-header">
                            <i class="fa-solid fa-list"></i> Data Pelajaran
                        </div>
                        <div class="card-body">
                            <table class="table table-hover" id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col"><center>Mata Pelajaran</center></th>
                                        <th scope="col"><center>Jurusan</center></th>
                                        <th scope="col"><center>Guru</center></th>
                                        <th scope="col"><center>Operasi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php
                                        $no = 1;
                                    ?>
                                    <tr >
                                        <th scope="row"><center><?= $no ?></center></th>
                                        <td><center><?= $data['pelajaran'] ?></center></td>
                                        <td><center><?= $data['jurusan'] ?></center></td>
                                        <td><center><?= $data['guru'] ?></center></td>
                                        <td align="center">
                                            <button type="button" class="btn btn-sm btn-warning rounded-0 col-11">Updating..</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>       
                        </div>
                    </div>
                </div>      
            </div>
        </div>   
    </main>


<?php
require_once "../template/footer.php";
?>