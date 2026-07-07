<?php

$host = "sql310.infinityfree.com";
$user = "if0_42346948";
$pass = "uaspkpl2026";
$db   = "if0_42346948_inventaris";
$port = 3306;

$koneksi = mysqli_connect($host, $user, $pass, $db, $port);

if (!$koneksi) {
    die("Koneksi gagal : " . mysqli_connect_error());
}