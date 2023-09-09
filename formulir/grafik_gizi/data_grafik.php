<?php
session_start();
include '../../setting/koneksi.php';
$stat = $_SESSION['status'];
$kel = $_SESSION['username'];
// Ambil nilai filter dari parameter query string
$kelurahanFilter = isset($_GET['kelurahan']) ? $_GET['kelurahan'] : 'all';
$bulanFilter = isset($_GET['bulan']) ? $_GET['bulan'] : 'all';
$tahunFilter = isset($_GET['tahun']) ? $_GET['tahun'] : 'all';
$statusGiziFilter = isset($_GET['status_gizi']) ? $_GET['status_gizi'] : 'all';
$jenisKelaminFilter = isset($_GET['jenis_kelamin']) ? $_GET['jenis_kelamin'] : 'all';

// Query untuk mengambil data gizi anak-anak berdasarkan filter
if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
  $query = "SELECT a.id_gizi_anak, COUNT(b.status_gizi) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak WHERE";
  if ($kelurahanFilter !== 'all') {
    $query .= " AND a.kelurahan = '$kelurahanFilter'";
  }
  if ($bulanFilter !== 'all') {
      $query .= " AND a.bulan = '$bulanFilter'";
  }
  if ($tahunFilter !== 'all') {
      $query .= " AND a.tahun = '$tahunFilter'";
  }
  if ($statusGiziFilter !== 'all') {
      $query .= " AND b.status_gizi = '$statusGiziFilter'";
  }
  if ($jenisKelaminFilter !== 'all') {
      $query .= " AND a.jk = '$jenisKelaminFilter'";
  }
} else {
  $query = "SELECT a.id_gizi_anak, COUNT(b.status_gizi) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak WHERE a.kelurahan='$kel'";
  if ($bulanFilter !== 'all') {
      $query .= " AND a.bulan = '$bulanFilter'";
  }
  if ($tahunFilter !== 'all') {
      $query .= " AND a.tahun = '$tahunFilter'";
  }
  if ($statusGiziFilter !== 'all') {
      $query .= " AND b.status_gizi = '$statusGiziFilter'";
  }
  if ($jenisKelaminFilter !== 'all') {
      $query .= " AND a.jk = '$jenisKelaminFilter'";
  }
}

$query .= " GROUP BY b.status_gizi";

$result = mysqli_query($konek,$query);

// Format data menjadi array yang sesuai dengan format yang dibutuhkan oleh Chart.js
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Mengembalikan data dalam format JSON
echo json_encode($data);

// Tutup koneksi
$konek->close();