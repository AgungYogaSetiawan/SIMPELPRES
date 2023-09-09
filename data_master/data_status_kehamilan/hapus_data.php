<?php
include '../../setting/koneksi.php';
$id = $_GET['id_status_kehamilan'];
session_start();
$q = mysqli_query($konek, "DELETE FROM tb_status_kehamilan WHERE id_status_kehamilan='$id'");
$_SESSION["sukses"] = 'Data Berhasil Dihapus';
header('Location: data_status_hamil.php');  
