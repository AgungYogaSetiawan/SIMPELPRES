<?php 
session_start();

// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
    header("location:../../login/halaman_login.php");
}

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

    <title>SIMPELPRES - Data Laporan Bantuan Capaian Penerima Layanan</title>

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
                                                    if($stat !== 'kpm' ){
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
                                                <p style="margin-top:10px;">Filter Bulan Pertama:</p>
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
                                                <p style="margin-top:10px;">Filter Sampai Bulan:</p>
                                                <select class="form-select select2" name="bln2" id="bln2" style="width: 200px;">
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
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm mt-2" name="cari"><i class="fa fa fa-search"></i> Tampilkan</button>
                                        <a href="formulir_bcpl.php" class="btn btn-secondary btn-sm mt-2"><i class="fa fa fa-sync"></i> Refresh</a>
                                    </form>
                                    <!-- end form pencarian -->
                                </div>
                            </div>

                            <!-- table -->
                            <!-- <?php if($_SESSION['status'] == 'kpm') {?>
                            <a href="tambah_data.php" class="btn btn-success btn-sm"><i class="fa fa fa-plus"></i> Tambah Data</a>
                            <?php } ?> -->
                            <a href="../../cetak_laporan/cetak_laporan_bcpl.php" class="btn btn-warning btn-sm"><i class="fa fa fa-print"></i> Cetak</a>
                            <div class="card mb-4 mt-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold">Data Laporan Bantuan Capaian Penerima Layanan</h6>
                                </div>
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="table table-stripped table-bordered mt-3 table-responsive">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" width="432" align="center">
                                                    <p>Tingkat Capaian Indikator</p>
                                                </td>
                                                <td colspan="3" width="206" align="center">
                                                    <p>Kuartal ke</p>
                                                </td>
                                            </tr>
                                            <tr align="center">
                                                <td width="36">
                                                    <p>No</p>
                                                </td>
                                                <td width="397">
                                                    <p>Indikator</p>
                                                </td>
                                                <td width="66">
                                                    <p>Jumlah Diterima</p>
                                                </td>
                                                <td width="85">
                                                    <p>Jumlah Seharusnya</p>
                                                </td>
                                                <td width="55">
                                                    <p>%</p>
                                                </td>
                                            </tr>
                                            <tr style="background-color: #1ABA80; color: black;">
                                                <td colspan="5" width="638">
                                                    <p><strong>Sasaran Ibu Hamil</strong></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="36" align="center">
                                                    <p>1</p>
                                                </td>
                                                <td width="397">
                                                    <p>Ibu hamil periksa kehamilan paling sedikit 4 kali selama kehamilan</p>
                                                </td>
                                                <td width="66" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.pemeriksaan_kehamilan='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_kehamilan='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.pemeriksaan_kehamilan='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_kehamilan='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="85" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="55" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' ){
                                                        $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_kehamilan='Y'");
                                                        $exe = mysqli_fetch_array($jml_diterima);

                                                        $jml_harus = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                        $exe2 = mysqli_fetch_array($jml_harus);
                                                    } else {
                                                        $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_kehamilan='Y' AND b.kelurahan='$kel'");
                                                        $exe = mysqli_fetch_array($jml_diterima);

                                                        $jml_harus = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                        $exe2 = mysqli_fetch_array($jml_harus);
                                                    }

                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round($exe[0] / $exe2[0] * 100,0)."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="36" align="center">
                                                    <p>2</p>
                                                </td>
                                                <td width="397">
                                                    <p>Ibu hamil mendapatkan dan minum 1 tablet tambah darah (pilfe) setiap hari minimal 90 hari</p>
                                                </td>
                                                <td width="66" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.dapat_pilfe='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.dapat_pilfe='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.dapat_pilfe='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.dapat_pilfe='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="85" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="55" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm' ){
                                                        $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.dapat_pilfe='Y'");
                                                        $exe = mysqli_fetch_array($jml_diterima);

                                                        $jml_harus = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                        $exe2 = mysqli_fetch_array($jml_harus);
                                                    } else {
                                                        $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.dapat_pilfe='Y' AND b.kelurahan='$kel'");
                                                        $exe = mysqli_fetch_array($jml_diterima);

                                                        $jml_harus = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                        $exe2 = mysqli_fetch_array($jml_harus);
                                                    }

                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round($exe[0] / $exe2[0] * 100,0)."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="36" align="center">
                                                    <p>3</p>
                                                </td>
                                                <td width="397">
                                                    <p>Ibu bersalin mendapatkan layanan nifas oleh nakes dilaksanakan minimal 3 kali</p>
                                                </td>
                                                <td width="66" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.pemeriksaan_nifas='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_nifas='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.pemeriksaan_nifas='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_nifas='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="85" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="55" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.pemeriksaan_kehamilan='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_kehamilan='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.pemeriksaan_kehamilan='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2");
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
                                                <td width="36" align="center">
                                                    <p>4</p>
                                                </td>
                                                <td width="397">
                                                    <p>Ibu hamil mengikuti kegiatan konseling gizi atau kelas ibu hamil minimal 4 kali selama kehamilan</p>
                                                </td>
                                                <td width="66" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.konseling_gizi='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.konseling_gizi='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.konseling_gizi='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.konseling_gizi='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="85" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="55" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.konseling_gizi='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.konseling_gizi='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.konseling_gizi='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2");
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
                                                <td width="36" align="center">
                                                    <p>5</p>
                                                </td>
                                                <td width="397">
                                                    <p>Ibu hamil dengan kondisi resiko tinggi/atau kekurangan energi kronis (KEK) mendapat kunjungan ke rumah oleh bidan desa secara terpadu minimal 1 bulan sekali</p>
                                                </td>
                                                <td width="66" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kelurahan' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bln AND $bln2 AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE c.kunjungan_rumah='Y' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bln AND $bln2 AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE c.kunjungan_rumah='Y' AND b.kelurahan='$kel' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                                </td>
                                                <td width="85" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kelurahan' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI') AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                    }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>

                                                </td>
                                                <td width="55" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kelurahan' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bln AND $bln2 AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2 AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE c.kunjungan_rumah='Y' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bln AND $bln2 AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2 AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
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
                                                <td width="36" align="center">
                                                    <p>6</p>
                                                </td>
                                                <td width="397">
                                                    <p>Rumah tangga ibu hamil memiliki sarana akses air minum yang aman</p>
                                                </td>
                                                <td width="66" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.kepem_air_bersih='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_air_bersih='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_air_bersih='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="85" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="55" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.kepem_air_bersih='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_air_bersih='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2");
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
                                                <td width="36" align="center">
                                                    <p>7</p>
                                                </td>
                                                <td width="397">
                                                    <p>Rumah tangga ibu hamil memiliki sarana jamban keluarga yang layak</p>
                                                </td>
                                                <td width="66" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.kepem_jamban='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_jamban='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_jamban='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="85" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="55" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.kepem_jamban='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_jamban='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2");
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
                                                <td width="36" align="center">
                                                    <p>8</p>
                                                </td>
                                                <td width="397">
                                                    <p>Ibu hamil memiliki jaminan layanan kesehatan</p>
                                                </td>
                                                <td width="66" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.jamkes='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.jamkes='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.jamkes='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.jamkes='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="85" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="55" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.jamkes='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.jamkes='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.jamkes='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2");
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
                                            <tr class="bg-warning text-dark">
                                                <td colspan="5" width="638">
                                                    <p><strong>Sasaran Anak 0 sd 23 Bulan</strong></p>
                                                </td>
                                                </tr>
                                                <tr>
                                                <td width="36" align="center">
                                                    <p>1</p>
                                                </td>
                                                <td width="397">
                                                    <p>Bayi usia 12 bulan kebawah mendapatkan imunisasi dasar lengkap</p>
                                                </td>
                                                <td width="66" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pemberian_imunisasi_dasar='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pemberian_imunisasi_dasar='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="85" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="55" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pemberian_imunisasi_dasar='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pemberian_imunisasi_dasar='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2");
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
                                                <td width="36" align="center">
                                                    <p>2</p>
                                                </td>
                                                <td width="397">
                                                    <p>Anak usia 0-23 bulan diukur berat badannya di posyandu secara rutin setiap bulan</p>
                                                </td>
                                                <td width="66" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.berat_badan='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.berat_badan='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="85" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="55" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.berat_badan='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.berat_badan='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2");
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
                                                <td width="36" align="center">
                                                    <p>3</p>
                                                </td>
                                                <td width="397">
                                                    <p>Anak usia 0-23 bulan diukur panjang/tinggi badannya oleh tenaga kesehatan terlatih minimal 2 kali setahun</p>
                                                </td>
                                                <td width="66" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.tinggi_badan='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.tinggi_badan='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="85" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="55" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.tinggi_badan='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.tinggi_badan='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2");
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
                                                <td width="36" align="center">
                                                    <p>4</p>
                                                </td>
                                                <td width="397">
                                                    <p>Orang tua/pengasuh yang memiliki anak 0-23 bulan mengikuti kegiatan konseling gizi secara rutin minimal sebulan sekali</p>
                                                </td>
                                                <td width="66" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.k1L='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.k1L='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="85" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>

                                                </td>
                                                <td width="55" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.k1L='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.k1L='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2");
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
                                                <td width="36" align="center">
                                                    <p>5</p>
                                                </td>
                                                <td width="397">
                                                    <p>Anak usia 0-23 bulan dengan status gizi buruk, gizi kurang, dan stunting mendapat kunjungan ke rumah secara terpadu minimal 1 bulan sekali</p>
                                                </td>
                                                <td width="66" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kelurahan' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bln AND $bln2 AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE c.kunjungan_rumah='Y' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bln AND $bln2 AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE c.kunjungan_rumah='Y' AND b.kelurahan='$kel' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="85" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kelurahan' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING') AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="55" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kelurahan' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bln AND $bln2 AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2 AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE c.kunjungan_rumah='Y' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bln AND $bln2 AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2 AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
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
                                                <td width="36" align="center">
                                                    <p>6</p>
                                                </td>
                                                <td width="397">
                                                    <p>Rumah tangga anak usia 0-23 bulan memiliki akses sarana minuman yang aman</p>
                                                </td>
                                                <td width="66" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_air_bersih='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="85" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="55" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_air_bersih='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2");
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
                                                <td width="36" align="center">
                                                    <p>7</p>
                                                </td>
                                                <td width="397">
                                                    <p>Rumah tangga anak 0-23 bulan memiliki sarana jamban keluarga yang layak</p>
                                                </td>
                                                <td width="66" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_jamban='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="85" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="55" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_jamban='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2");
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
                                                <td width="36" align="center">
                                                    <p>8</p>
                                                </td>
                                                <td width="397">
                                                    <p>Anak usia 0-23 bulan memiliki akta kelahiran</p>
                                                </td>
                                                <td width="66" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.akta_lahir='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.akta_lahir='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="85" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="55" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.akta_lahir='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.akta_lahir='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2");
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
                                                <td width="36" align="center">
                                                    <p>9</p>
                                                </td>
                                                <td width="397">
                                                    <p>Anak usia 0-23 bulan memiliki jaminan layanan kesehatan</p>
                                                </td>
                                                <td width="66" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.jamkes='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.jamkes='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="85" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="55" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.jamkes='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.jamkes='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2");
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
                                                <td width="36" align="center">
                                                    <p>10</p>
                                                </td>
                                                <td width="397">
                                                    <p>Orang tua/pengasuh yang memiliki anak usia 0-23 bulan mengikuti kelas pengasuhan minimal sebulan sekali</p>
                                                </td>
                                                <td width="66" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pengasuhan_paud='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pengasuhan_paud='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="85" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="55" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pengasuhan_paud='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pengasuhan_paud='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2");
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
                                            <tr class="bg-danger text-dark">
                                                <td colspan="5" width="638">
                                                    <p><strong>Sasaran Anak &gt;2 sd 6 Tahun</strong></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="36" align="center">
                                                    <p>1</p>
                                                </td>
                                                <td width="397">
                                                    <p>Anak usia &gt;2-6 tahun terdaftar dan aktif mengikuti kegiatan layanan PAUD</p>
                                                </td>
                                                <td width="66" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kelurahan' AND a.jml_aktif=12 AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE a.jml_aktif=12");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel' AND a.jml_aktif=12 AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel' AND a.jml_aktif=12");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="85" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];
                                                    ?>
                                                </td>
                                                <td width="55" align="center">
                                                    <?php
                                                    include ('../../setting/koneksi.php');
                                                    if($stat !== 'kpm'  && isset($_POST['cari'])){
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kelurahan' AND a.jml_aktif=12 AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat !== 'kpm' ) {
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE a.jml_aktif=12");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $bln = trim($_POST['bln']);
                                                        $bln2 = trim($_POST['bln2']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel' AND a.jml_aktif=12 AND b.bulan BETWEEN $bln AND $bln2");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2");
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