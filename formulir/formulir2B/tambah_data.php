<?php
    session_start();
    include '../../setting/koneksi.php';

    $kel = $_SESSION['username'];

    // cek apakah yang mengakses halaman ini sudah login
    if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
        header("location:../../login/halaman_login.php");
    } 

    if(isset($_POST['tambah'])){
        $id_baduta = $_POST['id_baduta'];
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

        // simpan ke tabel formulir2b
        $sql = mysqli_query($konek,"INSERT INTO tb_formulir2b (id_baduta, pemberian_imunisasi_dasar,berat_badan,tinggi_badan,k1L,k2P,kunjungan_rumah,kepem_air_bersih,kepem_jamban,akta_lahir,jamkes,pengasuhan_paud) VALUES ('$id_baduta','$pemberian_imunisasi_dasar','$berat_badan','$tinggi_badan','$k1L','$k2P','$kunjungan_rumah','$kepem_air_bersih','$kepem_jamban','$akta_lahir','$jamkes','$pengasuhan_paud')");

        // $tambah_rekomendasi = mysqli_query($konek, "SELECT max(id_formulir_duaB) as id_formulir_duaB FROM tb_formulir2b");
        // $tambah_rekomendasi = mysqli_fetch_array($tambah_rekomendasi);
        // $id_formulir_duaB = $tambah_rekomendasi['id_formulir_duaB'];
        // $tambah_rekomendasi = mysqli_query($konek, "INSERT INTO tb_rekomendasi (id_rekomendasi,id_formulir_duaB) VALUES ('','$id_formulir_duaB')");

        // $id_pencegahan = $_POST['id_pencegahan'];
        // $id_formulir_duaB = mysqli_insert_id($konek);
        // foreach($id_pencegahan as $pencegahan){
        //     // menyimpan data ke tabel formulir 3a
        //     $sql = "INSERT INTO tb_rekomendasi(id_formulir_duaB,id_pencegahan) VALUES ('$id_formulir_duaB','$pencegahan')";
        //     mysqli_query($konek,$sql);
        // }


        if($sql){
            echo "<script>alert('Data Berhasil Ditambahkan');</script>";
            echo '<meta http-equiv="refresh" content="1;url=formulir2B.php">';
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

    <title>Laporan 2.B - Tambah Data</title>

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
    <!-- jquery ui datepicker -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">

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
                            <h6 class="m-0 font-weight-bold">Data Laporan 2B Pemantauan Bulanan Anak 0-2 Tahun</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <!-- nama ibu -->
                                        <div class="form-group row">
                                            <label for="id_baduta" class="col-sm-2 col-form-label">Nama Anak</label>
                                            <div class="col-sm-10 mt-2">
                                                <select class="form-select select2" name="id_baduta" id="id_baduta" style="width: 250px;">
                                                <?php
                                                    include "../../setting/koneksi.php";
                                                    if($stat == 'pegawai' or $_SESSION['status'] == 'administrator'){
                                                        $query = mysqli_query($konek, "SELECT * FROM tb_baduta ORDER BY id_baduta");
                                                    } else {
                                                        $query = mysqli_query($konek, "SELECT * FROM tb_baduta WHERE kelurahan='$kel' ORDER BY id_baduta");
                                                    }
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <option value="<?=$data['id_baduta'];?>"><?php echo $data['nama_anak'];?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end nama anak -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- pemberian_imunisasi_dasar -->
                                        <div class="form-group row">
                                            <label for="pemberian_imunisasi_dasar" class="col-sm-2 col-form-label">Pemberian Imunisasi Dasar</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="pemberian_imunisasi_dasar" id="pemberian_imunisasi_dasar" required>
                                                    <label class="form-check-label" for="pemberian_imunisasi_dasar">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="pemberian_imunisasi_dasar" id="pemberian_imunisasi_dasar2" required>
                                                    <label class="form-check-label" for="pemberian_imunisasi_dasar2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="pemberian_imunisasi_dasar" id="pemberian_imunisasi_dasar3" required>
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
                                                    <input class="form-check-input" type="radio" value="Y" name="berat_badan" id="berat_badan" required>
                                                    <label class="form-check-label" for="berat_badan">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="berat_badan" id="berat_badan2" required>
                                                    <label class="form-check-label" for="berat_badan2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="berat_badan" id="berat_badan3" required>
                                                    <label class="form-check-label" for="berat_badan3">
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
                                        <!-- tinggi_badan -->
                                        <div class="form-group row">
                                            <label for="tinggi_badan" class="col-sm-2 col-form-label">Pengukuran Tinggi Badan</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="tinggi_badan" id="tinggi_badan" required>
                                                    <label class="form-check-label" for="tinggi_badan">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="tinggi_badan" id="tinggi_badan2" required>
                                                    <label class="form-check-label" for="tinggi_badan2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="tinggi_badan" id="tinggi_badan3" required>
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
                                                    <input class="form-check-input" type="radio" value="Y" name="k1L" id="k1L" required>
                                                    <label class="form-check-label" for="k1L">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="k1L" id="k1L2" required>
                                                    <label class="form-check-label" for="k1L2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="k1L" id="k1L3" required>
                                                    <label class="form-check-label" for="k1L3">
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
                                        <!-- k2P -->
                                        <div class="form-group row">
                                            <label for="k2P" class="col-sm-2 col-form-label">k2 (P)</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="k2P" id="k2P" required>
                                                    <label class="form-check-label" for="k2P">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="k2P" id="k2P2" required>
                                                    <label class="form-check-label" for="k2P2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="k2P" id="k2P3" required>
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
                                                    <input class="form-check-input" type="radio" value="Y" name="kunjungan_rumah" id="kunjungan_rumah" required>
                                                    <label class="form-check-label" for="kunjungan_rumah">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="kunjungan_rumah" id="kunjungan_rumah2" required>
                                                    <label class="form-check-label" for="kunjungan_rumah2">
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
                                        <!-- end kunjungan_rumah -->
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
                                        <!-- akta_lahir -->
                                        <div class="form-group row">
                                            <label for="akta_lahir" class="col-sm-2 col-form-label">Akta Lahir</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="akta_lahir" id="akta_lahir" required>
                                                    <label class="form-check-label" for="akta_lahir">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="akta_lahir" id="akta_lahir2" required>
                                                    <label class="form-check-label" for="akta_lahir2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="akta_lahir" id="akta_lahir3" required>
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
                                <div class="row">
                                    <div class="col">
                                        <!-- pengasuhan_paud -->
                                        <div class="form-group row">
                                            <label for="pengasuhan_paud" class="col-sm-2 col-form-label">Pengasuhan (Paud)</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="pengasuhan_paud" id="pengasuhan_paud" required>
                                                    <label class="form-check-label" for="pengasuhan_paud">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="pengasuhan_paud" id="pengasuhan_paud2" required>
                                                    <label class="form-check-label" for="pengasuhan_paud2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="pengasuhan_paud" id="pengasuhan_paud3" required>
                                                    <label class="form-check-label" for="pengasuhan_paud3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end pengasuhan_paud -->
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="id_pencegahan" class="col-sm-2 col-form-label">Rekomendasi Pencegahan</label>
                                            <div class="col-sm-10 mt-2">
                                                <select class="form-select select2" name="id_pencegahan[]" id="id_pencegahan" style="width: 250px;" multiple>
                                                <?php
                                                    include "../../setting/koneksi.php";
                                                    $query = mysqli_query($konek, "SELECT * FROM tb_pencegahan");
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <option value="<?=$data['id_pencegahan'];?>"><?php echo $data['pencegahan'];?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                
                                <a class="btn btn-secondary btn-sm mb-3" href="formulir2B.php"><i class="fa fa fa-arrow-left"></i> Batal</a>
                                <button type="submit" class="btn btn-success btn-sm mb-3" name="tambah"><i class="fa fa fa-plus"></i> Tambah Data</button>
                            </form>
                        </div>
                    </div>
                    </section>
                    </section>

<?php include '../../template/footer.php'; ?>