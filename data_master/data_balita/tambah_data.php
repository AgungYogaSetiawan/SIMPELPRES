<?php
    session_start();
    include '../../setting/db.php';

    $kel = $_SESSION['username'];
    // cek apakah yang mengakses halaman ini sudah login
    if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
        header("location:../../login/halaman_login.php");
    } 

    if(isset($_POST['tambah'])){
        $kelurahan = $_POST['kelurahan'];
        $kecamatan = $_POST['kecamatan'];
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $no_rmh_tangga = $_POST['no_rmh_tangga'];
        $nama_anak =  $_POST['nama_anak'];
        $jk =  $_POST['jk'];
        $tgl_lahir =  $_POST['tgl_lahir'];
        $usia_anak  = $_POST['usia_anak'];
        $sql = "INSERT INTO tb_balita VALUES (NULL, '$kelurahan', '$kecamatan', '$bulan', '$tahun', '$no_rmh_tangga','$nama_anak','$jk','$tgl_lahir','$usia_anak')";

        $database = new Database();
        $connection = $database->getConnection();
        $statement = $connection->prepare($sql);
        $statement->bindParam(1, $kelurahan);
        $statement->bindParam(2, $kecamatan);
        $statement->bindParam(3, $bulan);
        $statement->bindParam(4, $tahun);
        $statement->bindParam(5, $no_rmh_tangga);
        $statement->bindParam(6, $nama_anak);
        $statement->bindParam(7, $jk);
        $statement->bindParam(8, $tgl_lahir);
        $statement->bindParam(9, $usia_anak);
        $statement->execute();
        echo "<script>alert('Data Berhasil Ditambahkan');</script>";
        echo '<meta http-equiv="refresh" content="1;url=data_balita.php">';
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

    <title>Data Anak >2-6 Tahun - Tambah Data</title>

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
                        <div class="card mb-4 mt-2">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold">Tambah Data Anak >2-6 Tahun</h6>
                            </div>
                            <div class="card-body">
                                    <br>
                                    <form action="" method="POST">
                                        <div class="row">
                                            <div class="col">
                                                <!-- no register -->
                                                <div class="form-group row">
                                                    <label for="kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <select class="form-select select2" name="kelurahan" id="kelurahan" style="width: 250px;">
                                                            <option >--Pilih Kelurahan--</option>
                                                            <?php
                                                            include '../../setting/koneksi.php';
                                                            if($stat == 'pegawai' or $_SESSION['status'] == 'administrator'){
                                                                $query = mysqli_query($konek, "SELECT * FROM tb_kelurahan");
                                                            } else {
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
                                                </div>
                                                <!-- end no register -->
                                            </div>
                                            <div class="col">
                                                <!-- kecamatan -->
                                                <div class="form-group row">
                                                    <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select select2" name="kecamatan" id="kecamatan" style="width: 250px;">
                                                        <option >--Pilih Kecamatan--</option>
                                                        <?php
                                                        include '../../setting/koneksi.php';
                                                        //query menampilkan nama unit kerja ke dalam combobox
                                                        $query = mysqli_query($konek, "SELECT * FROM tb_kecamatan GROUP BY kecamatan ORDER BY kecamatan");
                                                        while ($data = mysqli_fetch_array($query)) {
                                                        ?>
                                                        <option value="<?=$data['kecamatan'];?>"><?php echo $data['kecamatan'];?></option>
                                                        <?php
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
                                                            <option >--Pilih Bulan--</option>
                                                            <option value="Januari">Januari</option>
                                                            <option value="Februari">Februari</option>
                                                            <option value="Maret">Maret</option>
                                                            <option value="April">April</option>
                                                            <option value="Mei">Mei</option>
                                                            <option value="Juni">Juni</option>
                                                            <option value="Juli">Juli</option>
                                                            <option value="Agustus">Agustus</option>
                                                            <option value="September">September</option>
                                                            <option value="Oktober">Oktober</option>
                                                            <option value="November">November</option>
                                                            <option value="Desember">Desember</option>
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
                                                            <option >--Pilih Tahun--</option>
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
                                                <!-- end tahun -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <!-- no_rmh_tangga -->
                                                <div class="form-group row">
                                                    <label for="no_rmh_tangga" class="col-sm-2 col-form-label">No Rumah Tangga</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <input type="text" class="form-control" name="no_rmh_tangga" id="no_rmh_tangga" placeholder="No Rumah Tangga" style="width: 250px;">
                                                    </div>
                                                </div>
                                                <!-- end no_rmh_tangga -->
                                            </div>
                                            <div class="col">
                                                <!-- nama anak -->
                                                <div class="form-group row">
                                                    <label for="nama_anak" class="col-sm-2 col-form-label">Nama Anak</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <input type="text" class="form-control" name="nama_anak" id="nama_anak" placeholder="Nama Anak" style="width: 250px;">
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
                                                            <input class="form-check-input" type="radio" value="L" name="jk" id="jk" required>
                                                            <label class="form-check-label" for="jk">
                                                                L
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="P" name="jk" id="jk2" required>
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
                                                    <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" style="width: 250px;" onchange="hitungUsia2C()">
                                                    </div>
                                                </div>
                                                <!-- end tanggal lahir anak -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <!-- anak_usia_baduta -->
                                                <div class="form-group row">
                                                    <label for="usia_anak" class="col-sm-2 col-form-label">Usia Anak (Tahun)</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="usia_anak" id="usia_anak" placeholder="Usia Anak (Tahun)" style="width: 250px;">
                                                    </div>
                                                </div>
                                                <!-- end anak_usia_baduta -->
                                            </div>
                                            <div class="col">
                                                <!-- anak_usia_baduta -->
                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <input type="hidden">
                                                    </div>
                                                </div>
                                                <!-- end anak_usia_baduta -->
                                            </div>
                                        </div>
                                        
                                        <a class="btn btn-secondary btn-sm mb-3" href="data_balita.php"><i class="fa fa fa-arrow-left"></i> Batal</a>
                                        <button type="submit" class="btn btn-success btn-sm mb-3" name="tambah"><i class="fa fa fa-plus"></i> Tambah Data</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    </section>

<?php include '../../template/footer.php'; ?>