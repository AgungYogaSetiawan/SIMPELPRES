<?php 
session_start();
include '../../setting/koneksi.php';
// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
    header("location:../../login/halaman_login.php");
}

$stat = $_SESSION['status'];
$kel = $_SESSION['username'];
$jml_kel = array();
$jml_total = array();
$query = mysqli_query($konek, "SELECT COUNT(*) as total, kelurahan FROM tb_kelurahan GROUP BY kelurahan LIMIT 10");
while($row = mysqli_fetch_array($query)){
    $jml_kel[] = $row['kelurahan'];
    $jml_total[] = $row['total'];
}
$jml_kel = json_encode($jml_kel);
$jml_total = json_encode($jml_total);

// if(isset($_POST['cari'])){
//     $bulan = $_POST['bln'];
//     $tahun = $_POST['tahun'];
//     $status = $_POST['filter-status'];
//     $jk = $_POST['filter-jk'];
// }

// TERTINGGI //
// NORMAL
    $kelurahan = array();
    $total = array();
    if($stat !== 'kpm' && isset($_POST['cari'])){
        $bulan = $_POST['bln'];
        $tahun = $_POST['tahun'];
        // $status = $_POST['filter-status'];
        $jk = $_POST['filter-jk'];
        $query = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=1 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
    } else if($stat !== 'kpm'){
        $query = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak = 1 GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
    } else if ($stat == 'kpm' && isset($_POST['cari'])){
        $bulan = $_POST['bln'];
        $tahun = $_POST['tahun'];
        // $status = $_POST['filter-status'];
        $jk = $_POST['filter-jk'];
        $query = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=1 AND a.kelurahan='$kel' AND a.bulan=$bulan AND a.tahun=$tahun AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
    } else if($stat == 'kpm'){
        $query = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND a.kelurahan='$kel' AND b.id_gizi_anak = 1 GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
    } 
    while($row = mysqli_fetch_array($query)){
        $kelurahan[] = $row['kelurahan'];
        $total[] = $row['total'];
    }
    $kelurahan = json_encode($kelurahan);
    $total = json_encode($total);


// KURANG
    $kelurahan2 = array();
    $total2 = array();
    if($stat !== 'kpm' && isset($_POST['cari'])){
        $bulan = $_POST['bln'];
        $tahun = $_POST['tahun'];
        // $status = $_POST['filter-status'];
        $jk = $_POST['filter-jk'];
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=2 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
    } else if($stat !== 'kpm'){
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak = 2 GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
    } else if ($stat == 'kpm' && isset($_POST['cari'])){
        $bulan = $_POST['bln'];
        $tahun = $_POST['tahun'];
        // $status = $_POST['filter-status'];
        $jk = $_POST['filter-jk'];
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=2 AND a.kelurahan='$kel' AND a.bulan=$bulan AND a.tahun=$tahun AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
    } else if($stat == 'kpm'){
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak = 2 AND a.kelurahan = '$kel' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
    } 
    while($row = mysqli_fetch_array($query2)){
        $kelurahan2[] = $row['kelurahan'];
        $total2[] = $row['total'];
    }
    $kelurahan2 = json_encode($kelurahan2);
    $total2 = json_encode($total2);

// BURUK
    $kelurahan3 = array();
    $total3 = array();
    if($stat !== 'kpm' && isset($_POST['cari'])){
        $bulan = $_POST['bln'];
        $tahun = $_POST['tahun'];
        // $status = $_POST['filter-status'];
        $jk = $_POST['filter-jk'];
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=3 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
    } else if($stat !== 'kpm'){
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak = 3 GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
    } else if ($stat == 'kpm' && isset($_POST['cari'])){
        $bulan = $_POST['bln'];
        $tahun = $_POST['tahun'];
        // $status = $_POST['filter-status'];
        $jk = $_POST['filter-jk'];
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=3 AND a.kelurahan='$kel' AND a.bulan=$bulan AND a.tahun=$tahun AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
    } else if($stat == 'kpm'){
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak = 3 AND a.kelurahan = '$kel' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
    } 
    while($row = mysqli_fetch_array($query2)){
        $kelurahan3[] = $row['kelurahan'];
        $total3[] = $row['total'];
    }
    $kelurahan3 = json_encode($kelurahan3);
    $total3 = json_encode($total3);


