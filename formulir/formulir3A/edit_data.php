<?php
    session_start();
    include '../../setting/koneksi.php';

    // cek apakah yang mengakses halaman ini sudah login
    if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
        header("location:../../login/halaman_login.php");
    } 

    $id_formulir_tigaA = $_GET['id_formulir_tigaA'];
    $sql = "SELECT * FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE a.id_formulir_tigaA='$id_formulir_tigaA'";
    $result = mysqli_query($konek,$sql);
    $data = mysqli_fetch_array($result);


    if(isset($_POST['edit'])){
        $id_formulir_tigaA = $_POST['id_formulir_tigaA'];
        $jml_diterima_lengkap = $_POST['jml_diterima_lengkap'];
        $persen = $_POST['persen'];

        // simpan data ke tabel formulit 3a
        $sql = "UPDATE tb_formulir3a SET jml_diterima_lengkap = '$jml_diterima_lengkap', persen = '$persen' WHERE id_formulir_tigaA = '$id_formulir_tigaA'";
        mysqli_query($konek,$sql);

        echo "<script>alert('Data Berhasil Diubah');</script>";
        echo '<meta http-equiv="refresh" content="1;url=formulir3A.php">';
        
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

    <title>Laporan 3.A - Edit Data</title>

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
                        <a class="collapse-item" href="formulir3A.php" data-toggle="tooltip" data-placement="top" title="Data Rekapitulasi Hasil Pemantauan Tiga Bulanan Ibu Hamil">Data Laporan 3.A</a>
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
                            <h6 class="m-0 font-weight-bold">Edit Data Laporan 3A Rekapitulasi Hasil Pemantauan 3 (Tiga) Bulanan Bagi Ibu Hamil</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <input type="hidden" id="id_formulir_tigaA" name="id_formulir_tigaA" value="<?php echo $data['id_formulir_tigaA']; ?>" readonly>
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
                                                <!-- nama ibu -->
                                                <div class="form-group row">
                                                    <label for="nama_ibu" class="col-sm-2 col-form-label">Nama Ibu</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" style="width: 250px;" value="<?php echo $data['nama_ibu']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <!-- end nama ibu -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <!-- status_kehamilan -->
                                                <div class="form-group row">
                                                    <label for="status_kehamilan" class="col-sm-2 col-form-label">Status Kehamilan</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="KEK" name="status_kehamilan" id="status_kehamilan" <?php echo ($data['status_kehamilan'] == 'KEK') ? " checked" : "" ?> required disabled>
                                                            <label class="form-check-label" for="status_kehamilan">
                                                                KEK
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="RISTI" name="status_kehamilan" id="status_kehamilan2" <?php echo ($data['status_kehamilan'] == 'RISTI') ? " checked" : "" ?> required disabled>
                                                            <label class="form-check-label" for="status_kehamilan2">
                                                                RISTI
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="NORMAL" name="status_kehamilan" id="status_kehamilan3" <?php echo ($data['status_kehamilan'] == 'NORMAL') ? " checked" : "" ?> required disabled>
                                                            <label class="form-check-label" for="status_kehamilan3">
                                                                NORMAL
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end status kehamilan -->
                                            </div>
                                            <div class="col">
                                                <!-- hari perkiraan lahir -->
                                                <div class="form-group row">
                                                    <label for="hari_perkiraan_lahir" class="col-sm-2 col-form-label">Hari Perkiraan Lahir</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <input type="date" class="form-control" name="hari_perkiraan_lahir" id="hari_perkiraan_lahir" placeholder="Hari Perkiraan Lahir" style="width: 250px;" value="<?php echo $data['hari_perkiraan_lahir']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <!-- end hari perkiraan lahir -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <!-- usia kehamilan -->
                                                <div class="form-group row">
                                                    <label for="usia_kehamilan" class="col-sm-2 col-form-label">Usia Kehamilan</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <input type="text" class="form-control" name="usia_kehamilan" id="usia_kehamilan" placeholder="Usia Kehamilan" style="width: 250px;" value="<?php echo $data['usia_kehamilan']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <!-- end usia kehamilan -->
                                            </div>
                                            <div class="col">
                                        <!-- pemeriksaan kehamilan -->
                                        <div class="form-group row">
                                            <label for="pemeriksaan_kehamilan" class="col-sm-2 col-form-label">Pemeriksaan Kehamilan</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="pemeriksaan_kehamilan" id="pemeriksaan_kehamilan" <?php echo ($data['pemeriksaan_kehamilan'] == 'Y') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="pemeriksaan_kehamilan">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="pemeriksaan_kehamilan" id="pemeriksaan_kehamilan2" <?php echo ($data['pemeriksaan_kehamilan'] == 'T') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="pemeriksaan_kehamilan2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="pemeriksaan_kehamilan" id="pemeriksaan_kehamilan3" <?php echo ($data['pemeriksaan_kehamilan'] == 'TS') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="pemeriksaan_kehamilan3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end pemeriksaan kehamilan -->
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                        <!-- dapat konsum pil fe -->
                                        <div class="form-group row">
                                            <label for="dapat_pilfe" class="col-sm-2 col-form-label">Dapat Konsumsi Pil Fe</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="dapat_pilfe" id="dapat_pilfe" <?php echo ($data['dapat_pilfe'] == 'Y') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="dapat_pilfe">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="dapat_pilfe" id="dapat_pilfe2" <?php echo ($data['dapat_pilfe'] == 'T') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="dapat_pilfe2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="dapat_pilfe" id="dapat_pilfe3" <?php echo ($data['dapat_pilfe'] == 'TS') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="dapat_pilfe3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end dapat konsumsi pil fe -->
                                        </div>
                                        <div class="col">
                                        <!-- pemeriksaan_nifas -->
                                        <div class="form-group row">
                                            <label for="pemeriksaan_nifas" class="col-sm-2 col-form-label">Pemeriksaan Nifas</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="pemeriksaan_nifas" id="pemeriksaan_nifas" <?php echo ($data['pemeriksaan_nifas'] == 'Y') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="pemeriksaan_nifas">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="pemeriksaan_nifas" id="pemeriksaan_nifas2" <?php echo ($data['pemeriksaan_nifas'] == 'T') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="pemeriksaan_nifas3">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="pemeriksaan_nifas" id="pemeriksaan_nifas2" <?php echo ($data['pemeriksaan_nifas'] == 'TS') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="pemeriksaan_nifas3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end pemeriksaan nifas -->
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- konseling gizi -->
                                        <div class="form-group row">
                                            <label for="konseling_gizi" class="col-sm-2 col-form-label">Konseling Gizi (Kelas IH)</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="konseling_gizi" id="konseling_gizi" <?php echo ($data['konseling_gizi'] == 'Y') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="konseling_gizi">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="konseling_gizi" id="konseling_gizi2" <?php echo ($data['konseling_gizi'] == 'T') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="konseling_gizi2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="konseling_gizi" id="konseling_gizi3" <?php echo ($data['konseling_gizi'] == 'TS') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="konseling_gizi3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end konseling gizi -->
                                    </div>
                                    <div class="col">
                                        <!-- Kunjungan Rumah -->
                                        <div class="form-group row">
                                            <label for="kunjungan_rumah" class="col-sm-2 col-form-label">Kunjungan Rumah</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="kunjungan_rumah" id="kunjungan_rumah" <?php echo ($data['kunjungan_rumah'] == 'Y') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="kunjungan_rumah">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="kunjungan_rumah" id="kunjungan_rumah2" <?php echo ($data['kunjungan_rumah'] == 'T') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="kunjungan_rumah">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="kunjungan_rumah" id="kunjungan_rumah3" <?php echo ($data['kunjungan_rumah'] == 'TS') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="kunjungan_rumah3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end kunjungan rumah -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- kepemilikan air bersih -->
                                        <div class="form-group row">
                                            <label for="kepem_air_bersih" class="col-sm-2 col-form-label">Kepemlikan Akses Air Bersih</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="kepem_air_bersih" id="kepem_air_bersih" <?php echo ($data['kepem_air_bersih'] == 'Y') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="kepem_air_bersih">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="kepem_air_bersih" id="kepem_air_bersih2" <?php echo ($data['kepem_air_bersih'] == 'T') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="kepem_air_bersih2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="kepem_air_bersih" id="kepem_air_bersih3" <?php echo ($data['kepem_air_bersih'] == 'TS') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="kepem_air_bersih3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end kepemilikan air bersih -->
                                    </div>
                                    <div class="col">
                                        <!-- kepemilikan jamban -->
                                        <div class="form-group row">
                                            <label for="kepem_jamban" class="col-sm-2 col-form-label">Kepemlikan Jamban</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="kepem_jamban" id="kepem_jamban" <?php echo ($data['kepem_jamban'] == 'Y') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="kepem_jamban">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="kepem_jamban" id="kepem_jamban2" <?php echo ($data['kepem_jamban'] == 'T') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="kepem_jamban2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="kepem_jamban" id="kepem_jamban3" <?php echo ($data['kepem_jamban'] == 'TS') ? " checked" : "" ?> required disabled>
                                                    <label class="form-check-label" for="kepem_jamban3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end kepemilikan jamban -->
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
                                        <!-- jumlah diterima lengkap -->
                                        <div class="form-group row">
                                            <label for="jml_diterima_lengkap" class="col-sm-2 col-form-label">Jumlah Diterima Lengkap</label>
                                            <div class="col-sm-10 mt-2">
                                                <input type="text" class="form-control" name="jml_diterima_lengkap" id="jml_diterima_lengkap" placeholder="Jumlah Diterima Lengkap" style="width: 250px;" onkeyup="hitungPersen()" value="<?php echo $data['jml_diterima_lengkap']; ?>">
                                            </div>
                                        </div>
                                        <!-- end jumlah diterima lengkap -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- persen -->
                                        <div class="form-group row">
                                            <label for="persen" class="col-sm-2 col-form-label">Persen</label>
                                            <div class="col-sm-10 mt-2">
                                                <input type="text" class="form-control" name="persen" id="persen" placeholder="Persen" style="width: 250px;" value="<?php echo $data['persen']; ?>">
                                            </div>
                                        </div>
                                        <!-- end persen -->
                                    </div>
                                </div>
                                
                                <a class="btn btn-secondary btn-sm mb-3" href="formulir3A.php"><i class="fa fa fa-arrow-left"></i> Batal</a>
                                <button class="btn btn-success btn-sm mb-3" name="edit"><i class="fa fa fa-save"></i> Simpan</button>
                            </form>
                        </div>
                    </div>
                    </section>
                    </section>

<?php include '../../template/footer.php';?>