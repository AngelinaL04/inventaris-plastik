<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

include '../templates/header.php';
include '../templates/navbar.php';
include '../templates/sidebar.php';
?>

<h3>Tambah Barang</h3>

<hr>

<form action="../proses/tambah_barang.php" method="POST">

<div class="mb-3">
<label>Kode Barang</label>
<input type="text" name="kode_barang" class="form-control" required>
</div>

<div class="mb-3">
<label>Nama Barang</label>
<input type="text" name="nama_barang" class="form-control" required>
</div>

<div class="mb-3">
<label>Satuan</label>
<input type="text" name="satuan" class="form-control" required>
</div>

<div class="mb-3">
<label>Stok</label>
<input type="number" name="stok" class="form-control" required>
</div>

<button type="submit" class="btn btn-success">
Simpan
</button>

<a href="barang.php" class="btn btn-secondary">
Kembali
</a>

</form>

<?php
include '../templates/footer.php';
?>