// STUNTING
    $kelurahan4 = array();
    $total4 = array();
    if($stat !== 'kpm' && isset($_POST['cari'])){
        $bulan = $_POST['bln'];
        $tahun = $_POST['tahun'];
        // $status = $_POST['filter-status'];
        $jk = $_POST['filter-jk'];
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=4 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
    } else if($stat !== 'kpm'){
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak = 4 GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
    } else if ($stat == 'kpm' && isset($_POST['cari'])){
        $bulan = $_POST['bln'];
        $tahun = $_POST['tahun'];
        // $status = $_POST['filter-status'];
        $jk = $_POST['filter-jk'];
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=4 AND a.kelurahan='$kel' AND a.bulan=$bulan AND a.tahun=$tahun AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
    } else if($stat == 'kpm'){
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak = 4 AND a.kelurahan = '$kel' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
    } 
    while($row = mysqli_fetch_array($query2)){
        $kelurahan4[] = $row['kelurahan'];
        $total4[] = $row['total'];
    }
    $kelurahan4 = json_encode($kelurahan4);
    $total4 = json_encode($total4);



// TERENDAH //
// NORMAL
    $kelurahan5 = array();
    $total5 = array();
    if($stat !== 'kpm' && isset($_POST['cari'])){
        $bulan = $_POST['bln'];
        $tahun = $_POST['tahun'];
        // $status = $_POST['filter-status'];
        $jk = $_POST['filter-jk'];
        $query = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=1 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
    } else if($stat !== 'kpm'){
        $query = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak = 1 GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
    } else if ($stat == 'kpm' && isset($_POST['cari'])){
        $bulan = $_POST['bln'];
        $tahun = $_POST['tahun'];
        // $status = $_POST['filter-status'];
        $jk = $_POST['filter-jk'];
        $query = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=1 AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
    } else if($stat == 'kpm'){
        $query = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND a.kelurahan='$kel' AND b.id_gizi_anak = 1 GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
    } 
    while($row = mysqli_fetch_array($query)){
        $kelurahan5[] = $row['kelurahan'];
        $total5[] = $row['total'];
    }
    $kelurahan5 = json_encode($kelurahan5);
    $total5 = json_encode($total5);


// KURANG
    $kelurahan6 = array();
    $total6 = array();
    if($stat !== 'kpm' && isset($_POST['cari'])){
        $bulan = $_POST['bln'];
        $tahun = $_POST['tahun'];
        // $status = $_POST['filter-status'];
        $jk = $_POST['filter-jk'];
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=2 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
    } else if($stat !== 'kpm'){
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak = 2 GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
    } else if ($stat == 'kpm' && isset($_POST['cari'])){
        $bulan = $_POST['bln'];
        $tahun = $_POST['tahun'];
        // $status = $_POST['filter-status'];
        $jk = $_POST['filter-jk'];
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=2 AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
    } else if($stat == 'kpm'){
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak = 2 AND a.kelurahan = '$kel' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
    } 
    while($row = mysqli_fetch_array($query2)){
        $kelurahan6[] = $row['kelurahan'];
        $total6[] = $row['total'];
    }
    $kelurahan6 = json_encode($kelurahan6);
    $total6 = json_encode($total6);

// BURUK
    $kelurahan7 = array();
    $total7 = array();
    if($stat !== 'kpm' && isset($_POST['cari'])){
        $bulan = $_POST['bln'];
        $tahun = $_POST['tahun'];
        // $status = $_POST['filter-status'];
        $jk = $_POST['filter-jk'];
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=3 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
    } else if($stat !== 'kpm'){
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak = 3 GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
    } else if ($stat == 'kpm' && isset($_POST['cari'])){
        $bulan = $_POST['bln'];
        $tahun = $_POST['tahun'];
        // $status = $_POST['filter-status'];
        $jk = $_POST['filter-jk'];
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=3 AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
    } else if($stat == 'kpm'){
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak = 3 AND a.kelurahan = '$kel' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
    } 
    while($row = mysqli_fetch_array($query2)){
        $kelurahan7[] = $row['kelurahan'];
        $total7[] = $row['total'];
    }
    $kelurahan7 = json_encode($kelurahan7);
    $total7 = json_encode($total7);


