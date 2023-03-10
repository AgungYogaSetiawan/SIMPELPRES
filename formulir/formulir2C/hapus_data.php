<?php
session_start();
include '../../setting/koneksi.php';
$id = $_GET['id_formulir_duaC'];
$q = mysqli_query($konek, "DELETE FROM tb_formulir2c WHERE id_formulir_duaC='$id'");
$_SESSION["sukses"] = 'Data Berhasil Dihapus';
header('Location: formulir2C.php');  