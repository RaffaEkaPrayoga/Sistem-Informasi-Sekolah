<?php
    session_start();
    if (isset($_SESSION["ssLogin"])) {
        header("location:../index.php");
        exit;
    }

    require_once "../config.php";
    $sekolah = mysqli_query($koneksi, "SELECT * FROM tbl_sekolah WHERE id = 1");
    $data = mysqli_fetch_array($sekolah);


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SMKN 2 Pekanbaru</title>
        <link href="<?= $main_url ?>asset/sb-admin/dist/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="icon" type="image/x-icon"  href="<?= $main_url ?>asset/image/logo.png">
        <style>
            .background{
                background-image: url("../asset/image/Background.jpg");
            }
            #login{
                background-color: rgba(255, 255, 255, 0.2);
            }
            #login .card-body form .form-floating.mb-3{
                color : green;
                opacity: 0.8 ;
            }
        </style>
    </head>
    <body class="background">
    <?php
    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        }else {
        $msg = "";
    }
    if ($msg == 'err1') {
        $alert = '<center><div class= "alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-circle-check"></i>
        Konfirmasi password salah, silahkan coba lagi..
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></center>';
    }
    if ($msg == 'cancel') {
        $alert = '<center><div class= "alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-circle-xmark"></i>
        Tidak bisa mendaftar, Username sudah ada..
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></center>';
    } 
    if ($msg == 'added') {
        $alert = '<center><div class= "alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-circle-check"></i>
        Berhasil di menambahkan akun..
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></center>';
    }?>
        <div id="layoutAuthentication" >
            <div id="layoutAuthentication_content" >
                <main>
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5" id="login">
                                    <div class="card-header"><h4 class="text-center font-weight-light my-4">Login - SMKN 2 Pekanbaru</h4></div>
                                    <div class="card-body">
                                    <?php
                                    if ($msg != '') {
                                        echo $alert;
                                    }
                                    ?>
                                    <form action="proses-login.php" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control text-success" id="username" name="username" type="text" pattern="[A-Za-z0-9]{3,}" title="minimal 3 karakter kombinasi huruf besar huruf kecil dan angka" placeholder="username" autocomplete="off" required  />
                                            <label for="usename">Username</label>
                                        </div>
                                        <div class="form-floating mb-3 ">
                                            <input class="form-control text-success" id="password" name="password" minlength="4" type="password" placeholder="Password" required />
                                            <label for="password">Password</label>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-dark text-success fw-bold col-12 rounded-pill my-2">Login</button>
                                    </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="text-dark small">
                                            <div class="small"><a data-bs-toggle = "modal" class="text-light text-decoration-none" href="#mdlRegister">Apakah belum punya akun? Klik ini dan daftar sekarang!!!</a></div>
                                            <div class="modal" tabindex="-1" id="mdlRegister">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 align="center" class="modal-title">Register</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card mb-3 border-0" style="max-width: 640px;">
                                                                    <div class="row g-0">
                                                                        <div class="col-md-8">
                                                                            <div class="card-header" style="margin-left: 145px">
                                                                                <span class="h5 mb-3 ps-3"><i class="fa-solid fa-square-plus float-start"></i> Mendaftar</span>
                                                                            </div>
                                                                            
                                                                            <div class="card-body">
                                                                                <form action="proses-register.php" method="POST" enctype="multipart/form-data">
                                                                                    <div class="mb-3 row" style="margin-left: 140px; margin-top: 15px;"> 
                                                                                        <img src="../asset/image/default-user.png" alt="gambar user" class="mb-1" width="40%">
                                                                                        <input type="file" name="image" class="form-control form-control-sm">
                                                                                        <small>Pilih foto PNG, JPG, atau JPEG maximal 1 mb</small>
                                                                                    </div>
                                                                                    <div class="mb-3 row">
                                                                                        <label for="username" class="col-sm-4 col-form-label">Username</label>
                                                                                        <label for="username" class="col-sm-2 col-form-label">:</label>
                                                                                        <div class="col-sm-10" style="margin-left: 140px; margin-top:-35px;">
                                                                                            <input type="text" pattern="[A-Za-z0-9]{3,}" title="minimal 3 karakter kombinasi huruf besar huruf kecil dan angka" class="form-control border-0 border-bottom" id="username" name="username" maxlength="20" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mb-3 row">
                                                                                        <label for="username" class="col-sm-4 col-form-label">Nama</label>
                                                                                        <label for="username" class="col-sm-2 col-form-label">:</label>
                                                                                        <div class="col-sm-10" style="margin-left: 140px; margin-top:-30px;">
                                                                                            <input type="text"  class="form-control border-0 border-bottom" id="nama" name="nama" maxlength="20" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mb-3 row">
                                                                                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                                                                                        <label for="password" class="col-sm-2 col-form-label">:</label>
                                                                                        <div class="col-sm-10" style="margin-left: 140px; margin-top:-30px;">
                                                                                            <input type="password"  class="form-control border-0 border-bottom" id="Pass" name="Pass" minlength="4" maxlength="20" placeholder="Masukkan password anda" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mb-3 row">
                                                                                        <label for="confPass" class="col-sm-4 form-label">Konfirmasi Password</label>
                                                                                        <label for="confPass" class="col-sm-2 col-form-label">:</label>
                                                                                        <div class="col-sm-10" style="margin-left: 140px; margin-top:-30px;">
                                                                                            <input type="password"  class="form-control border-0 border-bottom" id="confPass" name="confPass" placeholder="Ulangi password anda" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mb-3 row">
                                                                                        <label for="username" class="col-sm-4 col-form-label">Jabatan</label>
                                                                                        <label for="username" class="col-sm-2 col-form-label">:</label>
                                                                                        <div class="col-sm-10" style="margin-left: 140px; margin-top:-30px;">
                                                                                            <select name="jabatan" id="jabatan" class="form-select border-0 border-bottom" required>
                                                                                                <option value="" selected>--Pilih Jabatan--</option>
                                                                                                <option value="Kepsek" selected>Kepsek</option>
                                                                                                <option value="Staf TU" selected>Staf TU</option>
                                                                                                <option value="Guru" selected>Guru Mata Pelajaran</option>
                                                                                                <option value="Siswa" selected>Siswa</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mb-3 row">
                                                                                        <label for="username" class="col-sm-4 col-form-label">Alamat</label>
                                                                                        <label for="username" class="col-sm-2 col-form-label">:</label>
                                                                                        <div class="col-sm-10" style="margin-left: 140px; margin-top:-30px;">
                                                                                            <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder="domisili" required></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                                                                                    <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                                                                                </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                            </div>
                                        </div> 
                                        Copyright &copy; SMKN 2 Pekanbaru <?= date('Y'); ?>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?=  $main_url ?>asset/sb-admin/dist/js/scripts.js"></script>
    </body>
</html>
