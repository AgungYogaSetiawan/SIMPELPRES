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

    <title>SIMPELKPM - Data Laporan 3.A</title>

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
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../dashboard.php">
                <div class="sidebar-brand-icon">
                    <i><img src="../../img/logo_pemko_bjm2.png" style="width: 42px;"></i>
                </div>
                <div class="sidebar-brand-text mx-1">SIMPELKPM</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../../dashboard.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if($_SESSION['status'] == 'kpm') {?>
            <div class="sidebar-heading">
                Master
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../../data_master/data_kecamatan.php">Data Kecamatan</a>
                        <a class="collapse-item" href="../../data_master/data_kelurahan.php">Data Kelurahan</a>
                        <a class="collapse-item" href="../../data_master/data_bumil/data_bumil.php">Data Ibu Hamil</a>
                        <a class="collapse-item" href="../../data_master/data_batita/data_batita.php">Data Anak 0-2 Tahun</a>
                        <a class="collapse-item" href="../../data_master/data_balita/data_balita.php">Data Anak >2-6 Tahun</a>
                    </div>
                </div>
            </li>
            <?php } ?>

            <div class="sidebar-heading">
                Proses
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>Berkas Laporan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../../formulir/formulir2A/formulir2A.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Bulanan Ibu Hamil">Data Laporan 2.A</a>
                        <a class="collapse-item" href="../../formulir/formulir2B/formulir2B.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Bulanan Anak 0-2 Tahun">Data Laporan 2.B</a>
                        <a class="collapse-item" href="../../formulir/formulir2C/formulir2C.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Layanan dan Sasaran Paud Anak >2-6 Tahun">Data Laporan 2.C</a>
                        <a class="collapse-item" href="" data-toggle="tooltip" data-placement="top" title="Data Rekapitulasi Hasil Pemantauan Tiga Bulanan Ibu Hamil">Data Laporan 3.A</a>
                        <a class="collapse-item" href="../../formulir/formulir3B/formulir3B.php" data-toggle="tooltip" data-placement="top" title="Data Rekapitulasi Tiga Bulanan Bagi Anak 0-2 Tahun">Data Laporan 3.B</a>
                    </div>
                </div>
            </li>

            <div class="sidebar-heading">
                Laporan
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Cetak Laporan</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan2a.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Bulanan Ibu Hamil">Cetak Laporan 2.A</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan2b.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Bulanan Anak 0-2 Tahun">Cetak Laporan 2.B</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan2c.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Layanan dan Sasaran Paud Anak >2-6 Tahun">Cetak Laporan 2.C</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan3a.php" data-toggle="tooltip" data-placement="top" title="Data Rekapitulasi Hasil Pemantauan Tiga Bulanan Bagi Ibu Hamil">Cetak Laporan 3.A</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan3b.php" data-toggle="tooltip" data-placement="top" title="Data Rekapitulasi Tiga Bulanan Bagi Anak 0-2 Tahun">Cetak Laporan 3.B</a>
                    </div>
                </div>
                
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
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
                                                    if($stat == 'pegawai'){
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
                                        <a href="formulir3A.php">Refresh</a>
                                    </form>
                                    <!-- end form pencarian -->
                                </div>
                            </div>

                            <!-- table -->
                            <?php if($_SESSION['status'] == 'kpm') {?>
                            <a href="tambah_data.php" class="btn btn-success btn-sm"><i class="fa fa fa-plus"></i> Tambah Data</a>
                            <?php } ?>
                            <div class="card mb-4 mt-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold">Data Laporan 3A Rekapitulasi Hasil Pemantauan 3 (Tiga) Bulanan Bagi Ibu Hamil</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-stripped table-bordered mt-3 table-responsive">
                                    <thead style="background-color: #1cc88a; color: white;">
                                        <tr>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;" style="text-align:center; vertical-align: middle;">No</th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">Kelurahan</th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">Kecamatan</th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">No Register (KIA)</span>
                                            </th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">Nama Ibu</th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">Status Kehamilan (KEK/RISTI/NORMAL)</th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">Bulan</th>
                                            <th colspan="9" style="text-align:center; vertical-align: middle;">KUARTAL</th>
                                            <th colspan=3 rowspan=2 style="text-align:center; vertical-align: middle;">Tingkat Konvergensi Indikator</th>
                                            <?php if($_SESSION['status'] == 'kpm') {?>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">Aksi</th>
                                            <?php } ?>
                                        </tr>
                                        <tr>
                                            <th style="text-align:center;">Usia Kehamilan dan Persalinan</th>
                                            <th colspan=8 style="text-align:center; vertical-align: middle;">Status Penerimaan Indikator</th>
                                        </tr>
                                        <tr>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Usia Kehamilan (Bulan)</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Pemeriksaan Kehamilan</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Dapat & Konsumsi Pil Fe</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Pemeriksaan Nifas</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Konseling Gizi (Kelas IH)</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Kunjungan Rumah</span>
                                                
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Kepimilikan Akses Air Bersih</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Kepimilikan Jamban</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Jaminan Kesehatan</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Jumlah Diterima Lengkap</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Jumlah Seharusnya</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">%</th>
                                        </tr>
                                        <tr>
                                            <td class="td1"></td>
                                            <td class="td1"></td>
                                            <td class="td1"></td>
                                            <td class="td1">a</td>
                                            <td class="td1">b</td>
                                            <td class="td1">c</td>
                                            <td class="td1">d</td>
                                            <td class="td1">e</td>
                                            <td class="td1">f</td>
                                            <td class="td1">g</td>
                                            <td class="td1">h</td>
                                            <td class="td1">i</td>
                                            <td class="td1">j</td>
                                            <td class="td1">k</td>
                                            <td class="td1">l</td>
                                            <td class="td1">m</td>
                                            <td class="td1">n</td>
                                            <td class="td1">o</td>
                                            <td class="td1">p</td>
                                            <?php if($_SESSION['status'] == 'kpm') {?>
                                            <td class="td1"></td>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../setting/koneksi.php';
                                        $kel = $_SESSION['username'];
                                        $stat = $_SESSION['status'];
                                        $batas = 10;
                                        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                                        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
                                        $previous = $halaman - 1;
                                        $next = $halaman + 1;
                                        if(isset($_POST['cari'])){
                                            $kelurahan = trim($_POST['kelurahan']);
                                            $bulan = trim($_POST['bln']);
                                            $bulan2 = trim($_POST['bln2']);
                                            if($bulan == 0 and $bulan2 == 3){
                                                $kuartal = "Kuartal 1";
                                            } else if($bulan == 4 and $bulan2 == 6){
                                                $kuartal = "Kuartal 2";
                                            } else if($bulan == 7 and $bulan2 == 9){
                                                $kuartal = "Kuartal 3";
                                            } else {
                                                $kuartal = "Ibu Bersalin";
                                            }
                                            $query = mysqli_query($konek, "SELECT * FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2 LIMIT $halaman_awal, $batas");
                                            $query_halaman = mysqli_query($konek, "SELECT * FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                                            $jumlah_data = mysqli_num_rows($query_halaman);
				                            $total_halaman = ceil($jumlah_data / $batas);
                                        } else if($stat == 'pegawai'){
                                            $query = mysqli_query($konek, "SELECT * FROM tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA LIMIT $halaman_awal, $batas");
                                            $query_halaman = mysqli_query($konek, "SELECT * FROM tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA");
                                            $jumlah_data = mysqli_num_rows($query_halaman);
				                            $total_halaman = ceil($jumlah_data / $batas);
                                        } else if($stat == 'kpm'){
                                            $query = mysqli_query($konek, "SELECT * FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' ORDER BY b.kelurahan DESC LIMIT $halaman_awal, $batas");
                                            $query_halaman = mysqli_query($konek, "SELECT * FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' ORDER BY b.kelurahan DESC");
                                            $jumlah_data = mysqli_num_rows($query_halaman);
				                            $total_halaman = ceil($jumlah_data / $batas);
                                        }
                                        // } else if(isset($_POST['cari']) && $stat == 'kpm'){
                                        //     $kelurahan = trim($_POST['kelurahan']);
                                        //     $bulan = trim($_POST['bln']);
                                        //     $bulan2 = trim($_POST['bln2']);
                                        //     if($bulan == 0 and $bulan2 == 3){
                                        //         $kuartal = "Kuartal 1";
                                        //     } else if($bulan == 4 and $bulan2 == 6){
                                        //         $kuartal = "Kuartal 2";
                                        //     } else if($bulan == 7 and $bulan2 == 9){
                                        //         $kuartal = "Kuartal 3";
                                        //     } else {
                                        //         $kuartal = "Ibu Bersalin";
                                        //     }
                                        //     $query = mysqli_query($konek, "SELECT * FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' OR b.bulan BETWEEN $bulan AND $bulan2");
                                        // }
                                        $no = $halaman_awal+1;
                                        $jml_seharusnya = 6;
                                        function  getBulan($bln){
                                                switch  ($bln){
                                                    case  1:
                                                    return  "Januari";
                                                    break;
                                                    case  2:
                                                    return  "Februari";
                                                    break;
                                                    case  3:
                                                    return  "Maret";
                                                    break;
                                                    case  4:
                                                    return  "April";
                                                    break;
                                                    case  5:
                                                    return  "Mei";
                                                    break;
                                                    case  6:
                                                    return  "Juni";
                                                    break;
                                                    case  7:
                                                    return  "Juli";
                                                    break;
                                                    case  8:
                                                    return  "Agustus";
                                                    break;
                                                    case  9:
                                                    return  "September";
                                                    break;
                                                    case  10:
                                                    return  "Oktober";
                                                    break;
                                                    case  11:
                                                    return  "November";
                                                    break;
                                                    case  12:
                                                    return  "Desember";
                                                    break;
                                                }
                                            }
                                        while($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td class="td1"><?php echo $no++ ?></td>
                                            <td><?php echo $row['kelurahan']  ?></td>
                                            <td><?php echo $row['kecamatan']  ?></td>
                                            <td class="td1"><?php echo $row['no_register']  ?></td>
                                            <td><?php echo $row['nama_ibu']  ?></td>
                                            <td class="td1"><?php echo $row['status_kehamilan']  ?></td>
                                            <td class="td1"><?php echo getBulan($row['bulan'])  ?></td>
                                            <td class="td1"><?php echo $row['usia_kehamilan']  ?></td>
                                            <td class="td1"><?php echo $row['pemeriksaan_kehamilan']  ?></td>
                                            <td class="td1"><?php echo $row['dapat_pilfe']  ?></td>
                                            <td class="td1"><?php echo $row['pemeriksaan_nifas']  ?></td>
                                            <td class="td1"><?php echo $row['konseling_gizi']  ?></td>
                                            <td class="td1"><?php echo $row['kunjungan_rumah']  ?></td>
                                            <td class="td1"><?php echo $row['kepem_air_bersih']  ?></td>
                                            <td class="td1"><?php echo $row['kepem_jamban']  ?></td>
                                            <td class="td1"><?php echo $row['jamkes']  ?></td>
                                            <td class="td1"><?php echo $row['jml_diterima_lengkap']; ?></td>
                                            <td class="td1"><?php echo $jml_seharusnya; ?></td>
                                            <td class="td1">
                                            <?php
                                            echo $row['persen']. "%";
                                            ?></td>
                                            <?php 
                                            if($_SESSION['status'] == 'kpm'){
                                            echo "
                                            <td>
                                            <div class='btn-row'>
                                            <div class='btn-group'>
                                            <a href='edit_data.php?id_formulir_tigaA=$row[0]' class='btn btn-warning btn-sm mr-2'><i class='fa fa fa-pen'></i></a>
                                            <a href='hapus_data.php?id_formulir_tigaA=$row[0]' class='btn btn-danger btn-sm alert_hapus'><i class='fa fa fa-trash'></i></a>
                                            </div>
                                            </div>
                                            </td>
                                            ";
                                            }
                                            ?>
                                            <?php
                                        }
                                        ?>
                                        </tr>
                                        <tr>
                                            <td rowspan=4 colspan=4 class="td1"></td>
                                            <td rowspan=4 class="td1">Tingkat Konvergensi Indikator</td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan=3 class="td1">Jumlah Diterima Lengkap</td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_kehamilan='Y'");
                                                } else {
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_kehamilan='Y' AND b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                            </td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.dapat_pilfe='Y'");
                                                } else {
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.dapat_pilfe='Y' AND b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                            </td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_nifas='Y'");
                                                } else {
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_nifas='Y' AND b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                            </td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.konseling_gizi='Y'");
                                                } else {
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.konseling_gizi='Y' AND b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                            </td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kunjungan_rumah='Y'");
                                                } else {
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kunjungan_rumah='Y' AND b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                            </td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_air_bersih='Y'");
                                                } else {
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_air_bersih='Y' AND b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                            </td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_jamban='Y'");
                                                } else {
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_jamban='Y' AND b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                            </td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.jamkes='Y'");
                                                } else {
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.jamkes='Y' AND b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                            </td>
                                            <td rowspan=4 style="text-align:center; vertical-align: middle;">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(	jml_diterima_lengkap) FROM tb_formulir3a WHERE jml_diterima_lengkap=6");
                                                } else {
                                                    $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE a.jml_diterima_lengkap=6 AND b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                            </td>
                                            <td rowspan=4 style="text-align:center; vertical-align: middle;">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $query = mysqli_query($konek, 'select count(*) from tb_formulir3a');
                                                } else {
                                                    $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                }
                                                
                                                $exe_jml = mysqli_fetch_array($query);
                                                echo $exe_jml[0];
                                                ?>
                                            </td>
                                            <td rowspan=4 style="text-align:center; vertical-align: middle;">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(persen) FROM tb_formulir3a WHERE persen=100");
                                                } else {
                                                    $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE a.persen=100 AND b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
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
                                            <td colspan=3 class="td1">Jumlah Seharusnya</td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                } else {
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                            </td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                } else {
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                            </td>
                                            <td class="td1">
                                                <?php
                                                echo 0;
                                                ?>
                                            </td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                } else {
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)WHERE b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                            </td>
                                            <td class="td1">
                                                <?php
                                                echo 0;
                                                ?>
                                            </td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                } else {
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                            </td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                } else {
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                            </td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                } else {
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                            </td>
                                            
                                        </tr>

                                        <tr>
                                            <td colspan=3 class="td1">%</td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_nifas='Y'");
                                                } else {
                                                    $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_nifas='Y' AND b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($jml_diterima);
                                                echo round($exe[0] * 100,0)."%";
                                                ?>
                                            </td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.konseling_gizi='Y'");
                                                    $exe = mysqli_fetch_array($jml_diterima);

                                                    $jml_harus = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                    $exe2 = mysqli_fetch_array($jml_harus);
                                                } else {
                                                    $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.konseling_gizi='Y' AND b.kelurahan='$kel'");
                                                    $exe = mysqli_fetch_array($jml_diterima);

                                                    $jml_harus = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kunjungan_rumah='Y'");
                                                } else {
                                                    $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kunjungan_rumah='Y' AND b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($jml_diterima);
                                                echo round($exe[0] * 0,0)."%";
                                                ?>
                                            </td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_air_bersih='Y'");
                                                    $exe = mysqli_fetch_array($jml_diterima);

                                                    $jml_harus = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                    $exe2 = mysqli_fetch_array($jml_harus);
                                                } else {
                                                    $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_air_bersih='Y' AND b.kelurahan='$kel'");
                                                    $exe = mysqli_fetch_array($jml_diterima);

                                                    $jml_harus = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_jamban='Y'");
                                                    $exe = mysqli_fetch_array($jml_diterima);

                                                    $jml_harus = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                    $exe2 = mysqli_fetch_array($jml_harus);
                                                } else {
                                                    $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_jamban='Y' AND b.kelurahan='$kel'");
                                                    $exe = mysqli_fetch_array($jml_diterima);

                                                    $jml_harus = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai'){
                                                    $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.jamkes='Y'");
                                                    $exe = mysqli_fetch_array($jml_diterima);

                                                    $jml_harus = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                                                    $exe2 = mysqli_fetch_array($jml_harus);
                                                } else {
                                                    $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.jamkes='Y' AND b.kelurahan='$kel'");
                                                    $exe = mysqli_fetch_array($jml_diterima);

                                                    $jml_harus = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
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
                                    </tbody>
                                    </table>
                                    <!-- end of table -->
                                    <nav>
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
                                    </nav>
                                </div>
                            </div>
                        </section>
                    </section>

<?php include '../../template/footer.php'; ?>