<?php
session_start();
include '../config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");

if(mysqli_num_rows($query) > 0){

    $user = mysqli_fetch_assoc($query);

    if($password == $user['password']){

        $_SESSION['login'] = true;
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['nama'] = $user['nama'];

        header("Location: ../index.php");
        exit;

    }else{

        echo "<script>
                alert('Password Salah!');
                window.location='../login.php';
              </script>";

    }

}else{

    echo "<script>
            alert('Username Tidak Ditemukan!');
            window.location='../login.php';
          </script>";

}
?>