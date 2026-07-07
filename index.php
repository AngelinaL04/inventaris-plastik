<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include 'config/koneksi.php';

$totalBarang = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM barang"));

$totalMasuk = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM barang_masuk"));

$totalKeluar = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM barang_keluar"));

include 'templates/header.php';
include 'templates/navbar.php';
include 'templates/sidebar.php';
?>

<div class="container">

<h3>Dashboard</h3>

<hr>

<div class="row">

<div class="col-md-4">

<div class="card text-bg-primary">

<div class="card-body">

<h5>Total Barang</h5>

<h2><?= $totalBarang ?></h2>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card text-bg-success">

<div class="card-body">

<h5>Barang Masuk</h5>

<h2><?= $totalMasuk ?></h2>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card text-bg-danger">

<div class="card-body">

<h5>Barang Keluar</h5>

<h2><?= $totalKeluar ?></h2>

</div>

</div>

</div>

</div>

</div>

<?php
include 'templates/footer.php';
?>