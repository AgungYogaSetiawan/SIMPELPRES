<?php
session_start();
include '../../setting/koneksi.php';
$id = $_GET['id'];
$q = mysqli_query($konek, "DELETE FROM tb_progjer WHERE id_progjer='$id'");
$_SESSION["sukses"] = 'Data Berhasil Dihapus';
header('Location: formulir_progjer.php');  