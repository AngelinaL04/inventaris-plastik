<?php

include '../config/koneksi.php';

$id_barang=$_POST['id_barang'];
$jumlah=$_POST['jumlah'];
$tanggal=$_POST['tanggal'];
$keterangan=$_POST['keterangan'];

$data=mysqli_query($koneksi,"SELECT stok FROM barang WHERE id_barang='$id_barang'");

$row=mysqli_fetch_assoc($data);

if($jumlah>$row['stok']){

echo "<script>

alert('Stok Tidak Mencukupi!');

window.location='../pages/barang_keluar.php';

</script>";

exit;

}

mysqli_query($koneksi,"
INSERT INTO barang_keluar
(id_barang,jumlah,tanggal,keterangan)
VALUES
('$id_barang','$jumlah','$tanggal','$keterangan')
");

mysqli_query($koneksi,"
UPDATE barang
SET stok=stok-$jumlah
WHERE id_barang='$id_barang'
");

header("Location: ../pages/barang_keluar.php");