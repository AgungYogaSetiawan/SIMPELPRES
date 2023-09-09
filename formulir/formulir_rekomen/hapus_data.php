<?php
session_start();
include '../../setting/koneksi.php';
$id = $_GET['id'];
$id2 = $_GET['id2'];
$q = mysqli_query($konek, "DELETE FROM tb_intervensi WHERE id_intervensi='$id'");
$_SESSION["sukses"] = 'Data Berhasil Dihapus';
header('Location: formulir_rekomen.php');  