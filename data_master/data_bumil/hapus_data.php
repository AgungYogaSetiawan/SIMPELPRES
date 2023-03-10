<?php
include '../../setting/koneksi.php';
$id = $_GET['id_bumil'];
session_start();
$q = mysqli_query($konek, "DELETE FROM tb_bumil WHERE id_bumil='$id'");
$_SESSION["sukses"] = 'Data Berhasil Dihapus';
header('Location: data_bumil.php');  
