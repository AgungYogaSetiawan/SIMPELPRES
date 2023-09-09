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

    <title>SIMPELPRES - Data Laporan 3.B</title>

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
                                                    if($stat == 'pegawai' or $_SESSION['status'] == 'administrator'){
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
                                        <a href="formulir3B.php" class="btn btn-secondary btn-sm mt-2"><i class="fa fa fa-sync"></i> Refresh</a>
                                    </form>
                                    <!-- end form pencarian -->
                                </div>
                            </div>

                            <!-- table -->
                            <?php if($_SESSION['status'] !== 'pegawai') {?>
                            <a href="tambah_data.php" class="btn btn-success btn-sm"><i class="fa fa fa-plus"></i> Tambah Data</a>
                            <?php } ?>
                            <a href="../../cetak_laporan/cetak_laporan3b.php" class="btn btn-warning btn-sm"><i class="fa fa fa-print"></i> Cetak</a>
                            <div class="card mb-4 mt-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold">Data Laporan 3B Rekapitulasi Hasil Pemantauan 3 (Tiga) Bulanan Bagi Anak 0-2 Tahun</h6>
                                </div>
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="table table-stripped table-bordered mt-3 table-responsive">
                                    <thead style="background-color: #1cc88a; color: white;">
                                        <tr>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;" style="text-align:center; vertical-align: middle;">No</th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">Kelurahan</th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">Kecamatan</th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg); text-align:center; vertical-align: middle;">No Registrasi (KIA)</span>
                                            </th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">Nama Anak</th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg); text-align:center; vertical-align: middle;">Jenis Kelamin (L/P)</span>
                                            </th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">Bulan</th>
                                            <th colspan="12" style="text-align:center; vertical-align: middle;">KUARTAL KE 1 BULAN</th>
                                            <th colspan=3 rowspan=2 style="text-align:center; vertical-align: middle;">Tingkat Konvergensi Indikator</th>
                                            <?php if($_SESSION['status'] !== 'pegawai') {?>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">Aksi</th>
                                            <?php } ?>
                                        </tr>
                                        <tr>
                                            <th colspan=3 style="text-align:center;">Umur dan Status Gizi</th>
                                            <th colspan=10 style="text-align:center; vertical-align: middle;">Indikator Layanan</th>
                                        </tr>
                                        <tr>
                                            <th style="text-align:center; vertical-align: middle;">Umur (Bulan)</th>
                                            <th style="text-align:center; vertical-align: middle;">(Buruk/<br>Kurang/<br>Stunting)</th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Pemberian Imunisasi Dasar</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Pengukur Berat Badan</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Pengukur Tinggi Badan</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Konseling Gizi Bagi Orang Tua</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Kunjungan Rumah</span>
                                                
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Kepimilikan Akses Air Bersih</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Kepimilikan Jamban Sehat</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Akta Lahir</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Jaminan Kesehatan</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Pengasuhan (PAUD)</span>
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
                                            <td class="td1">q</td>
                                            <td class="td1">r</td>
                                            <td class="td1">s</td>
                                            <?php if($_SESSION['status'] !== 'pegawai') {?>
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
                                            $query = mysqli_query($konek, "SELECT * FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN '$bulan' AND '$bulan2' ORDER BY b.kelurahan LIMIT $halaman_awal, $batas");
                                            $query_halaman = mysqli_query($konek, "SELECT * FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN '$bulan' AND '$bulan2' ORDER BY b.kelurahan");
                                            $jumlah_data = mysqli_num_rows($query_halaman);
				                            $total_halaman = ceil($jumlah_data / $batas);
                                        } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator'){
                                            $query = mysqli_query($konek, "SELECT * FROM tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak ORDER BY b.kelurahan LIMIT $halaman_awal, $batas");
                                            $query_halaman = mysqli_query($konek, "SELECT * FROM tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak ORDER BY b.kelurahan");
                                            $jumlah_data = mysqli_num_rows($query_halaman);
				                            $total_halaman = ceil($jumlah_data / $batas);
                                        } else if($stat == 'kpm'){
                                            $query = mysqli_query($konek, "SELECT * FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' ORDER BY b.kelurahan LIMIT $halaman_awal, $batas");
                                            $query_halaman = mysqli_query($konek, "SELECT * FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' ORDER BY b.kelurahan");
                                            $jumlah_data = mysqli_num_rows($query_halaman);
				                            $total_halaman = ceil($jumlah_data / $batas);
                                        }
                                        $no = $halaman_awal+1;
                                        $jml_seharusnya = 10;
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
                                            <td><?php echo $row['nama_anak']  ?></td>
                                            <td class="td1"><?php 
                                            $jk = $row['jk'];
                                            echo $jk == 'L' ? 'Laki-laki' : 'Perempuan';
                                            ?></td>
                                            <td class="td1"><?php echo getBulan($row['bulan']); ?></td>
                                            <td class="td1"><?php echo $row['umur']  ?></td>
                                            <td class="td1"><?php echo $row['status_gizi']  ?></td>
                                            <td class="td1"><?php echo $row['pemberian_imunisasi_dasar']  ?></td>
                                            <td class="td1"><?php echo $row['berat_badan']  ?></td>
                                            <td class="td1"><?php echo $row['tinggi_badan']  ?></td>
                                            <td class="td1"><?php echo $row['k1L']  ?></td>
                                            <td class="td1"><?php echo $row['kunjungan_rumah']  ?></td>
                                            <td class="td1"><?php echo $row['kepem_air_bersih']  ?></td>
                                            <td class="td1"><?php echo $row['kepem_jamban']; ?></td>
                                            <td class="td1"><?php echo $row['akta_lahir']; ?></td>
                                            <td class="td1"><?php echo $row['jamkes']; ?></td>
                                            <td class="td1"><?php echo $row['pengasuhan_paud']; ?></td>
                                            <td class="td1"><?php echo $row['jml_diterima_lengkap']; ?></td>
                                            <td class="td1"><?php echo $jml_seharusnya ?></td>
                                            <td class="td1">
                                            <?php
                                            echo $row['persen']. "%";
                                            ?></td>
                                            <?php
                                            if($_SESSION['status'] !== 'pegawai'){
                                            echo "<td>
                                            <div class='btn-row'
                                            <div class='btn-group'>
                                            <a href='edit_data.php?id_formulir_tigaB=$row[0]' class='btn btn-warning btn-sm mb-2'></i><i class='fa fa fa-pen'></i></a>
                                            <a href='hapus_data.php?id_formulir_tigaB=$row[0]' onclick='return confirm(\"Hapus data ini?\");' class='btn btn-danger btn-sm'><i class='fa fa fa-trash'></i></a>
                                            </div>
                                            </div>
                                            </td>";
                                            }
                                            ?>
                                            <?php
                                        }
                                        ?>
                                        </tr>
                                        <tr>
                                            <td rowspan=4 colspan=5 class="td1"></td>
                                            <td rowspan=4 class="td1">Tingkat Konvergensi Indikator</td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan=3 class="td1">Jumlah Diterima Lengkap</td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pemberian_imunisasi_dasar='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.berat_badan='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.tinggi_badan='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.k1L='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kunjungan_rumah='Y'");
                                                } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'kpm'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kunjungan_rumah='Y' AND b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                            </td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_air_bersih='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_jamban='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.akta_lahir='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.jamkes='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pengasuhan_paud='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td rowspan=4 style="text-align:center; vertical-align: middle;">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND a.jml_diterima_lengkap=10 AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
                                                    $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE a.jml_diterima_lengkap=10");
                                                } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND a.jml_diterima_lengkap=10 AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'kpm'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE a.jml_diterima_lengkap=10 AND b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                            </td>
                                            <td rowspan=4 style="text-align:center; vertical-align: middle;">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
                                                    $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'kpm'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                            </td>
                                            <td rowspan=4 style="text-align:center; vertical-align: middle;">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND a.persen=100 AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe = mysqli_fetch_array($query);
                                                    $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe_jml = mysqli_fetch_array($query);
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
                                                    $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE a.persen=100");
                                                    $exe = mysqli_fetch_array($query);
                                                    $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                    $exe_jml = mysqli_fetch_array($query);
                                                } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND a.persen=100 AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe = mysqli_fetch_array($query);
                                                    $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe_jml = mysqli_fetch_array($query);
                                                } else if($stat == 'kpm'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND a.persen=100");
                                                    $exe = mysqli_fetch_array($query);
                                                    $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                    $exe_jml = mysqli_fetch_array($query);
                                                }
                                                
                                                // $exe = mysqli_fetch_array($query);
                                                set_error_handler(function () {
                                                    throw new Exception('Ach!');
                                                });

                                                try {
                                                    echo round(100 / $exe_jml[0] * $exe[0])."%";
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
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                } else if($stat == 'kpm'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                }
                                                
                                                $exe = mysqli_fetch_array($query);
                                                echo $exe[0];
                                                ?>
                                            </td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                        </tr>

                                        <tr>
                                            <td colspan=3 class="td1">%</td>
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pemberian_imunisasi_dasar='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe = mysqli_fetch_array($query);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe_jml = mysqli_fetch_array($query);
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.berat_badan='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe = mysqli_fetch_array($query);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe_jml = mysqli_fetch_array($query);
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.tinggi_badan='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe = mysqli_fetch_array($query);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe_jml = mysqli_fetch_array($query);
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.k1L='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe = mysqli_fetch_array($query);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe_jml = mysqli_fetch_array($query);
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe = mysqli_fetch_array($query);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe_jml = mysqli_fetch_array($query);
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kunjungan_rumah='Y'");
                                                    $exe = mysqli_fetch_array($query);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                    $exe_jml = mysqli_fetch_array($query);
                                                } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe = mysqli_fetch_array($query);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe_jml = mysqli_fetch_array($query);
                                                } else if($stat == 'kpm'){
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y'");
                                                    $exe = mysqli_fetch_array($query);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_air_bersih='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe = mysqli_fetch_array($query);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe_jml = mysqli_fetch_array($query);
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_jamban='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe = mysqli_fetch_array($query);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe_jml = mysqli_fetch_array($query);
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.akta_lahir='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe = mysqli_fetch_array($query);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe_jml = mysqli_fetch_array($query);
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.jamkes='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe = mysqli_fetch_array($query);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe_jml = mysqli_fetch_array($query);
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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
                                            <td class="td1">
                                                <?php
                                                include ('../../setting/koneksi.php');
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator' && isset($_POST['cari'])){
                                                    $bln = trim($_POST['bln']);
                                                    $bln2 = trim($_POST['bln2']);
                                                    $kelurahan = trim($_POST['kelurahan']);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pengasuhan_paud='Y' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe = mysqli_fetch_array($query);
                                                    $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bln AND $bln2");
                                                    $exe_jml = mysqli_fetch_array($query);
                                                } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
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