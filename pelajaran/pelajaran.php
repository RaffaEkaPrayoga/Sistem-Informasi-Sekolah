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


if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}else {
    $msg = "";
}

if ($msg == 'cancel') {
    $alert = '<div class="alert alert-danger alert-dismissible" style="display: none;" id="cancel" role="alert">
    <i class="fa-solid fa-circle-xmark"></i>
    Tambah pelajaran gagal, Mata Pelajaran sudah ada..
    </div>';
}
if ($msg == 'cancelupdate') {
    $alert = '<div class="alert alert-danger alert-dismissible" style="display: none;" id="cancelupdate" role="alert">
    <i class="fa-solid fa-circle-xmark"></i>
    Update pelajaran gagal, Mata Pelajaran sudah ada..
    </div>';
}
if ($msg == 'added') {
    $alert = '<div class="alert alert-success alert-dismissible" style="display: none;" id="added" role="alert">
    <i class="fa-solid fa-circle-check"></i>
    Tambah Pelajaran berhasil..
    </div>';
}
if ($msg == 'deleted') {
    $alert = '<div class="alert alert-success alert-dismissible" style="display: none;" id="deleted" role="alert">
    <i class="fa-solid fa-circle-check"></i>
    Pelajaran berhasil dihapus..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if ($msg == 'updated') {
    $alert = '<div class="alert alert-success alert-dismissible" style="display: none;" id="updated" role="alert">
    <i class="fa-solid fa-circle-check"></i>
    Pelajaran berhasil di perbaharui..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Mata Pelajaran</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Mata Pelajaran</li>
            </ol>

            <?php if ($msg !== '') {
                    echo $alert;
                }?>

            <div class="row">

            <?php if ($dataUser['level'] != 3) { ?>

                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Tambah Pelajaran</span>
                        </div>
                            <div class="card-body">
                                <form action="proses-pelajaran.php" method="POST">
                                    <div class="mb-3 row">
                                        <label for="pelajaran" class="form-label ps-1">Pelajaran</label>
                                        <input type="text" class="form-control" id="pelajaran" name="pelajaran" placeholder="mata pelajaran" required>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="jurusan" class="form-label ps-1">Jurusan</label>
                                        <select name="jurusan" id="jurusan" class="form-select" required>
                                            <option value="" selected>--Pilih Jurusan--</option>
                                            <option value="Umum">Umum</option>
                                            <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="guru" class="col-form-label ps-1">guru</label>
                                        <select name="guru" id="guru" class="form-select border-0 border-bottom" required>
                                            <option selected>--Pilih Guru--</option>
                                            <?php
                                            $queryGuru = mysqli_query($koneksi, "SELECT *FROM tbl_guru");
                                            while ($dataGuru = mysqli_fetch_array($queryGuru)) { ?>
                                            <option value="<?= $dataGuru['nama'] ?>"><?= $dataGuru['nama'] ?></option>

                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                 <button type="submit" class="btn btn-primary" name="simpan"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                                 <button type="reset" class="btn btn-danger" name="reset"><i class="fa-solid fa-xmark"></i> Reset</button>
                            </form>
                        </div>
                    </div> 
                </div>

                <?php } ?>

                <div <?php if ($dataUser['level'] != 3) { ?> class="col-8 text-center"<?php } else if ($dataUser['level'] == 3) { ?> class="col-13 text-center"<?php } ?> >
                    <div class="card">
                        <div class="card-header">
                            <i class="fa-solid fa-list"></i> Data Pelajaran
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <form action="" method="GET" class="col-4">
                                    <?php
                                    if (@$_GET['cari']){
                                        $cari = @$_GET['cari'];
                                    }else{
                                        $cari = '';
                                    }
                                    ?>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="cari" placeholder="keyword" value="<?= $cari ?>">
                                        <button class="btn btn-secondary" type="submit" id="btnCari"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </form>

                                <?php
                                        $page = 5;
                                        if (isset($_GET['hal'])){
                                            $halaktif = $_GET['hal'];
                                        }else{
                                            $halaktif = 1;
                                        }

                                        if (@$_GET['cari']){
                                            $keyword = @$_GET['cari'];
                                        }else{
                                            $keyword = '';
                                        }
                                        
                                        $start = ($page * $halaktif) - $page; 
                                        $no = $start + 1;
                                        $queryPelajaran = mysqli_query($koneksi, "SELECT * FROM tbl_pelajaran WHERE pelajaran like '%$keyword%' or jurusan like '%$keyword%' or guru like '%$keyword%' limit $page offset $start");
                                        
                                        $queryJmlData = mysqli_query($koneksi, "SELECT * FROM tbl_pelajaran WHERE pelajaran like '%$keyword%' or jurusan like '%$keyword%' or guru like '%$keyword%'");
                                        $jmlData =  mysqli_num_rows($queryJmlData); 
                                        $pages = ceil( $jmlData / $page);                                   
                                        ?>

                                <div class="col-4 text-end">
                                    <label class="col-8 col-form-label text-end">Jumlah Data : <?= $jmlData ?></label>
                                </div>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col"><center>Mata Pelajaran</center></th>
                                        <th scope="col"><center>Jurusan</center></th>
                                        <th scope="col"><center>Guru</center></th>

                                        <?php if ($dataUser['level'] != 3) { ?>
                                        <th scope="col"><center>Operasi</center></th>
                                        <?php } ?>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(mysqli_num_rows($queryPelajaran) > 0){
                                            while ($data = mysqli_fetch_array($queryPelajaran)) { ?>
                                            <tr >
                                                <th scope="row"><center><?= $no++ ?></center></th>
                                                <td><center><?= $data['pelajaran'] ?></center></td>
                                                <td><center><?= $data['jurusan'] ?></center></td>
                                                <td><center><?= $data['guru'] ?></center></td>

                                                <?php if ($dataUser['level'] != 3) { ?>
                                                <td align="center">
                                                <a href="edit-pelajaran.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-warning" title="Update Pelajaran"><i class="fa-solid fa-pen" ></i> </a>
                                                <a onclick="hapus(<?= $data['id'] ?>)" class="btn btn-sm btn-danger" title="Hapus Pelajaran"><i class="fa-solid fa-trash" ></i> </a>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                      <?php  } 
                                      } else { ?>
                                      <tr>
                                        <td colspan="5" align="center">Tidak ada data</td>
                                      </tr>
                                    <?php } 
                                    ?>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <?php if ($halaktif > 1){ ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?hal=<?= $halaktif - 1 ?>&cari=<?= $keyword ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    <?php }
                                    for ($hal=1; $hal <= $pages ; $hal++){
                                        if ($hal == $halaktif){ ?>
                                            <li class="page-item active"><a class="page-link" href="?hal=<?= $hal ?>&cari=<?= $keyword ?>"><?= $hal ?></a></li>
                                        <?php } else {?>
                                        <li class="page-item"><a class="page-link" href="?hal=<?= $hal ?>&cari=<?= $keyword ?>"><?= $hal ?></a></li>
                                    <?php }
                                    }
                                    if ($halaktif < $pages) {?>
                                    <li class="page-item">
                                        <a class="page-link" href="?hal=<?= $halaktif + 1 ?>&cari=<?= $keyword ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>      
            </div>
        </div>   
    </main>

    <script>
           function hapus(hapus_id) {
                const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary mx-4',
                    cancelButton: 'btn btn-danger mx-4'
                },
                buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Apakah anda yakin?',
                text: "Data kamu nggak bisa kembali lagi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, menghapus !',
                cancelButtonText: 'Tidak, batal !',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                    'Hapus!',
                    'File kamu telah di hapus.',
                    'Sukses'
                    )
                    window.location=("../pelajaran/hapus-pelajaran.php?id="+hapus_id)
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Batal',
                    'File kamu masih aman :)',
                    'Error'
                    )
                }
                })
            }
        </script>

<script>
    $(document).ready(function() {

        setTimeout(function(){
            $('#added').fadeIn('slow');
            $('#cancel').fadeIn('slow');
            $('#deleted').fadeIn('slow');
        },300)
        setTimeout(function(){
            $('#added').fadeOut('slow');
            $('#cancel').fadeOut('slow');
            $('#deleted').fadeOut('slow');
        },3000)

        setTimeout(function() {
            $('#cancelupdate').fadeIn('slow');
        },500)
        setTimeout(function() {
            $('#cancelupdate').fadeOut('slow');
        },5000)

        setTimeout(function() {
            $('#updated').slideDown('700');
        },500)
        setTimeout(function() {
            $('#updated').slideUp('700');
        },5000)
    })
</script>

<?php
require_once "../template/footer.php";
?>