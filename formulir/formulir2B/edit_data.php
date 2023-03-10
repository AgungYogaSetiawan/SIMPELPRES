<?php
    session_start();
    include '../../setting/koneksi.php';

    // cek apakah yang mengakses halaman ini sudah login
    if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
        header("location:../../login/halaman_login.php");
    }

    $id_formulir_duaB = $_GET['id_formulir_duaB'];
    $sql = "SELECT * FROM tb_formulir2b f INNER JOIN tb_baduta b ON f.id_baduta = b.id_baduta WHERE f.id_formulir_duaB='$id_formulir_duaB'";
    $result = mysqli_query($konek,$sql);
    $data = mysqli_fetch_array($result);

    if(isset($_POST['edit'])){
        $id_formulir_duaB = $_POST['id_formulir_duaB'];
        $pemberian_imunisasi_dasar =  $_POST['pemberian_imunisasi_dasar'];
        $berat_badan = $_POST['berat_badan'];
        $tinggi_badan =  $_POST['tinggi_badan'];
        $k1L =  $_POST['k1L'];
        $k2P =  $_POST['k2P'];
        $kunjungan_rumah =  $_POST['kunjungan_rumah'];
        $kepem_air_bersih =  $_POST['kepem_air_bersih'];
        $kepem_jamban = $_POST['kepem_jamban'];
        $akta_lahir =  $_POST['akta_lahir'];
        $jamkes =  $_POST['jamkes'];
        $pengasuhan_paud =  $_POST['pengasuhan_paud'];

        $sql = "UPDATE tb_formulir2b SET pemberian_imunisasi_dasar = '$pemberian_imunisasi_dasar', berat_badan = '$berat_badan', tinggi_badan = '$tinggi_badan', k1L = '$k1L', k2P = '$k2P', kunjungan_rumah = '$kunjungan_rumah', kepem_air_bersih = '$kepem_air_bersih', kepem_jamban = '$kepem_jamban', akta_lahir = '$akta_lahir', jamkes = '$jamkes', pengasuhan_paud = '$pengasuhan_paud' WHERE id_formulir_duaB = '$id_formulir_duaB'";
        mysqli_query($konek,$sql);

        
        echo "<script>alert('Data Berhasil Diubah');</script>";
        echo '<meta http-equiv="refresh" content="1;url=formulir2B.php">';
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

    <title>Laporan 2.B - Edit Data</title>

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
                        <a class="collapse-item" href="formulir2B.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Bulanan Anak 0-2 Tahun">Data Laporan 2.B</a>
                        <a class="collapse-item" href="../../formulir/formulir2C/formulir2C.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Layanan dan Sasaran Paud Anak >2-6 Tahun">Data Laporan 2.C</a>
                        <a class="collapse-item" href="../../formulir/formulir3A/formulir3A.php" data-toggle="tooltip" data-placement="top" title="Data Rekapitulasi Hasil Pemantauan Tiga Bulanan Ibu Hamil">Data Laporan 3.A</a>
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
                        <div class="card mb-4 mt-2">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold">Edit Data Laporan 2B Pemantauan Bulanan Anak 0-2 Tahun</h6>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <input type="hidden" id="id_formulir_duaB" name="id_formulir_duaB" value="<?php echo $data['id_formulir_duaB']; ?>" readonly>
                                    <div class="row">
                                            <div class="col">
                                                <!-- kelurahan -->
                                                <div class="form-group row">
                                                    <label for="kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select select2" name="kelurahan" id="kelurahan" style="width: 250px;" disabled>
                                                        <?php
                                                            include '../../setting/koneksi.php';
                                                            $kel = $_SESSION['username'];
                                                            //query menampilkan nama unit kerja ke dalam combobox
                                                            $query = mysqli_query($konek, "SELECT * FROM tb_kelurahan WHERE kelurahan='$kel'");
                                                            while ($res = mysqli_fetch_array($query)) {
                                                                if($data['kelurahan']==$res['kelurahan']) {
                                                                    $select = "selected";
                                                                } else {
                                                                    $select = "";
                                                                }
                                                                echo "<option $select>".$res['kelurahan']."</option>";
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- end kelurahan -->
                                            </div>
                                            <div class="col">
                                                <!-- kecamatan -->
                                                <div class="form-group row">
                                                    <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select select2" name="kecamatan" id="kecamatan" style="width: 250px;" disabled>
                                                        <?php
                                                            include '../../setting/koneksi.php';
                                                            //query menampilkan nama unit kerja ke dalam combobox
                                                            $query = mysqli_query($konek, "SELECT * FROM tb_kecamatan GROUP BY kecamatan ORDER BY kecamatan");
                                                            while ($res = mysqli_fetch_array($query)) {
                                                                if($data['kecamatan']==$res['kecamatan']) {
                                                                    $select = "selected";
                                                                } else {
                                                                    $select = "";
                                                                }
                                                                echo "<option $select>".$res['kecamatan']."</option>";
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- end kecamatan -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <!-- bulan -->
                                                <div class="form-group row">
                                                    <label for="bulan" class="col-sm-2 col-form-label">Bulan</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select select2" name="bulan" id="bulan" style="width: 250px;" disabled>
                                                            <option value="--Pilih Bulan--"></option>
                                                            <option value="1" <?php echo ($data['bulan'] == 1) ? " selected" : "" ?>>Januari</option>
                                                            <option value="2" <?php echo ($data['bulan'] == 2) ? " selected" : "" ?>>Februari</option>
                                                            <option value="3" <?php echo ($data['bulan'] == 3) ? " selected" : "" ?>>Maret</option>
                                                            <option value="4" <?php echo ($data['bulan'] == 4) ? " selected" : "" ?>>April</option>
                                                            <option value="5" <?php echo ($data['bulan'] == 5) ? " selected" : "" ?>>Mei</option>
                                                            <option value="6" <?php echo ($data['bulan'] == 6) ? " selected" : "" ?>>Juni</option>
                                                            <option value="7" <?php echo ($data['bulan'] == 7) ? " selected" : "" ?>>Juli</option>
                                                            <option value="8" <?php echo ($data['bulan'] == 8) ? " selected" : "" ?>>Agustus</option>
                                                            <option value="9" <?php echo ($data['bulan'] == 9) ? " selected" : "" ?>>September</option>
                                                            <option value="10" <?php echo ($data['bulan'] == 10) ? " selected" : "" ?>>Oktober</option>
                                                            <option value="11" <?php echo ($data['bulan'] == 11) ? " selected" : "" ?>>November</option>
                                                            <option value="12" <?php echo ($data['bulan'] == 12) ? " selected" : "" ?>>Desember</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- end bulan -->
                                            </div>
                                            <div class="col">
                                                <!-- tahun -->
                                                <div class="form-group row">
                                                    <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select select2" name="tahun" id="tahun" style="width: 250px;" disabled>
                                                            <option value="--Pilih tahun--"></option>
                                                            <option value="2019" <?php echo ($data['tahun'] == 2019) ? " selected" : "" ?>>2019</option>
                                                            <option value="2020" <?php echo ($data['tahun'] == 2020) ? " selected" : "" ?>>2020</option>
                                                            <option value="2021" <?php echo ($data['tahun'] == 2021) ? " selected" : "" ?>>2021</option>
                                                            <option value="2022" <?php echo ($data['tahun'] == 2022) ? " selected" : "" ?>>2022</option>
                                                            <option value="2023" <?php echo ($data['tahun'] == 2023) ? " selected" : "" ?>>2023</option>
                                                            <option value="2024" <?php echo ($data['tahun'] == 2024) ? " selected" : "" ?>>2024</option>
                                                            <option value="2025" <?php echo ($data['tahun'] == 2025) ? " selected" : "" ?>>2025</option>
                                                            <option value="2026" <?php echo ($data['tahun'] == 2026) ? " selected" : "" ?>>2026</option>
                                                            <option value="2027" <?php echo ($data['tahun'] == 2027) ? " selected" : "" ?>>2027</option>
                                                            <option value="2028" <?php echo ($data['tahun'] == 2028) ? " selected" : "" ?>>2028</option>
                                                            <option value="2029" <?php echo ($data['tahun'] == 2029) ? " selected" : "" ?>>2029</option>
                                                            <option value="2030" <?php echo ($data['tahun'] == 2030) ? " selected" : "" ?>>2030</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- end tahun -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <!-- no register -->
                                                <div class="form-group row">
                                                    <label for="no_register" class="col-sm-2 col-form-label">No Register</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <input type="text" class="form-control" name="no_register" id="no_register" placeholder="No Register" style="width: 250px;" value="<?php echo $data['no_register']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <!-- end no register -->
                                            </div>
                                            <div class="col">
                                                <!-- nama anak -->
                                                <div class="form-group row">
                                                    <label for="nama_anak" class="col-sm-2 col-form-label">Nama Anak</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <input type="text" class="form-control" name="nama_anak" id="nama_anak" placeholder="Nama Anak" style="width: 250px;" value="<?php echo $data['nama_anak']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <!-- end nama anak -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <!-- jk -->
                                                <div class="form-group row">
                                                    <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="L" name="jk" id="jk" <?php echo ($data['jk'] == 'L') ? " checked" : "" ?> required disabled>
                                                            <label class="form-check-label" for="jk">
                                                                L
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="P" name="jk" id="jk2" <?php echo ($data['jk'] == 'P') ? " checked" : "" ?> required disabled>
                                                            <label class="form-check-label" for="jk2">
                                                                P</h4>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end jk -->
                                            </div>
                                            <div class="col">
                                                <!-- tanggal lahir anak -->
                                                <div class="form-group row">
                                                    <label for="tgl_lahir_anak" class="col-sm-2 col-form-label">Tanggal Lahir Anak</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <input type="date" class="form-control" name="tgl_lahir_anak" id="tgl_lahir_anak" placeholder="Tanggal Lahir Anak" style="width: 250px;" value="<?php echo $data['tgl_lahir_anak']; ?>" onchange="hitungUmur()" disabled>
                                                    </div>
                                                </div>
                                                <!-- end tanggal lahir anak -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <!-- status_gizi_anak -->
                                                <div class="form-group row">
                                                    <label for="status_gizi_anak" class="col-sm-2 col-form-label">Status Gizi Anak</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="N" name="status_gizi_anak" id="status_gizi_anak" <?php echo ($data['status_gizi_anak'] == 'N') ? " checked" : "" ?> required disabled>
                                                            <label class="form-check-label" for="status_gizi_anak">
                                                                NORMAL
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="BURUK" name="status_gizi_anak" id="status_gizi_anak2" <?php echo ($data['status_gizi_anak'] == 'BURUK') ? " checked" : "" ?> required disabled>
                                                            <label class="form-check-label" for="status_gizi_anak2">
                                                                BURUK
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="KURANG" name="status_gizi_anak" id="status_gizi_anak3" <?php echo ($data['status_gizi_anak'] == 'KURANG') ? " checked" : "" ?> required disabled>
                                                            <label class="form-check-label" for="status_gizi_anak3">
                                                                KURANG
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="STUNTING" name="status_gizi_anak" id="status_gizi_anak4" <?php echo ($data['status_gizi_anak'] == 'STUNTING') ? " checked" : "" ?> required disabled>
                                                            <label class="form-check-label" for="status_gizi_anak4">
                                                                STUNTING
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end jamkes -->
                                            </div>
                                            <div class="col">
                                                <!-- umur -->
                                                <div class="form-group row">
                                                    <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="umur" id="umur" placeholder="Umur" style="width: 250px;" value="<?php echo $data['umur']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <!-- end umur -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <!-- hasil -->
                                                <div class="form-group row">
                                                    <label for="hasil" class="col-sm-2 col-form-label">Hasil (M/K/H)</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="M" name="hasil" id="hasil" <?php echo ($data['hasil'] == 'M') ? " checked" : "" ?> required disabled>
                                                            <label class="form-check-label" for="hasil">
                                                                M
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="K" name="hasil" id="hasil2" <?php echo ($data['hasil'] == 'K') ? " checked" : "" ?> required disabled>
                                                            <label class="form-check-label" for="hasil2">
                                                                K</h4>
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="H" name="hasil" id="hasil3" <?php echo ($data['hasil'] == 'H') ? " checked" : "" ?> required disabled>
                                                            <label class="form-check-label" for="hasil3">
                                                                H</h4>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end hasil -->
                                            </div>
                                        <div class="col">
                                            <!-- pemberian_imunisasi_dasar -->
                                            <div class="form-group row">
                                                <label for="pemberian_imunisasi_dasar" class="col-sm-2 col-form-label">Pemberian Imunisasi Dasar</label>
                                                <div class="col-sm-10 mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="Y" name="pemberian_imunisasi_dasar" id="pemberian_imunisasi_dasar" <?php echo ($data['pemberian_imunisasi_dasar'] == 'Y') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="pemberian_imunisasi_dasar">
                                                            Y
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="T" name="pemberian_imunisasi_dasar" id="pemberian_imunisasi_dasar2" <?php echo ($data['pemberian_imunisasi_dasar'] == 'T') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="pemberian_imunisasi_dasar2">
                                                            T
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="TS" name="pemberian_imunisasi_dasar" id="pemberian_imunisasi_dasar3" <?php echo ($data['pemberian_imunisasi_dasar'] == 'TS') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="pemberian_imunisasi_dasar3">
                                                            TS
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end pemberian_imunisasi_dasar -->
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col">
                                            <!-- berat_badan -->
                                            <div class="form-group row">
                                                <label for="berat_badan" class="col-sm-2 col-form-label">Pengukuran Berat Badan</label>
                                                <div class="col-sm-10 mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="Y" name="berat_badan" id="berat_badan" <?php echo ($data['berat_badan'] == 'Y') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="berat_badan">
                                                            Y
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="T" name="berat_badan" id="berat_badan2" <?php echo ($data['berat_badan'] == 'T') ? " checked" : "" ?>  required>
                                                        <label class="form-check-label" for="berat_badan2">
                                                            T
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="TS" name="berat_badan" id="berat_badan3" <?php echo ($data['berat_badan'] == 'TS') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="berat_badan3">
                                                            TS
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end konseling gizi -->
                                        </div>
                                        <div class="col">
                                            <!-- tinggi_badan -->
                                            <div class="form-group row">
                                                <label for="tinggi_badan" class="col-sm-2 col-form-label">Pengukuran Tinggi Badan</label>
                                                <div class="col-sm-10 mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="Y" name="tinggi_badan" id="tinggi_badan" <?php echo ($data['tinggi_badan'] == 'Y') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="tinggi_badan">
                                                            Y
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="T" name="tinggi_badan" id="tinggi_badan2" <?php echo ($data['tinggi_badan'] == 'T') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="tinggi_badan2">
                                                            T
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="TS" name="tinggi_badan" id="tinggi_badan3" <?php echo ($data['tinggi_badan'] == 'TS') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="tinggi_badan3">
                                                            TS
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end tinggi_badan -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <!-- k1L -->
                                            <div class="form-group row">
                                                <label for="k1L" class="col-sm-2 col-form-label">k1 (L)</label>
                                                <div class="col-sm-10 mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="Y" name="k1L" id="k1L" <?php echo ($data['k1L'] == 'Y') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="k1L">
                                                            Y
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="T" name="k1L" id="k1L2" <?php echo ($data['k1L'] == 'T') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="k1L2">
                                                            T
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="TS" name="k1L" id="k1L3" <?php echo ($data['k1L'] == 'TS') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="k1L3">
                                                            TS
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end kepemilikan air bersih -->
                                        </div>
                                        <div class="col">
                                            <!-- k2P -->
                                            <div class="form-group row">
                                                <label for="k2P" class="col-sm-2 col-form-label">k2 (P)</label>
                                                <div class="col-sm-10 mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="Y" name="k2P" id="k2P" <?php echo ($data['k2P'] == 'Y') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="k2P">
                                                            Y
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="T" name="k2P" id="k2P2" <?php echo ($data['k2P'] == 'T') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="k2P2">
                                                            T
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="TS" name="k2P" id="k2P3" <?php echo ($data['k2P'] == 'TS') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="k2P3">
                                                            TS
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end k2P -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <!-- kunjungan_rumah -->
                                            <div class="form-group row">
                                                <label for="kunjungan_rumah" class="col-sm-2 col-form-label">Kunjungan Rumah</label>
                                                <div class="col-sm-10 mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="Y" name="kunjungan_rumah" id="kunjungan_rumah" <?php echo ($data['kunjungan_rumah'] == 'Y') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="kunjungan_rumah">
                                                            Y
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="T" name="kunjungan_rumah" id="kunjungan_rumah2" <?php echo ($data['kunjungan_rumah'] == 'T') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="kunjungan_rumah2">
                                                            T
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="TS" name="kunjungan_rumah" id="kunjungan_rumah3" <?php echo ($data['kunjungan_rumah'] == 'TS') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="kunjungan_rumah3">
                                                            TS
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end kunjungan_rumah -->
                                        </div>
                                        <div class="col">
                                            <!-- kepemilikan air bersih -->
                                            <div class="form-group row">
                                                <label for="kepem_air_bersih" class="col-sm-2 col-form-label">Kepemilikan Akses Air Bersih</label>
                                                <div class="col-sm-10 mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="Y" name="kepem_air_bersih" id="kepem_air_bersih" <?php echo ($data['kepem_air_bersih'] == 'Y') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="kepem_air_bersih">
                                                            Y
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="T" name="kepem_air_bersih" id="kepem_air_bersih2" <?php echo ($data['kepem_air_bersih'] == 'T') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="kepem_air_bersih2">
                                                            T
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="TS" name="kepem_air_bersih" id="kepem_air_bersih3" <?php echo ($data['kepem_air_bersih'] == 'TS') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="kepem_air_bersih3">
                                                            TS
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end kepemilikan air bersih -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                        <!-- kepemilikan jamban -->
                                            <div class="form-group row">
                                                <label for="kepem_jamban" class="col-sm-2 col-form-label">Kepemilikan Jamban</label>
                                                <div class="col-sm-10 mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="Y" name="kepem_jamban" id="kepem_jamban" <?php echo ($data['kepem_jamban'] == 'Y') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="kepem_jamban">
                                                            Y
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="T" name="kepem_jamban" id="kepem_jamban2" <?php echo ($data['kepem_air_bersih'] == 'T') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="kepem_jamban2">
                                                            T
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="TS" name="kepem_jamban" id="kepem_jamban3" <?php echo ($data['kepem_jamban'] == 'TS') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="kepem_jamban3">
                                                            TS
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end kepemilikan jamban -->
                                        </div>
                                        <div class="col">
                                            <!-- akta_lahir -->
                                            <div class="form-group row">
                                                <label for="akta_lahir" class="col-sm-2 col-form-label">Akta Lahir</label>
                                                <div class="col-sm-10 mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="Y" name="akta_lahir" id="akta_lahir" <?php echo ($data['akta_lahir'] == 'Y') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="akta_lahir">
                                                            Y
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="T" name="akta_lahir" id="akta_lahir2" <?php echo ($data['akta_lahir'] == 'T') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="akta_lahir2">
                                                            T
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="TS" name="akta_lahir" id="akta_lahir3" <?php echo ($data['akta_lahir'] == 'TS') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="akta_lahir3">
                                                            TS
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end akta_lahir -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                        <!-- jamkes -->
                                            <div class="form-group row">
                                                <label for="jamkes" class="col-sm-2 col-form-label">Jaminan Kesehatan</label>
                                                <div class="col-sm-10 mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="Y" name="jamkes" id="jamkes" <?php echo ($data['jamkes'] == 'Y') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="jamkes">
                                                            Y
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="T" name="jamkes" id="jamkes2" <?php echo ($data['jamkes'] == 'T') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="jamkes2">
                                                            T
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="TS" name="jamkes" id="jamkes3" <?php echo ($data['jamkes'] == 'TS') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="jamkes3">
                                                            TS
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end jamkes -->
                                        </div>
                                        <div class="col">
                                            <!-- pengasuhan_paud -->
                                            <div class="form-group row">
                                                <label for="pengasuhan_paud" class="col-sm-2 col-form-label">Pengasuhan (Paud)</label>
                                                <div class="col-sm-10 mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="Y" name="pengasuhan_paud" id="pengasuhan_paud" <?php echo ($data['pengasuhan_paud'] == 'Y') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="pengasuhan_paud">
                                                            Y
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="T" name="pengasuhan_paud" id="pengasuhan_paud2" <?php echo ($data['pengasuhan_paud'] == 'T') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="pengasuhan_paud2">
                                                            T
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="TS" name="pengasuhan_paud" id="pengasuhan_paud3" <?php echo ($data['pengasuhan_paud'] == 'TS') ? " checked" : "" ?> required>
                                                        <label class="form-check-label" for="pengasuhan_paud3">
                                                            TS
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end pengasuhan_paud -->
                                        </div>
                                    </div>
                                    
                                    <a class="btn btn-secondary btn-sm mb-3" href="formulir2B.php"><i class="fa fa fa-arrow-left"></i> Batal</a>
                                    <button type="submit" class="btn btn-success btn-sm mb-3" name="edit"><i class="fa fa fa-save"></i> Simpan</button>
                                </form>
                            </div>
                        </div>
                    </section>
                    </section>

<?php include '../../template/footer.php'; ?>