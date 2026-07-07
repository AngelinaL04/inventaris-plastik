<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

include '../config/koneksi.php';

$data = mysqli_query($koneksi, "SELECT * FROM barang");

include '../templates/header.php';
include '../templates/navbar.php';
include '../templates/sidebar.php';
?>

<h3>Data Barang</h3>

<hr>

<a href="tambah_barang.php" class="btn btn-primary mb-3">
    + Tambah Barang
</a>

<table class="table table-bordered table-striped">

    <thead class="table-dark">

        <tr>

            <th>No</th>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Stok</th>
            <th width="170">Aksi</th>

        </tr>

    </thead>

    <tbody>

<?php

$no=1;

while($row=mysqli_fetch_assoc($data)){

?>

<tr>

<td><?= $no++ ?></td>

<td><?= $row['kode_barang'] ?></td>

<td><?= $row['nama_barang'] ?></td>

<td><?= $row['satuan'] ?></td>

<td><?= $row['stok'] ?></td>

<td>

<a href="edit_barang.php?id=<?= $row['id_barang']; ?>" class="btn btn-warning btn-sm">
Edit
</a>

<a href="../proses/hapus_barang.php?id=<?= $row['id_barang']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus data ini?')">
Hapus
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

<?php
include '../templates/footer.php';
?>