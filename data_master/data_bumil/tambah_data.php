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
        $no_register = $_POST['no_register'];
        $nama_ibu =  $_POST['nama_ibu'];
        $id_status_kehamilan =  $_POST['id_status_kehamilan'];
        $hari_perkiraan_lahir =  $_POST['hari_perkiraan_lahir'];
        $usia_kehamilan =  $_POST['usia_kehamilan'];
        $sql = "INSERT INTO tb_bumil VALUES (NULL, '$kelurahan', '$kecamatan', '$bulan', '$tahun', '$no_register','$nama_ibu','$id_status_kehamilan','$hari_perkiraan_lahir','$usia_kehamilan')";

        $database = new Database();
        $connection = $database->getConnection();
        $statement = $connection->prepare($sql);
        $statement->bindParam(1, $kelurahan);
        $statement->bindParam(2, $kecamatan);
        $statement->bindParam(3, $bulan);
        $statement->bindParam(4, $tahun);
        $statement->bindParam(5, $no_register);
        $statement->bindParam(6, $nama_ibu);
        $statement->bindParam(7, $id_status_kehamilan);
        $statement->bindParam(8, $hari_perkiraan_lahir);
        $statement->bindParam(9, $usia_kehamilan);
        $statement->execute();
        echo "<script>alert('Data Berhasil Ditambahkan');</script>";
        echo '<meta http-equiv="refresh" content="1;url=data_bumil.php">';
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

    <title>Data Ibu Hamil - Tambah Data</title>

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
                                    <h6 class="m-0 font-weight-bold">Tambah Data Ibu Hamil</h6>
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
                                                                //query menampilkan nama unit kerja ke dalam combobox
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
                                                    <!-- no register -->
                                                    <div class="form-group row">
                                                        <label for="no_register" class="col-sm-2 col-form-label">No Register</label>
                                                        <div class="col-sm-10 mt-2">
                                                            <input type="text" class="form-control" name="no_register" id="no_register" placeholder="No Register" style="width: 250px;">
                                                        </div>
                                                    </div>
                                                    <!-- end no register -->
                                                </div>
                                                <div class="col">
                                                    <!-- nama ibu -->
                                                    <div class="form-group row">
                                                        <label for="nama_ibu" class="col-sm-2 col-form-label">Nama Ibu</label>
                                                        <div class="col-sm-10 mt-2">
                                                            <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" style="width: 250px;">
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
                                                            <select class="form-select select2" name="id_status_kehamilan" id="id_status_kehamilan" style="width: 250px;">
                                                                <option >--Pilih Status Kehamilan--</option>
                                                                <?php
                                                                include '../../setting/koneksi.php';
                                                                //query menampilkan nama unit kerja ke dalam combobox
                                                                $query = mysqli_query($konek, "SELECT * FROM tb_status_kehamilan");
                                                                while ($data = mysqli_fetch_array($query)) {
                                                                ?>
                                                                <option value="<?=$data['id_status_kehamilan'];?>"><?php echo $data['status_kehamilan'];?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- end status kehamilan -->
                                                </div>
                                                <div class="col">
                                                    <!-- hari perkiraan lahir -->
                                                    <div class="form-group row">
                                                        <label for="hari_perkiraan_lahir" class="col-sm-2 col-form-label">Hari Perkiraan Lahir</label>
                                                        <div class="col-sm-10 mt-2">
                                                            <input type="date" class="form-control" name="hari_perkiraan_lahir" id="hari_perkiraan_lahir" placeholder="Hari Perkiraan Lahir" style="width: 250px;">
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
                                                            <input type="text" class="form-control" name="usia_kehamilan" id="usia_kehamilan" placeholder="Usia Kehamilan (Bulan)" style="width: 250px;">
                                                        </div>
                                                    </div>
                                                    <!-- end usia kehamilan -->
                                                </div>
                                                <div class="col">
                                                    <!-- tgl melahirkan -->
                                                    <div class="form-group row">
                                                        <div class="col-sm-10 mt-2">
                                                            <input type="hidden" class="form-control">
                                                        </div>
                                                    </div>
                                                    <!-- end tgl melahirkan -->
                                                </div>
                                            </div>
                                            <a class="btn btn-secondary btn-sm mb-3" href="data_bumil.php"><i class="fa fa fa-arrow-left"></i> Batal</a>
                                            <button type="submit" class="btn btn-success btn-sm mb-3" name="tambah"><i class="fa fa fa-plus"></i> Tambah Data</button>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </section>

<?php include '../../template/footer.php'; ?>