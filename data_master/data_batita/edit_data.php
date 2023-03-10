<?php
    session_start();
    include '../../setting/db.php';

    // cek apakah yang mengakses halaman ini sudah login
    if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
        header("location:../../login/halaman_login.php");
    } 

    $id_baduta = $_GET['id_baduta'];
    $findSQL = "SELECT * FROM tb_baduta WHERE id_baduta = ?";
    $database = new Database();
    $connection = $database->getConnection();
    $statement = $connection->prepare($findSQL);
    $statement->bindParam(1, $id_baduta);
    $statement->execute();
    $data = $statement->fetch();

    if(isset($_POST['edit'])){
        $id_baduta = $_POST['id_baduta'];
        $kelurahan = $_POST['kelurahan'];
        $kecamatan = $_POST['kecamatan'];
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $no_register = $_POST['no_register'];
        $nama_anak =  $_POST['nama_anak'];
        $jk =  $_POST['jk'];
        $tgl_lahir_anak =  $_POST['tgl_lahir_anak'];
        $status_gizi_anak =  $_POST['status_gizi_anak'];
        $umur =  $_POST['umur'];
        $hasil = $_POST['hasil'];
        $sql = "UPDATE `tb_baduta` SET `kelurahan` = ?, `kecamatan` = ?, `bulan` = ?, `tahun` = ?, `no_register` = ?, `nama_anak` = ?, `jk` = ?, `tgl_lahir_anak` = ?, `status_gizi_anak` = ?, `umur` = ?, `hasil` = ? WHERE `tb_baduta`.`id_baduta` = ?";

        $database = new Database();
        $connection = $database->getConnection();
        $statement = $connection->prepare($sql);
        $statement->bindParam(1, $kelurahan);
        $statement->bindParam(2, $kecamatan);
        $statement->bindParam(3, $bulan);
        $statement->bindParam(4, $tahun);
        $statement->bindParam(5, $no_register);
        $statement->bindParam(6, $nama_anak);
        $statement->bindParam(7, $jk);
        $statement->bindParam(8, $tgl_lahir_anak);
        $statement->bindParam(9, $status_gizi_anak);
        $statement->bindParam(10, $umur);
        $statement->bindParam(11, $hasil);
        $statement->bindParam(12, $id_baduta);
        $statement->execute();
        echo "<script>alert('Data Berhasil Diubah');</script>";
        echo '<meta http-equiv="refresh" content="1;url=data_batita.php">';
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

    <title>Data Anak 0-2 Tahun - Edit Data</title>

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
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../data_kecamatan.php">Data Kecamatan</a>
                        <a class="collapse-item" href="../data_kelurahan.php">Data Kelurahan</a>
                        <a class="collapse-item" href="../data_bumil/data_bumil.php">Data Ibu Hamil</a>
                        <a class="collapse-item" href="data_batita.php">Data Anak 0-2 Tahun</a>
                        <a class="collapse-item" href="../data_balita/data_balita.php">Data Anak >2-6 Tahun</a>
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
                                <h6 class="m-0 font-weight-bold">Edit Data Anak 0-2 Tahun</h6>
                            </div>
                            <div class="card-body">
                                    <br>
                                    <form action="" method="POST">
                                        <input type="hidden" id="id_baduta" name="id_baduta" value="<?php echo $data['id_baduta']; ?>" readonly>
                                        <div class="row">
                                            <div class="col">
                                                <!-- kelurahan -->
                                                <div class="form-group row">
                                                    <label for="kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select select2" name="kelurahan" id="kelurahan" style="width: 250px;">
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
                                                        <select class="form-select select2" name="kecamatan" id="kecamatan" style="width: 250px;">
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
                                                        <select class="form-select select2" name="bulan" id="bulan" style="width: 250px;">
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
                                                        <select class="form-select select2" name="tahun" id="tahun" style="width: 250px;">
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
                                                        <input type="text" class="form-control" name="no_register" id="no_register" placeholder="No Register" style="width: 250px;" value="<?php echo $data['no_register']; ?>">
                                                    </div>
                                                </div>
                                                <!-- end no register -->
                                            </div>
                                            <div class="col">
                                                <!-- nama anak -->
                                                <div class="form-group row">
                                                    <label for="nama_anak" class="col-sm-2 col-form-label">Nama Anak</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <input type="text" class="form-control" name="nama_anak" id="nama_anak" placeholder="Nama Anak" style="width: 250px;" value="<?php echo $data['nama_anak']; ?>">
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
                                                            <input class="form-check-input" type="radio" value="L" name="jk" id="jk" <?php echo ($data['jk'] == 'L') ? " checked" : "" ?> required>
                                                            <label class="form-check-label" for="jk">
                                                                L
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="P" name="jk" id="jk2" <?php echo ($data['jk'] == 'P') ? " checked" : "" ?> required>
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
                                                        <input type="date" class="form-control" name="tgl_lahir_anak" id="tgl_lahir_anak" placeholder="Tanggal Lahir Anak" style="width: 250px;" value="<?php echo $data['tgl_lahir_anak']; ?>" onchange="hitungUmur()">
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
                                                            <input class="form-check-input" type="radio" value="N" name="status_gizi_anak" id="status_gizi_anak" <?php echo ($data['status_gizi_anak'] == 'N') ? " checked" : "" ?> required>
                                                            <label class="form-check-label" for="status_gizi_anak">
                                                                NORMAL
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="BURUK" name="status_gizi_anak" id="status_gizi_anak2" <?php echo ($data['status_gizi_anak'] == 'BURUK') ? " checked" : "" ?> required>
                                                            <label class="form-check-label" for="status_gizi_anak2">
                                                                BURUK
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="KURANG" name="status_gizi_anak" id="status_gizi_anak3" <?php echo ($data['status_gizi_anak'] == 'KURANG') ? " checked" : "" ?> required>
                                                            <label class="form-check-label" for="status_gizi_anak3">
                                                                KURANG
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="STUNTING" name="status_gizi_anak" id="status_gizi_anak4" <?php echo ($data['status_gizi_anak'] == 'STUNTING') ? " checked" : "" ?> required>
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
                                                        <input type="text" class="form-control" name="umur" id="umur" placeholder="Umur" style="width: 250px;" value="<?php echo $data['umur']; ?>">
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
                                                            <input class="form-check-input" type="radio" value="M" name="hasil" id="hasil" <?php echo ($data['hasil'] == 'M') ? " checked" : "" ?> required>
                                                            <label class="form-check-label" for="hasil">
                                                                M
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="K" name="hasil" id="hasil2" <?php echo ($data['hasil'] == 'K') ? " checked" : "" ?> required>
                                                            <label class="form-check-label" for="hasil2">
                                                                K</h4>
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="H" name="hasil" id="hasil3" <?php echo ($data['hasil'] == 'H') ? " checked" : "" ?> required>
                                                            <label class="form-check-label" for="hasil3">
                                                                H</h4>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end hasil -->
                                            </div>
                                            <div class="col">
                                                <!-- hasil -->
                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <input type="hidden">
                                                    </div>
                                                </div>
                                                <!-- end hasil -->
                                            </div>
                                        </div>
                                        
                                        <a class="btn btn-secondary btn-sm mb-3" href="data_batita.php"><i class="fa fa fa-arrow-left"></i> Batal</a>
                                        <button type="submit" class="btn btn-success btn-sm mb-3" name="edit"><i class="fa fa fa-save"></i> Simpan</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    </section>

<?php include '../../template/footer.php'; ?>