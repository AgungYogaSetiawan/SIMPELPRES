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

    <title>SIMPELPRES - Grafik Status Gizi Anak</title>

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
                                                <select class="form-select form-select-sm select2" aria-label="form-select-sm example" name="kelurahan" id="kelurahan" style="width:200px;">
                                                    <?php if($_SESSION['status']=='pegawai') {?>
                                                    <?php
                                                    }
                                                    ?>
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
                                                <p style="margin-top:10px;">Filter Bulan:</p>
                                                <select class="form-select select2" name="bln" id="bln" style="width: 200px;">
                                                    <option >--Pilih Bulan--</option>
                                                    <option value="1">Januari</option>
                                                    <option value="2">Februari</option>
                                                    <option value="3">Maret</option>
                                                    <option value="4">April</option>
                                                    <option value="5">Mei</option>
                                                    <option value="6">Juni</option>
                                                    <option value="7">Juli</option>
                                                    <option value="8">Agustus</option>
                                                    <option value="9">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <p style="margin-top:10px;">Filter Tahun:</p>
                                                <select class="select2" name="tahun" id="tahun" style="width: 193px;">
                                                <option >--Pilih Tahun--</option
                                                <?php
                                                for ($x = 2015; $x <= 2040; $x++) {
                                                ?>
                                                <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                                <?php
                                                }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- <div class="col" style="margin-top: 11px;">
                                                <p style="margin-top:10px;">Filter Status Gizi:</p>
                                                <select class="form-select form-select-sm select2" aria-label="form-select-sm example" style="width:193px;" name="filter-status" id="filter-status">
                                                    <option >--Pilih Status Gizi--</option>
                                                    <option value="STUNTING">Stunting</option>
                                                    <option value="NORMAL">Normal</option>
                                                    <option value="BURUK">Buruk</option>
                                                    <option value="KURANG">Kurang</option>
                                                </select>
                                            </div> -->
                                            <!-- <div class="col" style="margin-top: 11px;">
                                                <p style="margin-top:10px;">Filter Jenis Kelamin:</p>
                                                <select class="form-select form-select-sm select2" aria-label="form-select-sm example" style="width:193px;" name="filter-jk" id="filter-jk">
                                                    <option >--Pilih Jenis Kelamin--</option>
                                                    <option value="P">Perempuan</option>
                                                    <option value="L">Laki-laki</option>
                                                </select>
                                            </div> -->
                                            <div class="col" style="margin-top: 11px;">
                                                <input type="hidden">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm mt-2" name="cari"><i class="fa fa fa-search"></i> Tampilkan</button>
                                        <a href="grafik_gizi.php" class="btn btn-secondary btn-sm mt-2"><i class="fa fa fa-sync"></i> Refresh</a>
                                    </form>
                                    <!-- end form pencarian -->
                                </div>
                            </div>
                            <a href="../../cetak_laporan/cetak_laporan_grafik_status.php" class="btn btn-warning btn-sm"><i class="fa fa fa-print"></i> Cetak</a>
                            <div class="card mb-4 mt-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold">Data Grafik Status Gizi Anak</h6>
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
<!-- script grafik dengan filter charts.js -->
<!-- <script>
    // Fungsi untuk mengambil data dari file PHP
    function fetchData(kelurahanFilter, bulanFilter, tahunFilter, statusGiziFilter, jenisKelaminFilter) {
        var url = 'data_grafik.php?';
        if (kelurahanFilter !== 'all') {
            url += 'kelurahan=' + kelurahanFilter + '&';
        }
        if (bulanFilter !== 'all') {
            url += 'bulan=' + bulanFilter + '&';
        }
        if (tahunFilter !== 'all') {
            url += 'tahun=' + tahunFilter + '&';
        }
        if (statusGiziFilter !== 'all') {
            url += 'status_gizi=' + statusGiziFilter + '&';
        }
        if (jenisKelaminFilter !== 'all') {
            url += 'jenis_kelamin=' + jenisKelaminFilter + '&';
        }

        fetch(url)
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                // Panggil fungsi untuk membangun grafik
                buildChart(data);
            })
            .catch(function(error) {
                console.log('Error:', error);
            });
    }

    // Fungsi untuk membangun grafik menggunakan data yang diterima
    function buildChart(data) {
        var ctx = document.getElementById('chart').getContext('2d');

        // Ambil status gizi dan jumlah anak-anak dari data
        var statusGizi = data.map(function(item) {
            return item.status_gizi;
        });
        var counts = data.map(function(item) {
            return item.total;
        });

        // Hapus chart sebelumnya jika ada
        if (window.chartInstance) {
            window.chartInstance.destroy();
        }

        // Konfigurasi grafik
        var config = {
            type: 'bar',
            data: {
                labels: statusGizi,
                datasets: [{
                    label: 'Jumlah Anak-anak',
                    data: counts,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        };

        // Buat grafik baru menggunakan konfigurasi yang diberikan
        window.chartInstance = new Chart(ctx, config);
    }

    // Inisialisasi grafik dengan filter "all" (semua data)
    fetchData('all', 'all', 'all', 'all', 'all');

    // Tambahkan event listener pada elemen filter
    var kelurahanFilterSelect = document.getElementById('kelurahan');
    kelurahanFilterSelect.addEventListener('change', function() {
        var kelurahanFilter = kelurahanFilterSelect.value;
        var bulanFilter = document.getElementById('bln').value;
        var tahunFilter = document.getElementById('tahun').value;
        var statusGiziFilter = document.getElementById('status-gizi-filter').value;
        var jenisKelaminFilter = document.getElementById('filter-jk').value;
        fetchData(kelurahanFilter, bulanFilter, tahunFilter, statusGiziFilter, jenisKelaminFilter);
    });

    var bulanFilterSelect = document.getElementById('bln');
    bulanFilterSelect.addEventListener('change', function() {
        var kelurahanFilter = document.getElementById('kelurahan').value;
        var bulanFilter = bulanFilterSelect.value;
        var tahunFilter = document.getElementById('tahun').value;
        var statusGiziFilter = document.getElementById('filter-status').value;
        var jenisKelaminFilter = document.getElementById('filter-jk').value;
        fetchData(kelurahanFilter, bulanFilter, tahunFilter, statusGiziFilter, jenisKelaminFilter);
    });

    var tahunFilterSelect = document.getElementById('tahun');
    tahunFilterSelect.addEventListener('change', function() {
        var kelurahanFilter = document.getElementById('kelurahan').value;
        var bulanFilter = document.getElementById('bln').value;
        var tahunFilter = tahunFilterSelect.value;
        var statusGiziFilter = document.getElementById('filter-status').value;
        var jenisKelaminFilter = document.getElementById('filter-jk').value;
        fetchData(kelurahanFilter, bulanFilter, tahunFilter, statusGiziFilter, jenisKelaminFilter);
    });

    var statusGiziFilterSelect = document.getElementById('filter-status');
    statusGiziFilterSelect.addEventListener('change', function() {
        var kelurahanFilter = document.getElementById('kelurahan').value;
        var bulanFilter = document.getElementById('bln').value;
        var tahunFilter = document.getElementById('tahun').value;
        var statusGiziFilter = statusGiziFilterSelect.value;
        var jenisKelaminFilter = document.getElementById('filter-jk').value;
        fetchData(kelurahanFilter, bulanFilter, tahunFilter, statusGiziFilter, jenisKelaminFilter);
    });

    var jenisKelaminFilterSelect = document.getElementById('filter-jk');
    jenisKelaminFilterSelect.addEventListener('change', function() {
        var kelurahanFilter = document.getElementById('kelurahan').value;
        var bulanFilter = document.getElementById('bln').value;
        var tahunFilter = document.getElementById('tahun').value;
        var statusGiziFilter = document.getElementById('filter-status').value;
        var jenisKelaminFilter = jenisKelaminFilterSelect.value;
        fetchData(kelurahanFilter, bulanFilter, tahunFilter, statusGiziFilter, jenisKelaminFilter);
    });
</script>    -->
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
                labels: ["BURUK","KURANG","STUNTING","NORMAL"],
                datasets: [{
                    label: "Status Gizi Anak Perempuan",
                    data: [
                        <?php
                        if($stat !== 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $bulan = $_POST['bln'];
                            $tahun = $_POST['tahun'];
                            // $jk = $_POST['filter-jk'];
                            $jumlah_buruk = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='BURUK' AND a.kelurahan='$kelurahan' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat == 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $bulan = $_POST['bln'];
                            $tahun = $_POST['tahun'];
                            // $jk = $_POST['filter-jk'];
                            $jumlah_buruk = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='BURUK' AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat !== 'kpm') {
                            $jumlah_buruk = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='BURUK' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat == 'kpm') {
                            $jumlah_buruk = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='BURUK' AND a.jk='P' AND a.kelurahan='$kel' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        }
                        while($row_buruk = mysqli_fetch_array($jumlah_buruk)){
                            echo $row_buruk['total'];
                        }
                        ?>,
                        <?php
                        if($stat !== 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $bulan = $_POST['bln'];
                            $tahun = $_POST['tahun'];
                            // $jk = $_POST['filter-jk'];
                            $jumlah_kurang = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='KURANG' AND a.kelurahan='$kelurahan' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat == 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $bulan = $_POST['bln'];
                            $tahun = $_POST['tahun'];
                            // $jk = $_POST['filter-jk'];
                            $jumlah_kurang = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='KURANG' AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat !== 'kpm') {
                            $jumlah_kurang = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='KURANG' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat == 'kpm') {
                            $jumlah_kurang = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='KURANG' AND a.jk='P' AND a.kelurahan='$kel' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        }
                        while($row_kurang = mysqli_fetch_array($jumlah_kurang)){
                            echo $row_kurang['total'];
                        }
                        ?>,
                        <?php
                        if($stat !== 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $bulan = $_POST['bln'];
                            $tahun = $_POST['tahun'];
                            // $jk = $_POST['filter-jk'];
                            $jumlah_stunting = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='STUNTING' AND a.kelurahan='$kelurahan' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat == 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $bulan = $_POST['bln'];
                            $tahun = $_POST['tahun'];
                            // $jk = $_POST['filter-jk'];
                            $jumlah_stunting = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='STUNTING' AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat !== 'kpm') {
                            $jumlah_stunting = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='STUNTING' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat == 'kpm') {
                            $jumlah_stunting = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='STUNTING' AND a.jk='P' AND a.kelurahan='$kel' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        }
                        while($row_stunting = mysqli_fetch_array($jumlah_stunting)){
                            echo $row_stunting['total'];
                        }
                        ?>,
                        <?php
                        if($stat !== 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $bulan = $_POST['bln'];
                            $tahun = $_POST['tahun'];
                            // $jk = $_POST['filter-jk'];
                            $jumlah_normal = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='NORMAL' AND a.kelurahan='$kelurahan' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat == 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $bulan = $_POST['bln'];
                            $tahun = $_POST['tahun'];
                            // $jk = $_POST['filter-jk'];
                            $jumlah_normal = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='NORMAL' AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat !== 'kpm') {
                            $jumlah_normal = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='NORMAL' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat == 'kpm') {
                            $jumlah_normal = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='NORMAL' AND a.jk='P' AND a.kelurahan='$kel' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        }
                        while($row_normal = mysqli_fetch_array($jumlah_normal)){
                            echo $row_normal['total'];
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
                    label: "Status Gizi Anak Laki-laki",
                    data: [
                        <?php
                        if($stat !== 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $bulan = $_POST['bln'];
                            $tahun = $_POST['tahun'];
                            // $jk = $_POST['filter-jk'];
                            $jumlah_buruk = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='BURUK' AND a.kelurahan='$kelurahan' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat == 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $bulan = $_POST['bln'];
                            $tahun = $_POST['tahun'];
                            // $jk = $_POST['filter-jk'];
                            $jumlah_buruk = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='BURUK' AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat !== 'kpm') {
                            $jumlah_buruk = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='BURUK' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat == 'kpm') {
                            $jumlah_buruk = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='BURUK' AND a.jk='L' AND a.kelurahan='$kel' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        }
                        while($row_buruk = mysqli_fetch_array($jumlah_buruk)){
                            echo $row_buruk['total'];
                        }
                        ?>,
                        <?php
                        if($stat !== 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $bulan = $_POST['bln'];
                            $tahun = $_POST['tahun'];
                            // $jk = $_POST['filter-jk'];
                            $jumlah_kurang = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='KURANG' AND a.kelurahan='$kelurahan' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat == 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $bulan = $_POST['bln'];
                            $tahun = $_POST['tahun'];
                            // $jk = $_POST['filter-jk'];
                            $jumlah_kurang = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='KURANG' AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat !== 'kpm') {
                            $jumlah_kurang = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='KURANG' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat == 'kpm') {
                            $jumlah_kurang = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='KURANG' AND a.jk='L' AND a.kelurahan='$kel' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        }
                        while($row_kurang = mysqli_fetch_array($jumlah_kurang)){
                            echo $row_kurang['total'];
                        }
                        ?>,
                        <?php
                        if($stat !== 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $bulan = $_POST['bln'];
                            $tahun = $_POST['tahun'];
                            // $jk = $_POST['filter-jk'];
                            $jumlah_stunting = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='STUNTING' AND a.kelurahan='$kelurahan' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat == 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $bulan = $_POST['bln'];
                            $tahun = $_POST['tahun'];
                            // $jk = $_POST['filter-jk'];
                            $jumlah_stunting = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='STUNTING' AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat !== 'kpm') {
                            $jumlah_stunting = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='STUNTING' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat == 'kpm') {
                            $jumlah_stunting = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='STUNTING' AND a.jk='L' AND a.kelurahan='$kel' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        }
                        while($row_stunting = mysqli_fetch_array($jumlah_stunting)){
                            echo $row_stunting['total'];
                        }
                        ?>,
                        <?php
                        if($stat !== 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $bulan = $_POST['bln'];
                            $tahun = $_POST['tahun'];
                            // $jk = $_POST['filter-jk'];
                            $jumlah_normal = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='NORMAL' AND a.kelurahan='$kelurahan' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat == 'kpm' && isset($_POST['cari'])) {
                            $kelurahan = $_POST['kelurahan'];
                            $bulan = $_POST['bln'];
                            $tahun = $_POST['tahun'];
                            // $jk = $_POST['filter-jk'];
                            $jumlah_normal = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='NORMAL' AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat !== 'kpm') {
                            $jumlah_normal = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='NORMAL' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        } else if($stat == 'kpm') {
                            $jumlah_normal = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='NORMAL' AND a.jk='L' AND a.kelurahan='$kel' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                        }
                        while($row_normal = mysqli_fetch_array($jumlah_normal)){
                            echo $row_normal['total'];
                        }
                        ?>
                    ],
                    backgroundColor:  [
					'rgba(54, 162, 235, 0.2)'
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
