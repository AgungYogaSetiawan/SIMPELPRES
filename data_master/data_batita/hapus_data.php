<?php
include '../../setting/koneksi.php';
$id = $_GET['id_baduta'];
session_start();
$q = mysqli_query($konek, "DELETE FROM tb_baduta WHERE id_baduta='$id'");
$_SESSION["sukses"] = 'Data Berhasil Dihapus';
header('Location: data_batita.php');  
