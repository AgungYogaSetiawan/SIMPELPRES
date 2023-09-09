<?php
include '../../setting/koneksi.php';
$id = $_GET['id_gizi_anak'];
session_start();
$q = mysqli_query($konek, "DELETE FROM tb_gizi_anak WHERE id_gizi_anak='$id'");
$_SESSION["sukses"] = 'Data Berhasil Dihapus';
header('Location: data_gizi_anak.php');  
