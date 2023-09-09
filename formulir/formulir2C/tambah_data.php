<?php
    session_start();
    include '../../setting/koneksi.php';

    $kel = $_SESSION['username'];

    // cek apakah yang mengakses halaman ini sudah login
    if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
        header("location:../../login/halaman_login.php");
    } 

    if(isset($_POST['tambah'])){
        $id_balita = $_POST['id_balita'];
        $januari =  $_POST['januari'];
        $februari =  $_POST['februari'];
        $maret = $_POST['maret'];
        $april =  $_POST['april'];
        $mei =  $_POST['mei'];
        $juni =  $_POST['juni'];
        $juli =  $_POST['juli'];
        $agustus =  $_POST['agustus'];
        $september = $_POST['september'];
        $oktober =  $_POST['oktober'];
        $november =  $_POST['november'];
        $desember =  $_POST['desember'];
        $jml_aktif = $_POST['jml_aktif'];

        // simpan ke tabel formulir2b
        $sql = "INSERT INTO tb_formulir2c (id_balita,januari,februari,maret,april,mei,juli,juni,agustus,september,oktober,november,desember,jml_aktif) VALUES ('$id_balita','$januari','$februari','$maret','$april','$mei','$juli','$juni','$agustus','$september','$oktober','$november','$desember','$jml_aktif')";
        $result = mysqli_query($konek, $sql);

        if($result){
            echo "<script>alert('Data Berhasil Ditambahkan');</script>";
            echo '<meta http-equiv="refresh" content="1;url=formulir2C.php">';
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

    <title>Laporan 2.C - Tambah Data</title>

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
                            <h6 class="m-0 font-weight-bold">Data Laporan 2C Pemantauan Layanan dan Sasaran Paud Anak >2-6 Tahun</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <!-- nama ibu -->
                                        <div class="form-group row">
                                            <label for="id_balita" class="col-sm-2 col-form-label">Nama Anak</label>
                                            <div class="col-sm-10 mt-2">
                                                <select class="form-select select2" name="id_balita" id="id_balita" style="width: 250px;">
                                                <?php
                                                    include "../../setting/koneksi.php";
                                                    if($stat == 'pegawai' or $_SESSION['status'] == 'administrator'){
                                                        $query = mysqli_query($konek, "SELECT * FROM tb_balita ORDER BY id_balita");
                                                    } else {
                                                        $query = mysqli_query($konek, "SELECT * FROM tb_balita WHERE kelurahan='$kel' ORDER BY id_balita");
                                                    }
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <option value="<?=$data['id_balita'];?>"><?php echo $data['nama_anak'];?></option>
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
                                        <!-- januari -->
                                        <div class="form-group row">
                                            <label for="januari" class="col-sm-2 col-form-label">Januari</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="januari" id="januari" required>
                                                    <label class="form-check-label" for="januari">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="januari" id="januari2" required>
                                                    <label class="form-check-label" for="januari2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="januari" id="januari3" required>
                                                    <label class="form-check-label" for="januari3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end januari -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- februari -->
                                        <div class="form-group row">
                                            <label for="februari" class="col-sm-2 col-form-label">Februari</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="februari" id="februari" required>
                                                    <label class="form-check-label" for="februari">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="februari" id="februari2" required>
                                                    <label class="form-check-label" for="februari2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="februari" id="februari3" required>
                                                    <label class="form-check-label" for="februari3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end februari -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- maret -->
                                        <div class="form-group row">
                                            <label for="maret" class="col-sm-2 col-form-label">Maret</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="maret" id="maret" required>
                                                    <label class="form-check-label" for="maret">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="maret" id="maret2" required>
                                                    <label class="form-check-label" for="maret2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="maret" id="maret3" required>
                                                    <label class="form-check-label" for="maret3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end maret -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- april -->
                                        <div class="form-group row">
                                            <label for="april" class="col-sm-2 col-form-label">April</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="april" id="april" required>
                                                    <label class="form-check-label" for="april">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="april" id="april2" required>
                                                    <label class="form-check-label" for="april2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="april" id="april3" required>
                                                    <label class="form-check-label" for="april3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end april -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- mei -->
                                        <div class="form-group row">
                                            <label for="mei" class="col-sm-2 col-form-label">Mei</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="mei" id="mei" required>
                                                    <label class="form-check-label" for="mei">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="mei" id="mei2" required>
                                                    <label class="form-check-label" for="mei2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="mei" id="mei3" required>
                                                    <label class="form-check-label" for="mei3">
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
                                        <!-- juli -->
                                        <div class="form-group row">
                                            <label for="juli" class="col-sm-2 col-form-label">Juli</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="juli" id="juli" required>
                                                    <label class="form-check-label" for="juli">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="juli" id="juli2" required>
                                                    <label class="form-check-label" for="juli2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="juli" id="juli3" required>
                                                    <label class="form-check-label" for="juli3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end juli-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- juni -->
                                        <div class="form-group row">
                                            <label for="juni" class="col-sm-2 col-form-label">Juni</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="juni" id="juni" required>
                                                    <label class="form-check-label" for="juni">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="juni" id="juni2" required>
                                                    <label class="form-check-label" for="juni2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="juni" id="juni3" required>
                                                    <label class="form-check-label" for="juni3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end juni -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- agustus -->
                                        <div class="form-group row">
                                            <label for="agustus" class="col-sm-2 col-form-label">Agustus</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="agustus" id="agustus" required>
                                                    <label class="form-check-label" for="agustus">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="agustus" id="agustus2" required>
                                                    <label class="form-check-label" for="agustus2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="agustus" id="agustus3" required>
                                                    <label class="form-check-label" for="agustus3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end agustus -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- september -->
                                        <div class="form-group row">
                                            <label for="september" class="col-sm-2 col-form-label">September</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="september" id="september" required>
                                                    <label class="form-check-label" for="september">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="september" id="september2" required>
                                                    <label class="form-check-label" for="september2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="september" id="september3" required>
                                                    <label class="form-check-label" for="september3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end september -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- oktober -->
                                        <div class="form-group row">
                                            <label for="oktober" class="col-sm-2 col-form-label">Oktober</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="oktober" id="oktober" required>
                                                    <label class="form-check-label" for="oktober">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="oktober" id="oktober2" required>
                                                    <label class="form-check-label" for="oktober2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="oktober" id="oktober3" required>
                                                    <label class="form-check-label" for="oktober3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end oktober -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    <!-- november -->
                                        <div class="form-group row">
                                            <label for="november" class="col-sm-2 col-form-label">November</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="november" id="november" required>
                                                    <label class="form-check-label" for="november">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="november" id="november2" required>
                                                    <label class="form-check-label" for="november2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="november" id="november3" required>
                                                    <label class="form-check-label" for="november3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end november -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    <!-- desember -->
                                        <div class="form-group row">
                                            <label for="desember" class="col-sm-2 col-form-label">Desember</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="desember" id="desember" required>
                                                    <label class="form-check-label" for="desember">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="desember" id="desember2" required>
                                                    <label class="form-check-label" for="desember2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="desember" id="desember3" required>
                                                    <label class="form-check-label" for="desember3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end desember -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="jml_aktif" class="col-sm-2 col-form-label">Jumlah Keaktifan</label>
                                            <div class="col-sm-10 mt-2">
                                                <input type="text" class="form-control" name="jml_aktif" id="jml_aktif" placeholder="Jumlah Keaktifan" style="width: 250px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <a class="btn btn-secondary btn-sm mb-3" href="formulir2C.php"><i class="fa fa fa-arrow-left"></i> Batal</a>
                                <button type="submit" class="btn btn-success btn-sm mb-3" name="tambah"><i class="fa fa fa-plus"></i> Tambah Data</button>
                            </form>
                        </div>
                    </div>
                    </section>
                    </section>

<?php include '../../template/footer.php'; ?>