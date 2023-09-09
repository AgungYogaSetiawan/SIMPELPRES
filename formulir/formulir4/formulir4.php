<?php 
session_start();

// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
    header("location:../../login/halaman_login.php");
}

$kel = $_SESSION['username'];
$stat = $_SESSION['status'];

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

    <title>SIMPELPRES - Data Laporan 4</title>

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
                                                <p style="margin-top:10px;">Filter Tahun:</p>
                                                <select class="select2" name="tahun" id="tahun" style="width: 193px;">
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
                                        <button type="submit" class="btn btn-primary btn-sm mt-2" name="cari"><i class="fa fa fa-search"></i> Tampilkan</button>
                                        <a href="formulir4.php" class="btn btn-secondary btn-sm mt-2"><i class="fa fa fa-sync"></i> Refresh</a>
                                    </form>
                                    <!-- end form pencarian -->
                                </div>
                            </div>

                            <!-- table -->
                            <!-- <?php if($_SESSION['status'] == 'kpm') {?>
                            <a href="tambah_data.php" class="btn btn-success btn-sm"><i class="fa fa fa-plus"></i> Tambah Data</a>
                            <?php } ?> -->
                            <a href="../../cetak_laporan/cetak_laporan4.php" class="btn btn-warning btn-sm"><i class="fa fa fa-print"></i> Cetak</a>
                            <div class="card mb-4 mt-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold">Data Laporan 4 Konvergensi Pencegahan Stunting Tingkat Desa Terhadap Sasaran Rumah Tangga 1000 HPK</h6>
                                </div>
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="table table-stripped table-bordered mt-3 table-responsive">
                                        <tbody>
                                            <tr>
                                                <td width="638" colspan="13" valign="top" style="background-color: #1cc88a; color: white;">
                                                    <p>
                                                        TABEL 1. JUMLAH SASARAN 1.000 HPK (IBU HAMIL DAN ANAK 0 -
                                                        23 BULAN)
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="134" colspan="2" rowspan="2" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        SASARAN
                                                    </p>
                                                </td>
                                                <td width="158" colspan="2" rowspan="2" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        JML TOTAL RUMAH TANGGA 1.000 HPK
                                                    </p>
                                                </td>
                                                <td width="149" colspan="3" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        IBU HAMIL
                                                    </p>
                                                </td>
                                                <td width="197" colspan="6" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        ANAK 0-23 BULAN
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="72" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        TOTAL
                                                    </p>
                                                </td>
                                                <td width="77" colspan="2" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        KEK/RISTI
                                                    </p>
                                                </td>
                                                <td width="72" colspan="3" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        TOTAL
                                                    </p>
                                                </td>
                                                <td width="125" colspan="3" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        GIZI KURANG/GIZI BURUK/STUNTING
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="134" colspan="2" >
                                                    <p align="center">
                                                        Jumlah
                                                    </p>
                                                </td>
                                                <td width="158" colspan="2" valign="top">
                                                </td>
                                                <td width="72" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_bumil WHERE kelurahan='$kelurahan' AND tahun='$tahun'");
                                                    } else if($stat !== 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_bumil");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_bumil WHERE kelurahan='$kel' AND tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_bumil WHERE kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="77" colspan="2" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_bumil b INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                    } else if($stat !== 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_bumil b INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan WHERE s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_bumil b INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_bumil b INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan WHERE b.kelurahan='$kel' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="72" colspan="3" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta WHERE kelurahan='$kelurahan' AND tahun='$tahun'");
                                                    } else if($stat !== 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta WHERE kelurahan='$kel' AND tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta WHERE kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="125" colspan="3" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                    } else if($stat !== 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak WHERE g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak WHERE b.kelurahan='$kel' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="638" colspan="13" valign="top" style="background-color: #1cc88a; color: white;">
                                                    <p>
                                                        TABEL 2. HASIL PENGUKURAN TIKAR PERTUMBUHAN (DETEKSI DINI
                                                        STUNTING)
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="134" colspan="2" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        SASARAN
                                                    </p>
                                                </td>
                                                <td width="75" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        JUMLAH TOTAL ANAK USIA 0-23 BULAN
                                                    </p>
                                                </td>
                                                <td width="83" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        HIJAU (NOMINAL)
                                                    </p>
                                                </td>
                                                <td width="149" colspan="3" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        KUNING (RESIKO STUNTING)
                                                    </p>
                                                </td>
                                                <td width="197" colspan="6" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        MERAH TERINDIKASI STUNTING
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="134" colspan="2" >
                                                    <p align="center">
                                                        Jumlah
                                                    </p>
                                                </td>
                                                <td width="75" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta WHERE kelurahan='$kelurahan' AND tahun='$tahun'");
                                                    } else if($stat !== 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta WHERE kelurahan='$kel' AND tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta WHERE kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="83" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE kelurahan='$kelurahan' AND tahun='$tahun' AND hasil='H'");
                                                    } else if($stat !== 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE hasil='H'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE kelurahan='$kel' AND tahun='$tahun' AND hasil='H'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE kelurahan='$kel' AND hasil='H'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="149" colspan="3" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE kelurahan='$kelurahan' AND tahun='$tahun' AND hasil='K'");
                                                    } else if($stat !== 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE hasil='K'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE kelurahan='$kel' AND tahun='$tahun' AND hasil='K'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE kelurahan='$kel' AND hasil='K'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="197" colspan="6" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE kelurahan='$kelurahan' AND tahun='$tahun' AND hasil='M'");
                                                    } else if($stat !== 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE hasil='M'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE kelurahan='$kel' AND tahun='$tahun' AND hasil='M'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE kelurahan='$kel' AND hasil='M'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="638" colspan="13" valign="top" style="background-color: #1cc88a; color: white;">
                                                    <p>
                                                        TABEL 3. KELENGKAPAN KONVERGENSI PAKET LAYANAN PENCEGAHAN
                                                        STUNTING BAGI 1.000 HPK
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="92" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        SASARAN
                                                    </p>
                                                </td>
                                                <td width="42" valign="top" style="background-color: #1cc88a; color: white;">
                                                </td>
                                                <td width="336" colspan="6" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        INDIKATOR
                                                    </p>
                                                </td>
                                                <td width="104" colspan="4" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        JUMLAH
                                                    </p>
                                                </td>
                                                <td width="64" style="background-color: #1cc88a; color: white;">
                                                    <p align="center" >
                                                        %
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="92" rowspan="8">
                                                    <p align="center">
                                                        IBU HAMIL
                                                    </p>
                                                </td>
                                                <td width="42">
                                                    <p align="center">
                                                        1
                                                    </p>
                                                </td>
                                                <td width="336" colspan="6" valign="top">
                                                    <p>
                                                        Ibu hamil periksa kehamilan paling sedkit 4 kali selama kehamilan
                                                    </p>
                                                </td>
                                                <td width="104" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.pemeriksaan_kehamilan='Y' AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_kehamilan='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.pemeriksaan_kehamilan='Y' AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_kehamilan='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="64" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.pemeriksaan_kehamilan='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_kehamilan='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.pemeriksaan_kehamilan='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.pemeriksaan_kehamilan='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="42">
                                                    <p align="center">
                                                        2
                                                    </p>
                                                </td>
                                                <td width="336" colspan="6" valign="top">
                                                    <p>
                                                        Ibu hamil mendapatkan dari minum 1 table tambahan darah (pil FE) setiap hari minimal selama 90 hari
                                                    </p>
                                                </td>
                                                <td width="104" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.dapat_pilfe='Y' AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.dapat_pilfe='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.dapat_pilfe='Y' AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.dapat_pilfe='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="64" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.dapat_pilfe='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.dapat_pilfe='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.dapat_pilfe='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.dapat_pilfe='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="42">
                                                    <p align="center">
                                                        3
                                                    </p>
                                                </td>
                                                <td width="336" colspan="6" valign="top">
                                                    <p>
                                                        Ibu bersalin mendapatkan layanan nifas oleh nakes
                                                        dilaksanakan minimal 3 kali
                                                    </p>
                                                </td>
                                                <td width="104" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.pemeriksaan_nifas='Y' AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_nifas='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.pemeriksaan_nifas='Y' AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_nifas='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="64" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.pemeriksaan_nifas='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_nifas='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.pemeriksaan_nifas='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.pemeriksaan_nifas='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="42">
                                                    <p align="center">
                                                        4
                                                    </p>
                                                </td>
                                                <td width="336" colspan="6" valign="top">
                                                    <p>
                                                        Ibu hamil mengikuti kegiatan konseling gizi atau kelas ibu hamil minimal 4 kali selama kehamilan
                                                    </p>
                                                </td>
                                                <td width="104" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.konseling_gizi='Y' AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.konseling_gizi='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.konseling_gizi='Y' AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.konseling_gizi='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="64" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.konseling_gizi='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.konseling_gizi='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.konseling_gizi='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.konseling_gizi='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="42">
                                                    <p align="center">
                                                        5
                                                    </p>
                                                </td>
                                                <td width="336" colspan="6" valign="top">
                                                    <p>
                                                        Ibu hamil dengan resiko tinggi dan atau kekurangan energi kronis (KEK) mendapat kunjungan ke rumah oleh bidan desa secara terpadu minimal 1 bulan sekali
                                                    </p>
                                                </td>
                                                <td width="104" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kelurahan' AND c.kunjungan_rumah='Y' AND b.tahun='$tahun' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE c.kunjungan_rumah='Y' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND b.tahun='$tahun' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE c.kunjungan_rumah='Y' AND b.kelurahan='$kel' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="64" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kelurahan' AND c.kunjungan_rumah='Y' AND b.tahun='$tahun' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE c.kunjungan_rumah='Y' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND b.tahun='$tahun' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="42">
                                                    <p align="center">
                                                        6
                                                    </p>
                                                </td>
                                                <td width="336" colspan="6" valign="top">
                                                    <p>
                                                        Rumah tangga ibu hamil memiliki sarana akses air minum yang aman
                                                    </p>
                                                </td>
                                                <td width="104" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.kepem_air_bersih='Y' AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_air_bersih='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y' AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_air_bersih='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="64" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.kepem_air_bersih='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_air_bersih='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="42">
                                                    <p align="center">
                                                        7
                                                    </p>
                                                </td>
                                                <td width="336" colspan="6" valign="top">
                                                    <p>
                                                        Rumah tangga ibu hamil memiliki sarana jamban keluarga yang layak
                                                    </p>
                                                </td>
                                                <td width="104" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.kepem_jamban='Y' AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_jamban='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y' AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_jamban='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="64" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.kepem_jamban='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_jamban='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="42">
                                                    <p align="center">
                                                        8
                                                    </p>
                                                </td>
                                                <td width="336" colspan="6" valign="top">
                                                    <p>
                                                        Ibu hamil memiliki jaminan layanan kesehatan
                                                    </p>
                                                </td>
                                                <td width="104" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.jamkes='Y' AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.jamkes='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.jamkes='Y' AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.jamkes='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="64" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.jamkes='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.jamkes='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.jamkes='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.jamkes='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="92" rowspan="11">
                                                    <p align="center">
                                                        ANAK 0 sd 23 BULAN (0 sd 2 TAHUN)
                                                    </p>
                                                </td>
                                                <td width="42">
                                                    <p align="center">
                                                        1
                                                    </p>
                                                </td>
                                                <td width="336" colspan="6" valign="top">
                                                    <p>
                                                        Bayi usia 12 bulan ke bawah mendapatkan imunisasi dasar lengkap
                                                    </p>
                                                </td>
                                                <td width="104" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pemberian_imunisasi_dasar='Y' AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pemberian_imunisasi_dasar='Y' AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="64" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pemberian_imunisasi_dasar='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pemberian_imunisasi_dasar='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pemberian_imunisasi_dasar='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="42">
                                                    <p align="center">
                                                        2
                                                    </p>
                                                </td>
                                                <td width="336" colspan="6" valign="top">
                                                    <p>
                                                        Anak usia 0-23 bulan diukur dengan berat badannya di
                                                        posyandu secara rutin setiap bulan
                                                    </p>
                                                </td>
                                                <td width="104" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.berat_badan='Y' AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.berat_badan='Y' AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="64" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.berat_badan='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.berat_badan='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.berat_badan='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="42">
                                                    <p align="center">
                                                        3
                                                    </p>
                                                </td>
                                                <td width="336" colspan="6" valign="top">
                                                    <p>
                                                        Anak usia 0-23 bulan diukur panjang/tinggi badannya oleh tenaga kesehatan terlatih minimal 2 kali dalam setahun
                                                    </p>
                                                </td>
                                                <td width="104" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.tinggi_badan='Y' AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.tinggi_badan='Y' AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="64" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.tinggi_badan='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.tinggi_badan='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.tinggi_badan='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="42" rowspan="2">
                                                    <p align="center">
                                                        4
                                                    </p>
                                                </td>
                                                <td width="336" colspan="6" rowspan="2" valign="top">
                                                    <p>
                                                        Orang tua/pengasuh yang memiliki anak usia 0-23 bulan mengikuti kegiatan konseling gizi secara rutin minimal sebulan sekali
                                                    </p>
                                                </td>
                                                <td width="47" colspan="3" valign="top">
                                                    <p>Laki</p>
                                                </td>
                                                <td width="47" valign="top">
                                                    <p>Jml</p>
                                                </td>
                                                <td width="64" valign="top">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="57" colspan="3" valign="top" align="center">
                                                </td>
                                                <td width="47" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.k1L='Y' AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.k1L='Y' AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="64" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.k1L='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.k1L='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.k1L='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="42">
                                                    <p align="center">
                                                        5
                                                    </p>
                                                </td>
                                                <td width="336" colspan="6" valign="top">
                                                    <p>
                                                        Anak usia 0-23 bulan dengan status gizi buruk, kurang, dan
                                                        stunting mendapat kunjungan ke rumah secara terpadu minimal 1 bulan sekali
                                                    </p>
                                                </td>
                                                <td width="104" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kelurahan' AND c.kunjungan_rumah='Y' AND b.tahun='$tahun' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE c.kunjungan_rumah='Y' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND b.tahun='$tahun' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE c.kunjungan_rumah='Y' AND b.kelurahan='$kel' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="64" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kelurahan' AND c.kunjungan_rumah='Y' AND b.tahun='$tahun' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE c.kunjungan_rumah='Y' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND b.tahun='$tahun' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="42">
                                                    <p align="center">
                                                        6
                                                    </p>
                                                </td>
                                                <td width="336" colspan="6" valign="top">
                                                    <p>
                                                        Rumah tangga anak usia 0-23 bulan memiliki sarana akses air minum yang aman
                                                    </p>
                                                </td>
                                                <td width="104" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_air_bersih='Y' AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y' AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="64" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_air_bersih='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="42">
                                                    <p align="center">
                                                        7
                                                    </p>
                                                </td>
                                                <td width="336" colspan="6" valign="top">
                                                    <p>
                                                        Rumah tangga anak usia 0-23 bulan memiliki sarana jamban yang layak
                                                    </p>
                                                </td>
                                                <td width="104" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_jamban='Y' AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y' AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="64" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_jamban='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="42">
                                                    <p align="center">
                                                        8
                                                    </p>
                                                </td>
                                                <td width="336" colspan="6" valign="top">
                                                    <p>
                                                        Anak usia 0-23 bulan memiliki akta kelahiran
                                                    </p>
                                                </td>
                                                <td width="104" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.akta_lahir='Y' AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.akta_lahir='Y' AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="64" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.akta_lahir='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.akta_lahir='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.akta_lahir='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="42">
                                                    <p align="center">
                                                        9
                                                    </p>
                                                </td>
                                                <td width="336" colspan="6" valign="top">
                                                    <p>
                                                        Anak usia 0-23 bulan memiliki jaminan layanan kesehatan
                                                    </p>
                                                </td>
                                                <td width="104" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.jamkes='Y' AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.jamkes='Y' AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="64" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.jamkes='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.jamkes='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.jamkes='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="42">
                                                    <p align="center">
                                                        10
                                                    </p>
                                                </td>
                                                <td width="336" colspan="6" valign="top">
                                                    <p>
                                                        Orang tua/pengasuh yang memiliki anak usia 0-23 bulan mengikuti kelas pengasuhan minimal sebulan sekali
                                                    </p>
                                                </td>
                                                <td width="104" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pengasuhan_paud='Y' AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pengasuhan_paud='Y' AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="64" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pengasuhan_paud='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pengasuhan_paud='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pengasuhan_paud='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="92">
                                                    <p align="center">
                                                        ANAK 2 sd 6
                                                    </p>
                                                </td>
                                                <td width="42">
                                                    <p align="center">
                                                        1
                                                    </p>
                                                </td>
                                                <td width="336" colspan="6" valign="top">
                                                    <p>
                                                        Anak usia 2-6 tahun terdaftar dan aktif mengikuti kegiatan layanan PAUD
                                                    </p>
                                                </td>
                                                <td width="104" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kelurahan' AND a.jml_aktif=12 AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE a.jml_aktif=12");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel' AND a.jml_aktif=12 AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel' AND a.jml_aktif=12");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="64" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kelurahan' AND a.jml_aktif=12 AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE a.jml_aktif=12");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel' AND a.jml_aktif=12 AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel' AND a.jml_aktif=12");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="638" colspan="13" valign="top" style="background-color: #1cc88a; color: white;">
                                                    <p>
                                                        TABEL 4. TINGKAT KONVERGENSI DESA
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="92" rowspan="2" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        NO
                                                    </p>
                                                </td>
                                                <td width="200" colspan="3" rowspan="2" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        SASARAN
                                                    </p>
                                                </td>
                                                <td width="346" colspan="9" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        JUMLAH INDIKATOR
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="103" colspan="2" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        YANG DITERIMA
                                                    </p>
                                                </td>
                                                <td width="104" colspan="3" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        SEHARUSNYA DITERIMA
                                                    </p>
                                                </td>
                                                <td width="140" colspan="4" style="background-color: #1cc88a; color: white;">
                                                    <p align="center">
                                                        TINGKAT KONVERGENSI
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="92">
                                                    <p align="center">
                                                        1
                                                    </p>
                                                </td>
                                                <td width="200" colspan="3" valign="top">
                                                    <p>
                                                        Ibu hamil
                                                    </p>
                                                </td>
                                                <td width="103" colspan="2" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND a.jml_diterima_lengkap=6 AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE a.jml_diterima_lengkap=6");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND a.jml_diterima_lengkap=6 AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE a.jml_diterima_lengkap=6 AND b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe_hamil = mysqli_fetch_array($query);
                                                    echo $exe_hamil[0];
                                                    ?>
                                                </td>
                                                <td width="104" colspan="3" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe_jml_hamil = mysqli_fetch_array($query);
                                                    echo $exe_jml_hamil[0];
                                                    ?>
                                                </td>
                                                <td width="140" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND a.persen=100 AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE a.persen=100");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND a.persen=100 AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND a.persen=100");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        $hasil_hamil = round(100 / ($exe_jml_hamil[0] / $exe_hamil[0]))."%";
                                                        echo $hasil_hamil;
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil_hamil = 0;
                                                    }

                                                    restore_error_handler();
                                                    
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="92">
                                                    <p align="center">
                                                        2
                                                    </p>
                                                </td>
                                                <td width="200" colspan="3" valign="top">
                                                    <p>
                                                        Anak 0-23 bulan
                                                    </p>
                                                </td>
                                                <td width="103" colspan="2" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND a.jml_diterima_lengkap=10 AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE a.jml_diterima_lengkap=10");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND a.jml_diterima_lengkap=10 AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE a.jml_diterima_lengkap=10 AND b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe_anak = mysqli_fetch_array($query);
                                                    echo $exe_anak[0];
                                                    ?>
                                                </td>
                                                <td width="104" colspan="3" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe_jml_anak = mysqli_fetch_array($query);
                                                    echo $exe_jml_anak[0];
                                                    ?>
                                                </td>
                                                <td width="140" colspan="4" valign="top" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND a.persen=100 AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE a.persen=100");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND a.persen=100 AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND a.persen=100");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        $hasil_anak = round(100 / ($exe_jml_anak[0] / $exe_anak[0]))."%";
                                                        echo $hasil_anak;
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="292" colspan="4">
                                                    <p align="center">
                                                        TOTAL TINGKAT KONVERGENSI DESA
                                                    </p>
                                                </td>
                                                <td width="103" colspan="2" valign="top" align="center">
                                                    <?php 
                                                    $total_hamil = $exe_hamil[0] + $exe_anak[0]; 
                                                    echo $total_hamil;
                                                    ?>
                                                </td>
                                                <td width="104" colspan="3" valign="top" align="center">
                                                    <?php 
                                                    $total_anak = $exe_jml_hamil[0] + $exe_jml_anak[0]; 
                                                    echo $total_anak;
                                                    ?>
                                                </td>
                                                <td width="140" colspan="4" valign="top" align="center">
                                                    <?php
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        $hasil_anak = round(100 / ($total_anak / $total_hamil))."%";
                                                        echo $hasil_anak;
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler(); 
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                        </table>

                                    <!-- end of table -->
                                    <!-- <nav>
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item">
                                                <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                                            </li>
                                            <?php 
                                            for($x=1;$x<=$total_halaman;$x++){
                                                ?> 
                                                <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                                <?php
                                            }
                                            ?>				
                                            <li class="page-item">
                                                <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                                            </li>
                                        </ul>
                                    </nav> -->
                                </div>
                            </div>
                        </section>
                    </section>

<?php include '../../template/footer.php'; ?>