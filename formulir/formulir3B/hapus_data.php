<?php
session_start();
include '../../setting/koneksi.php';
$id = $_GET['id_formulir_tigaB'];
$q = mysqli_query($konek, "DELETE FROM tb_formulir3b WHERE id_formulir_tigaB='$id'");
$_SESSION["sukses"] = 'Data Berhasil Dihapus';
header('Location: formulir3B.php');  