<?php

include '../config/koneksi.php';

$id = $_POST['id'];
$kode = $_POST['kode_barang'];
$nama = $_POST['nama_barang'];
$satuan = $_POST['satuan'];
$stok = $_POST['stok'];

mysqli_query($koneksi,"
UPDATE barang
SET
kode_barang='$kode',
nama_barang='$nama',
satuan='$satuan',
stok='$stok'
WHERE id_barang='$id'
");

header("Location: ../pages/barang.php");
exit;