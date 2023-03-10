<?php
session_start();
extract($_POST);
include '../setting/koneksi.php';

if(isset($_POST['login'])){
    // $id = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($konek, $query);
    if (mysqli_num_rows($result)) {
        $status = $result->fetch_assoc();
        $_SESSION['id_user'] = true;
        $_SESSION['username'] = $status['username'];
        $_SESSION['status'] = $status['status'];
        header("Location:../dashboard.php");   
        exit;
    } else{
        echo "<script>
        location.href='halaman_login.php?error=salah';
        </script>";
    }
}



?>