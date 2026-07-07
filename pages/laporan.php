<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

include '../config/koneksi.php';

$barang = mysqli_query($koneksi, "SELECT * FROM barang");

$masuk = mysqli_query($koneksi,"
SELECT bm.*, b.nama_barang
FROM barang_masuk bm
JOIN barang b ON bm.id_barang=b.id_barang
ORDER BY bm.tanggal DESC
");

$keluar = mysqli_query($koneksi,"
SELECT bk.*, b.nama_barang
FROM barang_keluar bk
JOIN barang b ON bk.id_barang=b.id_barang
ORDER BY bk.tanggal DESC
");

include '../templates/header.php';
include '../templates/navbar.php';
include '../templates/sidebar.php';
?>

<h3>Laporan Inventaris</h3>

<hr>

<button onclick="window.print()" class="btn btn-success mb-3">
    Cetak Laporan
</button>

<h4>Data Barang</h4>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Stok</th>
        </tr>
    </thead>

    <tbody>

<?php while($b=mysqli_fetch_assoc($barang)){ ?>

<tr>
<td><?= $b['kode_barang']; ?></td>
<td><?= $b['nama_barang']; ?></td>
<td><?= $b['satuan']; ?></td>
<td><?= $b['stok']; ?></td>
</tr>

<?php } ?>

</tbody>

</table>

<hr>

<h4>Barang Masuk</h4>

<table class="table table-bordered">

<thead class="table-dark">

<tr>

<th>Tanggal</th>
<th>Barang</th>
<th>Jumlah</th>
<th>Keterangan</th>

</tr>

</thead>

<tbody>

<?php while($m=mysqli_fetch_assoc($masuk)){ ?>

<tr>

<td><?= $m['tanggal']; ?></td>
<td><?= $m['nama_barang']; ?></td>
<td><?= $m['jumlah']; ?></td>
<td><?= $m['keterangan']; ?></td>

</tr>

<?php } ?>

</tbody>

</table>

<hr>

<h4>Barang Keluar</h4>

<table class="table table-bordered">

<thead class="table-dark">

<tr>

<th>Tanggal</th>
<th>Barang</th>
<th>Jumlah</th>
<th>Keterangan</th>

</tr>

</thead>

<tbody>

<?php while($k=mysqli_fetch_assoc($keluar)){ ?>

<tr>

<td><?= $k['tanggal']; ?></td>
<td><?= $k['nama_barang']; ?></td>
<td><?= $k['jumlah']; ?></td>
<td><?= $k['keterangan']; ?></td>

</tr>

<?php } ?>

</tbody>

</table>

<?php
include '../templates/footer.php';
?>