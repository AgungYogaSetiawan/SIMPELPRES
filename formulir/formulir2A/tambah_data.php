<?php
    session_start();
    include '../../setting/koneksi.php';

    $kel = $_SESSION['username'];
    $stat = $_SESSION['status'];

    // cek apakah yang mengakses halaman ini sudah login
    if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
        header("location:../../login/halaman_login.php");
    } 

    if(isset($_POST['tambah'])){
        $id_bumil =  $_POST['id_bumil'];
        $pemeriksaan_kehamilan =  $_POST['pemeriksaan_kehamilan'];
        $dapat_pilfe =  $_POST['dapat_pilfe'];
        $pemeriksaan_nifas = $_POST['pemeriksaan_nifas'];
        $konseling_gizi =  $_POST['konseling_gizi'];
        $kunjungan_rumah =  $_POST['kunjungan_rumah'];
        $kepem_air_bersih =  $_POST['kepem_air_bersih'];
        $kepem_jamban =  $_POST['kepem_jamban'];
        $jamkes =  $_POST['jamkes'];

        // menyimpan data ke tabel formulir 2a
        $sql = "INSERT INTO tb_formulir2a (id_bumil,pemeriksaan_kehamilan,dapat_pilfe,pemeriksaan_nifas,konseling_gizi,kunjungan_rumah,kepem_air_bersih,kepem_jamban,jamkes) VALUES ('$id_bumil','$pemeriksaan_kehamilan','$dapat_pilfe','$pemeriksaan_nifas','$konseling_gizi','$kunjungan_rumah','$kepem_air_bersih','$kepem_jamban','$jamkes')";
        $result = mysqli_query($konek,$sql);
        
        if($result){
            echo "<script>alert('Data Berhasil Ditambahkan');</script>";
            echo '<meta http-equiv="refresh" content="1;url=formulir2A.php">';
        } else {
            echo "<script>alert('Data Gagal Ditambahkan');</script>";
        }
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

    <title>Laporan 2.A - Tambah Data</title>

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
                    <!-- form tambah data -->
                    <div class="card mb-4 mt-2">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold">Tambah Data Laporan 2A Pemantauan Bulanan Ibu Hamil</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <!-- nama ibu -->
                                        <div class="form-group row">
                                            <label for="id_bumil" class="col-sm-2 col-form-label">Nama Ibu</label>
                                            <div class="col-sm-10 mt-2">
                                                <select class="form-select select2" name="id_bumil" id="id_bumil" style="width: 250px;">
                                                <?php
                                                    include "../../setting/koneksi.php";
                                                    if($stat == 'pegawai' or $_SESSION['status'] == 'administrator'){
                                                        $query = mysqli_query($konek, "SELECT * FROM tb_bumil ORDER BY id_bumil");
                                                    } else {
                                                        $query = mysqli_query($konek, "SELECT * FROM tb_bumil WHERE kelurahan='$kel' ORDER BY id_bumil");
                                                    }
                                                    
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <option value="<?=$data['id_bumil'];?>"><?php echo $data['nama_ibu'];?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end nama ibu -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- pemeriksaan kehamilan -->
                                        <div class="form-group row">
                                            <label for="pemeriksaan_kehamilan" class="col-sm-2 col-form-label">Pemeriksaan Kehamilan</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="pemeriksaan_kehamilan" id="pemeriksaan_kehamilan" required>
                                                    <label class="form-check-label" for="pemeriksaan_kehamilan">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="pemeriksaan_kehamilan" id="pemeriksaan_kehamilan2" required>
                                                    <label class="form-check-label" for="pemeriksaan_kehamilan2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="pemeriksaan_kehamilan" id="pemeriksaan_kehamilan3" required>
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
                                                    <input class="form-check-input" type="radio" value="Y" name="dapat_pilfe" id="dapat_pilfe" required>
                                                    <label class="form-check-label" for="dapat_pilfe">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="dapat_pilfe" id="dapat_pilfe2" required>
                                                    <label class="form-check-label" for="dapat_pilfe2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="dapat_pilfe" id="dapat_pilfe3" required>
                                                    <label class="form-check-label" for="dapat_pilfe3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end dapat konsumsi pil fe -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- pemeriksaan_nifas -->
                                        <div class="form-group row">
                                            <label for="pemeriksaan_nifas" class="col-sm-2 col-form-label">Pemeriksaan Nifas</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="pemeriksaan_nifas" id="pemeriksaan_nifas" required>
                                                    <label class="form-check-label" for="pemeriksaan_nifas">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="pemeriksaan_nifas" id="pemeriksaan_nifas2" required>
                                                    <label class="form-check-label" for="pemeriksaan_nifas3">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="pemeriksaan_nifas" id="pemeriksaan_nifas2" required>
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
                                                    <input class="form-check-input" type="radio" value="Y" name="konseling_gizi" id="konseling_gizi" required>
                                                    <label class="form-check-label" for="konseling_gizi">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="konseling_gizi" id="konseling_gizi2" required>
                                                    <label class="form-check-label" for="konseling_gizi2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="konseling_gizi" id="konseling_gizi3" required>
                                                    <label class="form-check-label" for="konseling_gizi3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end konseling gizi -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- Kunjungan Rumah -->
                                        <div class="form-group row">
                                            <label for="kunjungan_rumah" class="col-sm-2 col-form-label">Kunjungan Rumah</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="kunjungan_rumah" id="kunjungan_rumah" required>
                                                    <label class="form-check-label" for="kunjungan_rumah">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="kunjungan_rumah" id="kunjungan_rumah2" required>
                                                    <label class="form-check-label" for="kunjungan_rumah">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="kunjungan_rumah" id="kunjungan_rumah3" required>
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
                                            <label for="kepem_air_bersih" class="col-sm-2 col-form-label">Kepemilikan Akses Air Bersih</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="kepem_air_bersih" id="kepem_air_bersih" required>
                                                    <label class="form-check-label" for="kepem_air_bersih">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="kepem_air_bersih" id="kepem_air_bersih2" required>
                                                    <label class="form-check-label" for="kepem_air_bersih2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="kepem_air_bersih" id="kepem_air_bersih3" required>
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
                                                    <input class="form-check-input" type="radio" value="Y" name="kepem_jamban" id="kepem_jamban" required>
                                                    <label class="form-check-label" for="kepem_jamban">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="kepem_jamban" id="kepem_jamban2" required>
                                                    <label class="form-check-label" for="kepem_jamban2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="kepem_jamban" id="kepem_jamban3" required>
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
                                                    <input class="form-check-input" type="radio" value="Y" name="jamkes" id="jamkes" required>
                                                    <label class="form-check-label" for="jamkes">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="jamkes" id="jamkes2" required>
                                                    <label class="form-check-label" for="jamkes2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="jamkes" id="jamkes3" required>
                                                    <label class="form-check-label" for="jamkes3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end jamkes -->
                                    </div>
                                </div>
                                
                                <a class="btn btn-secondary btn-sm mb-3" href="formulir2A.php"><i class="fa fa fa-arrow-left"></i> Batal</a>
                                <button type="submit" class="btn btn-success btn-sm mb-3" name="tambah"><i class="fa fa fa-plus"></i> Tambah Data</button>
                            </form>
                        </div>
                    </div>
                    </section>
                    </section>

<?php include '../../template/footer.php'; ?>