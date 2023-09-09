<?php
include '../../setting/koneksi.php';
$id = $_GET['id'];
session_start();
$q = mysqli_query($konek, "DELETE FROM tb_user WHERE id_user='$id'");
$_SESSION["sukses"] = 'Data Berhasil Dihapus';
header('Location: data_akun.php');  
