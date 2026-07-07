<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi,"SELECT * FROM barang WHERE id_barang='$id'");
$row = mysqli_fetch_assoc($data);

include '../templates/header.php';
include '../templates/navbar.php';
include '../templates/sidebar.php';
?>

<h3>Edit Barang</h3>
<hr>

<form action="../proses/edit_barang.php" method="POST">

<input type="hidden" name="id" value="<?= $row['id_barang']; ?>">

<div class="mb-3">
<label>Kode Barang</label>
<input type="text" name="kode_barang" class="form-control" value="<?= $row['kode_barang']; ?>" required>
</div>

<div class="mb-3">
<label>Nama Barang</label>
<input type="text" name="nama_barang" class="form-control" value="<?= $row['nama_barang']; ?>" required>
</div>

<div class="mb-3">
<label>Satuan</label>
<input type="text" name="satuan" class="form-control" value="<?= $row['satuan']; ?>" required>
</div>

<div class="mb-3">
<label>Stok</label>
<input type="number" name="stok" class="form-control" value="<?= $row['stok']; ?>" required>
</div>

<button class="btn btn-success">
Update
</button>

<a href="barang.php" class="btn btn-secondary">
Kembali
</a>

</form>

<?php
include '../templates/footer.php';
?>