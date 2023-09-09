<?php 
session_start();
include '../../setting/koneksi.php';
// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
    header("location:../../login/halaman_login.php");
}

$stat = $_SESSION['status'];
$kel = $_SESSION['username'];
// Ambil nilai filter dari parameter query string
// $kelurahanFilter = isset($_GET['kelurahan']) ? $_GET['kelurahan'] : 'all';
// $bulanFilter = isset($_GET['bulan']) ? $_GET['bulan'] : 'all';
// $tahunFilter = isset($_GET['tahun']) ? $_GET['tahun'] : 'all';
// $statusGiziFilter = isset($_GET['status_gizi']) ? $_GET['status_gizi'] : 'all';
// $jenisKelaminFilter = isset($_GET['jenis_kelamin']) ? $_GET['jenis_kelamin'] : 'all';

// Query untuk mengambil data gizi anak-anak berdasarkan filter

// if($stat !== 'kpm') {
//     $query = mysqli_query($konek, "SELECT status_gizi, COUNT(status_gizi) AS total FROM tb_gizi_anak");
// } else {
//     $query = mysqli_query($konek, "SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak GROUP BY b.status_gizi");
// }

// // $result = mysqli_query($konek,$query);

// $status = array();
// $jumlah = array();
// while ($row = mysqli_fetch_array($query)) {
//     $status[] = $row['status_gizi'];
//     $jumlah[] = $row['total'];
// }

// // Mengembalikan data dalam format JSON
// // $status = json_encode($status);
// $status = json_encode($status);
// $jumlah = json_encode($jumlah);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="../../img/logo_pemko_bjm2.png">

    <title>SIMPELPRES - Grafik Hasil Prediksi Stunting Anak</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body id="page-top">
    <div id="loading">
        <span class="loader"></span>
        <div class="textLoader">
            <center>
            <b>Please Wait ... </b>
            </center>
        </div>
    </div>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include '../../template/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include '../../template/header.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <section id="main-content">
                        <section class="wrapper">
                            <div class="mb-5">
                                <div class="row">
                                    <!-- form pencarian -->
                                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
                                        <div class="row">
                                            <div class="col" style="margin-top: 11px;">
                                                <p>Filter Kelurahan:</p>
                                                <select class="form-select form-select-sm select2" aria-label=".form-select-sm example" name="kelurahan" style="width:200px;">
                                                    <?php
                                                    include '../../setting/koneksi.php';
                                                    $kel = $_SESSION['username'];
                                                    $stat = $_SESSION['status'];
                                                    //query menampilkan nama unit kerja ke dalam combobox
                                                    if($stat !== 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT * FROM tb_kelurahan GROUP BY kelurahan ORDER BY kelurahan");
                                                    } else{
                                                        $query = mysqli_query($konek, "SELECT * FROM tb_kelurahan WHERE kelurahan='$kel'");
                                                    }
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <option value="<?=$data['kelurahan'];?>"><?php echo $data['kelurahan'];?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <p style="margin-top:10px;">Filter Tanggal Awal:</p>
                                                <input type="date" name="tgl_awal" id="tgl_awal" style="width: 200px;">
                                            </div>
                                            <div class="col">
                                                <p style="margin-top:10px;">Filter Sampai Tanggal:</p>
                                                <input type="date" name="tgl_akhir" id="tgl_akhir" style="width: 200px;">
                                            </div>
                                        </div>
                                        <!-- <div class="row mt-3">
                                            <div class="col">
                                                <p style="margin-top:10px;">Filter Hasil Prediksi:</p>
                                                <select class="form-select select2" name="hasil" id="hasil" style="width: 200px;">
                                                    <option >--Pilih Hasil Prediksi--</option>
                                                    <option value="Stunting">Stunting</option>
                                                    <option value="Tidak Stunting">Tidak Stunting</option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <button type="submit" class="btn btn-primary btn-sm mt-2" name="cari"><i class="fa fa fa-search"></i> Tampilkan</button>
                                        <a href="grafik_prediksi.php" class="btn btn-secondary btn-sm mt-2"><i class="fa fa fa-sync"></i> Refresh</a>
                                    </form>
                                    <!-- end form pencarian -->
                                </div>
                            </div>
                            <a href="../../cetak_laporan/cetak_laporan_grafik_prediksi.php" class="btn btn-warning btn-sm"><i class="fa fa fa-print"></i> Cetak</a>
                            <div class="card mb-4 mt-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold">Data Grafik Hasil Prediksi Stunting Anak</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Grafik -->
                                    <canvas id="chart"></canvas>
                                    <!-- <div id="chartContainer" style="height: 300px; width: 100%;"></div> -->
                                </div>
                            </div>
                        </section>
                    </section>

