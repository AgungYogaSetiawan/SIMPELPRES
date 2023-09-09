<?php
include '../../setting/koneksi.php';
$id = $_GET['id_hasil'];
session_start();
$q = mysqli_query($konek, "DELETE FROM tb_hasil WHERE id_hasil='$id'");
$_SESSION["sukses"] = 'Data Berhasil Dihapus';
header('Location: data_hasil.php');  
