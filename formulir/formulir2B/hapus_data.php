<?php
session_start();
include '../../setting/koneksi.php';
$id = $_GET['id_formulir_duaB'];
$q = mysqli_query($konek, "DELETE FROM tb_formulir2b WHERE id_formulir_duaB='$id'");
$_SESSION["sukses"] = 'Data Berhasil Dihapus';
header('Location: formulir2B.php');  