// STUNTING
    $kelurahan8 = array();
    $total8 = array();
    if($stat !== 'kpm' && isset($_POST['cari'])){
        $bulan = $_POST['bln'];
        $tahun = $_POST['tahun'];
        // $status = $_POST['filter-status'];
        $jk = $_POST['filter-jk'];
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=4 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
    } else if($stat !== 'kpm'){
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak = 4 GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
    } else if ($stat == 'kpm' && isset($_POST['cari'])){
        $bulan = $_POST['bln'];
        $tahun = $_POST['tahun'];
        // $status = $_POST['filter-status'];
        $jk = $_POST['filter-jk'];
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=4 AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
    } else if($stat == 'kpm'){
        $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak = 4 AND a.kelurahan = '$kel' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
    } 
    while($row = mysqli_fetch_array($query2)){
        $kelurahan8[] = $row['kelurahan'];
        $total8[] = $row['total'];
    }
    $kelurahan8 = json_encode($kelurahan8);
    $total8 = json_encode($total8);


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

    <title>SIMPELPRES - Grafik Status Gizi Tertinggi dan Terendah</title>

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
                                    <form action="" method="POST">
                                        <div class="row">
                                            <div class="col">
                                                <p style="margin-top:10px;">Filter Bulan:</p>
                                                <select class="form-select form-select-sm select2" aria-label="form-select-sm example" style="width:193px;" name="bln" id="bln">
                                                    <option >--Pilih Bulan--</option>
                                                    <option value="all">Semua</option>
                                                    <option value=1>Januari</option>
                                                    <option value=2>Februari</option>
                                                    <option value=3>Maret</option>
                                                    <option value=4>April</option>
                                                    <option value=5>Mei</option>
                                                    <option value=6>Juni</option>
                                                    <option value=7>Juli</option>
                                                    <option value=8>Agustus</option>
                                                    <option value=9>September</option>
                                                    <option value=10>Oktober</option>
                                                    <option value=11>November</option>
                                                    <option value=12>Desember</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <p style="margin-top:10px;">Filter Tahun:</p>
                                                <select class="form-select form-select-sm select2" aria-label="form-select-sm example" style="width:193px;" name="tahun" id="tahun">
                                                <option >--Pilih Tahun--</option>
                                                <option value="all">Semua</option>
                                                <?php
                                                for ($x = 2015; $x <= 2040; $x++) {
                                                ?>
                                                <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                                <?php
                                                }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <p style="margin-top:10px;">Filter Jenis Kelamin:</p>
                                                <select class="form-select form-select-sm select2" aria-label="form-select-sm example" style="width:193px;" name="filter-jk" id="filter-jk">
                                                    <option >--Pilih Jenis Kelamin--</option>
                                                    <option value="all">Semua</option>
                                                    <option value="P">Perempuan</option>
                                                    <option value="L">Laki-laki</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- <div class="col" style="margin-top: 11px;">
                                                <p style="margin-top:10px;">Filter Status Gizi:</p>
                                                <select class="form-select form-select-sm select2" aria-label="form-select-sm example" style="width:193px;" name="filter-status" id="filter-status">
                                                    <option >--Pilih Status Gizi--</option>
                                                    <option value="all">Semua</option>
                                                    <option value="STUNTING">Stunting</option>
                                                    <option value="NORMAL">Normal</option>
                                                    <option value="BURUK">Buruk</option>
                                                    <option value="KURANG">Kurang</option>
                                                </select>
                                            </div> -->
                                            
                                            <div class="col" style="margin-top: 11px;">
                                                <input type="hidden">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm mt-2" name="cari"><i class="fa fa fa-search"></i> Tampilkan</button>
                                        <a href="grafik_peringkat.php" class="btn btn-secondary btn-sm mt-2"><i class="fa fa fa-sync"></i> Refresh</a>
                                    </form>
                                    <!-- end form pencarian -->
                                </div>
                            </div>
                            <a href="../../cetak_laporan/cetak_laporan_grafik_peringkat.php" class="btn btn-warning btn-sm"><i class="fa fa fa-print"></i> Cetak</a>
                            <?php if($stat !== 'kpm'){ ?>
                            <div class="card mb-4 mt-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold">Data Grafik Status Gizi Tertinggi</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Grafik -->
                                    <canvas id="chart"></canvas>
                                    <!-- <div id="chartContainer" style="height: 300px; width: 100%;"></div> -->
                                </div>
                            </div>
                            <br>
                            <div class="card mb-4 mt-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold">Data Grafik Status Gizi Tertinggi</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Grafik -->
                                    <canvas id="chart-kurang"></canvas>
                                    <!-- <div id="chartContainer" style="height: 300px; width: 100%;"></div> -->
                                </div>
                            </div>
                            <br>
                            <div class="card mb-4 mt-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold">Data Grafik Status Gizi Tertinggi</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Grafik -->
                                    <canvas id="chart-buruk"></canvas>
                                    <!-- <div id="chartContainer" style="height: 300px; width: 100%;"></div> -->
                                </div>
                            </div>
                            <br>
                            <div class="card mb-4 mt-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold">Data Grafik Status Gizi Tertinggi</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Grafik -->
                                    <canvas id="chart-stunting"></canvas>
                                    <!-- <div id="chartContainer" style="height: 300px; width: 100%;"></div> -->
                                </div>
                            </div>
                            <br>
                            <div class="card mb-4 mt-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold">Data Grafik Status Gizi Terendah</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Grafik -->
                                    <canvas id="chart2"></canvas>
                                    <!-- <div id="chartContainer" style="height: 300px; width: 100%;"></div> -->
                                </div>
                            </div>
                            <br>
                            <div class="card mb-4 mt-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold">Data Grafik Status Gizi Terendah</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Grafik -->
                                    <canvas id="chart-kurang-rendah"></canvas>
                                    <!-- <div id="chartContainer" style="height: 300px; width: 100%;"></div> -->
                                </div>
                            </div>
                            <br>
                            <div class="card mb-4 mt-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold">Data Grafik Status Gizi Terendah</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Grafik -->
                                    <canvas id="chart-buruk-rendah"></canvas>
                                    <!-- <div id="chartContainer" style="height: 300px; width: 100%;"></div> -->
                                </div>
                            </div>
                            <br>
                            <div class="card mb-4 mt-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold">Data Grafik Status Gizi Terendah</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Grafik -->
                                    <canvas id="chart-stunting-rendah"></canvas>
                                    <!-- <div id="chartContainer" style="height: 300px; width: 100%;"></div> -->
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="card mb-4 mt-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold">Data Grafik Status Gizi <?php echo $kel ?></h6>
                                </div>
                                <div class="card-body">
                                    <!-- Grafik -->
                                    <canvas id="chart-total-tinggi"></canvas>
                                    <!-- <div id="chartContainer" style="height: 300px; width: 100%;"></div> -->
                                </div>
                            </div>
                            <br>
                            <!-- <div class="card mb-4 mt-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold">Data Grafik Status Gizi Terendah</h6>
                                </div>
                                <div class="card-body"> -->
                                    <!-- Grafik -->
                                    <!-- <canvas id="chart-total-rendah"></canvas> -->
                                    <!-- <div id="chartContainer" style="height: 300px; width: 100%;"></div> -->
                                <!-- </div>
                            </div> -->
                            <?php } ?>
                        </section>
                    </section>