<?php include '../../template/footer.php'; ?>
<!-- Tautan ke file Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- grafik charts.js -->
    <script>
        // Mengonversi data JSON ke array JavaScript
        // Generate array warna latar belakang acak
        // var backgroundColors = [];
        // for (var i = 0; i < 5; i++) {
        //     var randomColor = "rgba(" + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", 0.5)";
        //     backgroundColors.push(randomColor);
        // }

        // Membuat grafik menggunakan Charts.js
        var ctx = document.getElementById("chart").getContext("2d");
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["TIDAK STUNTING","STUNTING"],
                datasets: [{
                    label: "HASIL PERBANDINGAN PREDIKSI STUNTING DAN TIDAK STUNTING PEREMPUAN",
                    data: [
                        <?php
                        if($stat !== 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $tgl_awal = $_POST['tgl_awal'];
                            $tgl_akhir = $_POST['tgl_akhir'];
                            $jumlah_buruk = mysqli_query($konek,"SELECT COUNT(*) as total FROM tb_prediksi WHERE hasil='Tidak Stunting' AND kelurahan='$kelurahan' AND tgl_input BETWEEN '$tgl_awal' AND '$tgl_akhir' AND jenis_kelamin='Perempuan'");
                        } else if($stat == 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $tgl_awal = $_POST['tgl_awal'];
                            $tgl_akhir = $_POST['tgl_akhir'];
                            $jumlah_buruk = mysqli_query($konek,"SELECT COUNT(*) as total FROM tb_prediksi WHERE hasil='Tidak Stunting' AND kelurahan='$kel' AND tgl_input BETWEEN '$tgl_awal' AND '$tgl_akhir' AND jenis_kelamin='Perempuan'");
                        } else if($stat !== 'kpm') {
                            $jumlah_buruk = mysqli_query($konek,"SELECT COUNT(*) as total FROM tb_prediksi WHERE hasil='Tidak Stunting' AND jenis_kelamin='Perempuan'");
                        } else if($stat == 'kpm') {
                            $jumlah_buruk = mysqli_query($konek,"SELECT COUNT(*) as total FROM tb_prediksi WHERE hasil='Tidak Stunting' AND jenis_kelamin='Perempuan' AND kelurahan='$kel'");
                        }
                        while($row_buruk = mysqli_fetch_array($jumlah_buruk)){
                            echo $row_buruk['total'];
                        }
                        ?>,
                        <?php
                        if($stat !== 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $tgl_awal = $_POST['tgl_awal'];
                            $tgl_akhir = $_POST['tgl_akhir'];
                            $jumlah_buruk = mysqli_query($konek,"SELECT COUNT(*) as total FROM tb_prediksi WHERE hasil='Stunting' AND jenis_kelamin='Perempuan' AND kelurahan='$kelurahan' AND tgl_input BETWEEN '$tgl_awal' AND '$tgl_akhir'");
                        } else if($stat == 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $tgl_awal = $_POST['tgl_awal'];
                            $tgl_akhir = $_POST['tgl_akhir'];
                            $jumlah_buruk = mysqli_query($konek,"SELECT COUNT(*) as total FROM tb_prediksi WHERE hasil='Stunting' AND jenis_kelamin='Perempuan' AND kelurahan='$kel' AND tgl_input BETWEEN '$tgl_awal' AND '$tgl_akhir'");
                        } else if($stat !== 'kpm') {
                            $jumlah_buruk = mysqli_query($konek,"SELECT COUNT(*) as total FROM tb_prediksi WHERE hasil='Stunting' AND jenis_kelamin='Perempuan'");
                        } else if($stat == 'kpm') {
                            $jumlah_buruk = mysqli_query($konek,"SELECT COUNT(*) as total FROM tb_prediksi WHERE hasil='Stunting' AND jenis_kelamin='Perempuan' AND kelurahan='$kel'");
                        }
                        while($row_buruk = mysqli_fetch_array($jumlah_buruk)){
                            echo $row_buruk['total'];
                        }
                        ?>
                    ],
                    backgroundColor:  [
                    'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)'
                        ],
                        borderWidth: 1
                    },
                    {
                    label: "HASIL PERBANDINGAN PREDIKSI STUNTING DAN TIDAK STUNTING LAKI-LAKI",
                    data: [
                        <?php
                        if($stat !== 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $tgl_awal = $_POST['tgl_awal'];
                            $tgl_akhir = $_POST['tgl_akhir'];
                            $jumlah_buruk = mysqli_query($konek,"SELECT COUNT(*) as total FROM tb_prediksi WHERE hasil='Tidak Stunting' AND kelurahan='$kelurahan' AND tgl_input BETWEEN '$tgl_awal' AND '$tgl_akhir' AND jenis_kelamin='Laki-laki'");
                        } else if($stat == 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $tgl_awal = $_POST['tgl_awal'];
                            $tgl_akhir = $_POST['tgl_akhir'];
                            $jumlah_buruk = mysqli_query($konek,"SELECT COUNT(*) as total FROM tb_prediksi WHERE hasil='Tidak Stunting' AND kelurahan='$kel' AND tgl_input BETWEEN '$tgl_awal' AND '$tgl_akhir' AND jenis_kelamin='Laki-laki'");
                        } else if($stat !== 'kpm') {
                            $jumlah_buruk = mysqli_query($konek,"SELECT COUNT(*) as total FROM tb_prediksi WHERE hasil='Tidak Stunting' AND jenis_kelamin='Laki-laki'");
                        } else if($stat == 'kpm') {
                            $jumlah_buruk = mysqli_query($konek,"SELECT COUNT(*) as total FROM tb_prediksi WHERE hasil='Tidak Stunting' AND jenis_kelamin='Laki-laki' AND kelurahan='$kel'");
                        }
                        while($row_buruk = mysqli_fetch_array($jumlah_buruk)){
                            echo $row_buruk['total'];
                        }
                        ?>,
                        <?php
                        if($stat !== 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $tgl_awal = $_POST['tgl_awal'];
                            $tgl_akhir = $_POST['tgl_akhir'];
                            $jumlah_buruk = mysqli_query($konek,"SELECT COUNT(*) as total FROM tb_prediksi WHERE hasil='Stunting' AND jenis_kelamin='Laki-laki' AND kelurahan='$kelurahan' AND tgl_input BETWEEN '$tgl_awal' AND '$tgl_akhir'");
                        } else if($stat == 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $tgl_awal = $_POST['tgl_awal'];
                            $tgl_akhir = $_POST['tgl_akhir'];
                            $jumlah_buruk = mysqli_query($konek,"SELECT COUNT(*) as total FROM tb_prediksi WHERE hasil='Stunting' AND jenis_kelamin='Laki-laki' AND kelurahan='$kel' AND tgl_input BETWEEN '$tgl_awal' AND '$tgl_akhir'");
                        } else if($stat !== 'kpm') {
                            $jumlah_buruk = mysqli_query($konek,"SELECT COUNT(*) as total FROM tb_prediksi WHERE hasil='Stunting' AND jenis_kelamin='Laki-laki'");
                        } else if($stat == 'kpm') {
                            $jumlah_buruk = mysqli_query($konek,"SELECT COUNT(*) as total FROM tb_prediksi WHERE hasil='Stunting' AND jenis_kelamin='Laki-laki' AND kelurahan='$kel'");
                        }
                        while($row_buruk = mysqli_fetch_array($jumlah_buruk)){
                            echo $row_buruk['total'];
                        }
                        ?>
                    ],
                    backgroundColor:  [
                    'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    }
                ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }
                }
            });
    </script>
