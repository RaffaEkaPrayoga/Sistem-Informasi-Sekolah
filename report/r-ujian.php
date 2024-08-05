<?php
session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location: ../auth/login.php");
    exit();
}

try {
    $koneksi = new PDO('mysql:host=localhost;port=4306;dbname=db_sekolah', 'root', '');
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Koneksi gagal: ' . $e->getMessage());
}

$dataUjian = "SELECT * FROM tbl_ujian";
$result = $koneksi->query($dataUjian);

if ($result) {
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "Gagal Mengambil Data";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Hasil Ujian</title>
</head>
<body>
    <div style="text-align: center;">
        <h2 style="margin-bottom: -15px">Laporan Hasil Ujian</h2>
        <h2 style="margin-bottom: 15px">SMKN 2 Pekanbaru</h2>
    </div>
    <center>
        <table>
            <thead>
                <tr>
                    <td colspan="7" style="height: 5px;">
                        <hr style="margin-bottom: 2px; margin-left: -5px;" size="3" color="grey">
                    </td>
                </tr>
                <tr>
                    <th style="width: 70px;">No Ujian</th>
                    <th style="width: 70px;">NIS</th>
                    <th>Jurusan</th>
                    <th style="width: 110px;">Nilai Terendah</th>
                    <th style="width: 100px;">Nilai Tertinggi</th>
                    <th style="width: 100px;">Rata-Rata</th>
                    <th style="width: 100px;">Hasil Ujian</th>
                </tr>
                <tr>
                    <td colspan="7">
                        <hr style="margin-bottom: 2px; margin-top: 1px; margin-left: -5px;" size="3" color="grey">
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $row) { ?>
                    <tr>
                        <td><center><?= $row['no_ujian'] ?></center></td>
                        <td><center><?= $row['nis'] ?></center></td>
                        <td><center><?= $row['jurusan'] ?></center></td>
                        <td><center><?= $row['nilai_terendah'] ?></center></td>
                        <td><center><?= $row['nilai_tertinggi'] ?></center></td>
                        <td><center><?= $row['nilai_rata2'] ?></center></td>
                        <td><center><?= $row['hasil_ujian'] ?></center></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">
                        <hr style="margin-bottom: 1px; margin-bottom: 3px; margin-left: -5px;" size="3" color="grey">
                        <p>Pekanbaru, <?= date('j F Y') ?></p>
                        <p>Dibuat oleh <b>Raffa Eka Prayoga</b></p>
                    </td>
                </tr>
            </tfoot>
        </table>
    </center>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
