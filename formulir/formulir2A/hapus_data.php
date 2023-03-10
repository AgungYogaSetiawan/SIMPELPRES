<?php
session_start();
include '../../setting/koneksi.php';
$id = $_GET['id_formulir_duaA'];
$q = mysqli_query($konek, "DELETE FROM tb_formulir2a WHERE id_formulir_duaA='$id'");
$_SESSION["sukses"] = 'Data Berhasil Dihapus';
header('Location: formulir2A.php');  