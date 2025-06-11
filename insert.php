<?php
include 'koneksi.php';
if (isset($_POST)) {
    $nama = @$_POST['nama'];
    $ucapan = @$_POST['ucapan'];
    $keterangan = @$_POST['keterangan'];
    $sql = "INSERT INTO bukutamu (nama,ucapan,keterangan)VALUES ('$nama','$ucapan','$keterangan')";
    $connection->query($sql);
    header("Location:http://localhost:8080/tugas-undangan-vincmd/");
}
$SQL2 = "SELECT * FROM bukutamu";
$hasil = $connection->query($SQL2);
