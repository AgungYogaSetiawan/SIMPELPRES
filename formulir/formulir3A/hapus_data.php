<?php
session_start();
include '../../setting/koneksi.php';
$id = $_GET['id_formulir_tigaA'];
$q = mysqli_query($konek, "DELETE FROM tb_formulir3a WHERE id_formulir_tigaA='$id'");
$_SESSION["sukses"] = 'Data Berhasil Dihapus';
header('Location: formulir3A.php'); 