<?php include '../../template/footer.php'; ?>
<!-- Tautan ke file Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- grafik charts.js -->
<?php if($stat !== 'kpm'){ ?>
    <script>
        // Mengonversi data JSON ke array JavdESCript
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
                labels: 
                    <?php echo $kelurahan; ?>   
                ,
                datasets: [
                {
                    label: "Normal",
                    data: 
                        <?php echo $total; ?>
                    ,
                    backgroundColor:  [
					'rgba(0, 235, 71, 0.8)'
					],
                    borderColor: [
					'rgba(0, 235, 71, 0.8)'
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

    <script>
        // Mengonversi data JSON ke array JavdESCript
        // Generate array warna latar belakang acak
        // var backgroundColors = [];
        // for (var i = 0; i < 5; i++) {
        //     var randomColor = "rgba(" + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", 0.5)";
        //     backgroundColors.push(randomColor);
        // }

        // Membuat grafik menggunakan Charts.js
        var ctx = document.getElementById("chart-kurang").getContext("2d");
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: 
                    <?php echo $kelurahan2; ?>   
                ,
                datasets: [
                {
                    label: "Kurang",
                    data: 
                        <?php echo $total2; ?>
                    ,
                    backgroundColor:  [
					'rgba(192, 207, 0, 0.8)'
					],
                    borderColor: [
					'rgba(192, 207, 0, 0.8)'
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


    <script>
        // Mengonversi data JSON ke array JavdESCript
        // Generate array warna latar belakang acak
        // var backgroundColors = [];
        // for (var i = 0; i < 5; i++) {
        //     var randomColor = "rgba(" + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", 0.5)";
        //     backgroundColors.push(randomColor);
        // }

        // Membuat grafik menggunakan Charts.js
        var ctx = document.getElementById("chart-buruk").getContext("2d");
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: 
                    <?php echo $kelurahan3; ?>   
                ,
                datasets: [
                {
                    label: "Buruk",
                    data: 
                        <?php echo $total3; ?>
                    ,
                    backgroundColor:  [
					'rgba(255, 231, 3, 0.8)'
					],
                    borderColor: [
					'rgba(255, 231, 3, 0.8)'
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


    <script>
        // Mengonversi data JSON ke array JavdESCript
        // Generate array warna latar belakang acak
        // var backgroundColors = [];
        // for (var i = 0; i < 5; i++) {
        //     var randomColor = "rgba(" + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", 0.5)";
        //     backgroundColors.push(randomColor);
        // }

        // Membuat grafik menggunakan Charts.js
        var ctx = document.getElementById("chart-stunting").getContext("2d");
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: 
                    <?php echo $kelurahan4; ?>   
                ,
                datasets: [
                {
                    label: "Stunting",
                    data: 
                        <?php echo $total4; ?>
                    ,
                    backgroundColor:  [
					'rgba(248, 68, 29, 0.8)'
					],
                    borderColor: [
					'rgba(248, 68, 29, 0.8)'
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



    <script>
        // Mengonversi data JSON ke array JavdESCript
        // Generate array warna latar belakang acak
        // var backgroundColors = [];
        // for (var i = 0; i < 5; i++) {
        //     var randomColor = "rgba(" + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", 0.5)";
        //     backgroundColors.push(randomColor);
        // }

        // Membuat grafik menggunakan Charts.js
        var ctx = document.getElementById("chart2").getContext("2d");
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: 
                    <?php echo $kelurahan5; ?>   
                ,
                datasets: [
                {
                    label: "Normal",
                    data: 
                        <?php echo $total5; ?>
                    ,
                    backgroundColor:  [
					'rgba(0, 235, 71, 0.8)'
					],
                    borderColor: [
					'rgba(0, 235, 71, 0.8)'
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

    <script>
        // Mengonversi data JSON ke array JavdESCript
        // Generate array warna latar belakang acak
        // var backgroundColors = [];
        // for (var i = 0; i < 5; i++) {
        //     var randomColor = "rgba(" + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", 0.5)";
        //     backgroundColors.push(randomColor);
        // }

        // Membuat grafik menggunakan Charts.js
        var ctx = document.getElementById("chart-kurang-rendah").getContext("2d");
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: 
                    <?php echo $kelurahan6; ?>   
                ,
                datasets: [
                {
                    label: "Kurang",
                    data: 
                        <?php echo $total6; ?>
                    ,
                    backgroundColor:  [
					'rgba(192, 207, 0, 0.8)'
					],
                    borderColor: [
					'rgba(192, 207, 0, 0.8)'
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


    <script>
        // Mengonversi data JSON ke array JavdESCript
        // Generate array warna latar belakang acak
        // var backgroundColors = [];
        // for (var i = 0; i < 5; i++) {
        //     var randomColor = "rgba(" + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", 0.5)";
        //     backgroundColors.push(randomColor);
        // }

        // Membuat grafik menggunakan Charts.js
        var ctx = document.getElementById("chart-buruk-rendah").getContext("2d");
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: 
                    <?php echo $kelurahan7; ?>   
                ,
                datasets: [
                {
                    label: "Buruk",
                    data: 
                        <?php echo $total7; ?>
                    ,
                    backgroundColor:  [
					'rgba(255, 231, 3, 0.8)'
					],
                    borderColor: [
					'rgba(255, 231, 3, 0.8)'
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


    <script>
        // Mengonversi data JSON ke array JavdESCript
        // Generate array warna latar belakang acak
        // var backgroundColors = [];
        // for (var i = 0; i < 5; i++) {
        //     var randomColor = "rgba(" + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", 0.5)";
        //     backgroundColors.push(randomColor);
        // }

        // Membuat grafik menggunakan Charts.js
        var ctx = document.getElementById("chart-stunting-rendah").getContext("2d");
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: 
                    <?php echo $kelurahan8; ?>   
                ,
                datasets: [
                {
                    label: "Stunting",
                    data: 
                        <?php echo $total8; ?>
                    ,
                    backgroundColor:  [
					'rgba(248, 68, 29, 0.8)'
					],
                    borderColor: [
					'rgba(248, 68, 29, 0.8)'
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
    <?php } else { ?>

<script>
        // Mengonversi data JSON ke array JavdESCript
        // Generate array warna latar belakang acak
        // var backgroundColors = [];
        // for (var i = 0; i < 5; i++) {
        //     var randomColor = "rgba(" + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", 0.5)";
        //     backgroundColors.push(randomColor);
        // }

        // Membuat grafik menggunakan Charts.js
        var ctx = document.getElementById("chart-total-rendah").getContext("2d");
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: 
                    <?php echo $kelurahan; ?>
                ,
                datasets: [
                {
                    label: "Normal",
                    data: 
                        <?php echo $total; ?>
                    ,
                    backgroundColor:  [
					'rgba(0, 235, 71, 0.8)'
					],
                    borderColor: [
					'rgba(0, 235, 71, 0.8)'
					],
                    borderWidth: 1
                },
                {
                    label: "Kurang",
                    data: 
                        <?php echo $total2; ?>
                    ,
                    backgroundColor:  [
					'rgba(192, 207, 0, 0.8)'
					],
                    borderColor: [
					'rgba(192, 207, 0, 0.8)'
					],
                    borderWidth: 1
                },
                {
                    label: "Buruk",
                    data: 
                        <?php echo $total3; ?>
                    ,
                    backgroundColor:  [
					'rgba(255, 231, 3, 0.8)'
					],
                    borderColor: [
					'rgba(255, 231, 3, 0.8)'
					],
                    borderWidth: 1
                },
                {
                    label: "Stunting",
                    data: 
                        <?php echo $total4; ?>
                    ,
                    backgroundColor:  [
					'rgba(248, 68, 29, 0.8)'
					],
                    borderColor: [
					'rgba(248, 68, 29, 0.8)'
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
<script>
        // Mengonversi data JSON ke array JavdESCript
        // Generate array warna latar belakang acak
        // var backgroundColors = [];
        // for (var i = 0; i < 5; i++) {
        //     var randomColor = "rgba(" + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", 0.5)";
        //     backgroundColors.push(randomColor);
        // }

        // Membuat grafik menggunakan Charts.js
        var ctx = document.getElementById("chart-total-tinggi").getContext("2d");
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: 
                    <?php echo $kelurahan5; ?>
                ,
                datasets: [
                {
                    label: "Normal",
                    data: 
                        <?php echo $total5; ?>
                    ,
                    backgroundColor:  [
					'rgba(0, 235, 71, 0.8)'
					],
                    borderColor: [
					'rgba(0, 235, 71, 0.8)'
					],
                    borderWidth: 1
                },
                {
                    label: "Kurang",
                    data: 
                        <?php echo $total6; ?>
                    ,
                    backgroundColor:  [
					'rgba(192, 207, 0, 0.8)'
					],
                    borderColor: [
					'rgba(192, 207, 0, 0.8)'
					],
                    borderWidth: 1
                },
                {
                    label: "Buruk",
                    data: 
                        <?php echo $total7; ?>
                    ,
                    backgroundColor:  [
					'rgba(255, 231, 3, 0.8)'
					],
                    borderColor: [
					'rgba(255, 231, 3, 0.8)'
					],
                    borderWidth: 1
                },
                {
                    label: "Stunting",
                    data: 
                        <?php echo $total8; ?>
                    ,
                    backgroundColor:  [
					'rgba(248, 68, 29, 0.8)'
					],
                    borderColor: [
					'rgba(248, 68, 29, 0.8)'
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
<?php } ?>

    
