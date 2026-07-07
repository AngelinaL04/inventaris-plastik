<?php

include '../config/koneksi.php';

$id_barang  = $_POST['id_barang'];
$jumlah     = $_POST['jumlah'];
$tanggal    = $_POST['tanggal'];
$keterangan = $_POST['keterangan'];

// Simpan ke tabel barang_masuk
mysqli_query($koneksi, "
INSERT INTO barang_masuk
(id_barang, jumlah, tanggal, keterangan)
VALUES
('$id_barang','$jumlah','$tanggal','$keterangan')
");

// Update stok barang
mysqli_query($koneksi,"
UPDATE barang
SET stok = stok + $jumlah
WHERE id_barang='$id_barang'
");

header("Location: ../pages/barang_masuk.php");
exit;