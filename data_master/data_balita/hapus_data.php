<?php
include '../../setting/koneksi.php';
$id = $_GET['id_balita'];
session_start();
$q = mysqli_query($konek, "DELETE FROM tb_balita WHERE id_balita='$id'");
$_SESSION["sukses"] = 'Data Berhasil Dihapus';
header('Location: data_balita.php');  
