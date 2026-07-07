<?php

include '../config/koneksi.php';

$kode = $_POST['kode_barang'];
$nama = $_POST['nama_barang'];
$satuan = $_POST['satuan'];
$stok = $_POST['stok'];

mysqli_query($koneksi,"
INSERT INTO barang
(kode_barang,nama_barang,satuan,stok)
VALUES
('$kode','$nama','$satuan','$stok')
");

header("Location: ../pages/barang.php");
exit;