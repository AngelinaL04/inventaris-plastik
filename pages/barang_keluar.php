<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

include '../config/koneksi.php';

$barang = mysqli_query($koneksi,"SELECT * FROM barang ORDER BY nama_barang");

$data = mysqli_query($koneksi,"
SELECT bk.*, b.nama_barang
FROM barang_keluar bk
JOIN barang b ON bk.id_barang=b.id_barang
ORDER BY bk.id_keluar DESC
");

include '../templates/header.php';
include '../templates/navbar.php';
include '../templates/sidebar.php';
?>

<h3>Barang Keluar</h3>

<hr>

<form action="../proses/barang_keluar.php" method="POST">

<div class="row">

<div class="col-md-4">
<label>Barang</label>

<select name="id_barang" class="form-control" required>

<option value="">Pilih Barang</option>

<?php while($b=mysqli_fetch_assoc($barang)){ ?>

<option value="<?= $b['id_barang']; ?>">

<?= $b['nama_barang']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="col-md-2">

<label>Jumlah</label>

<input type="number"
name="jumlah"
class="form-control"
required>

</div>

<div class="col-md-3">

<label>Tanggal</label>

<input type="date"
name="tanggal"
class="form-control"
required>

</div>

<div class="col-md-3">

<label>Keterangan</label>

<input type="text"
name="keterangan"
class="form-control">

</div>

</div>

<br>

<button class="btn btn-danger">

Simpan

</button>

</form>

<hr>

<table class="table table-bordered">

<thead class="table-dark">

<tr>

<th>No</th>

<th>Barang</th>

<th>Jumlah</th>

<th>Tanggal</th>

<th>Keterangan</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

while($row=mysqli_fetch_assoc($data)){

?>

<tr>

<td><?= $no++ ?></td>

<td><?= $row['nama_barang'] ?></td>

<td><?= $row['jumlah'] ?></td>

<td><?= $row['tanggal'] ?></td>

<td><?= $row['keterangan'] ?></td>

</tr>

<?php } ?>

</tbody>

</table>

<?php
include '../templates/footer.php';
?>