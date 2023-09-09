<?php
    session_start();
    include '../../setting/koneksi.php';

    $kel = $_SESSION['username'];

    // cek apakah yang mengakses halaman ini sudah login
    if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
        header("location:../../login/halaman_login.php");
    } 

    if(isset($_POST['tambah'])){
        $id_bumil = $_POST['id_bumil'];
        $id_formulir_duaA = $_POST['id_formulir_duaA'];
        $jml_diterima_lengkap = $_POST['jml_diterima_lengkap'];
        $persen = $_POST['persen'];

        // menyimpan data ke tabel formulir 3a
        $sql = "INSERT INTO tb_formulir3a (id_bumil,id_formulir_duaA,jml_diterima_lengkap,persen) VALUES ('$id_bumil','$id_formulir_duaA','$jml_diterima_lengkap','$persen')";
        // $cek = "SELECT * FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.id_bumil='$id_bumil' AND c.id_formulir_duaA='$id_formulir_duaA' AND b.kelurahan='$kel'";
        $result = mysqli_query($konek,$sql);
        // $cek_res = mysqli_query($konek,$cek);
        if($result){
            echo "<script>alert('Data Berhasil Ditambahkan');</script>";
            echo '<meta http-equiv="refresh" content="1;url=formulir3A.php">';
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

    <title>Laporan 3.A - Tambah Data</title>

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
                            <h6 class="m-0 font-weight-bold">Data Laporan 3A Rekapitulasi Hasil Pemantauan 3 (Tiga) Bulanan Bagi Ibu Hamil</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <!-- nama ibu -->
                                        <div class="form-group row">
                                            <label for="id_bumil" class="col-sm-2 col-form-label">Nama Ibu Data Bumil</label>
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
                                        <!-- end nama anak -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- nama ibu -->
                                        <div class="form-group row">
                                            <label for="id_formulir_duaA" class="col-sm-2 col-form-label">Nama Ibu Data Laporan 2A</label>
                                            <div class="col-sm-10 mt-2">
                                                <select class="form-select select2" name="id_formulir_duaA" id="id_formulir_duaA" style="width: 250px;">
                                                <?php
                                                    include "../../setting/koneksi.php";
                                                    if($stat == 'pegawai' or $_SESSION['status'] == 'administrator'){
                                                        $query = mysqli_query($konek, "SELECT * FROM tb_formulir2a f INNER JOIN tb_bumil b ON f.id_bumil=b.id_bumil");
                                                    } else {
                                                        $query = mysqli_query($konek, "SELECT * FROM tb_formulir2a f INNER JOIN tb_bumil b ON f.id_bumil=b.id_bumil WHERE kelurahan='$kel'");
                                                    }
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <option value="<?=$data['id_formulir_duaA'];?>"><?php echo $data['nama_ibu'];?></option>
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
                                        <!-- jumlah diterima lengkap -->
                                        <div class="form-group row">
                                            <label for="jml_diterima_lengkap" class="col-sm-2 col-form-label">Jumlah Diterima Lengkap</label>
                                            <div class="col-sm-10 mt-2">
                                                <input type="text" class="form-control" name="jml_diterima_lengkap" id="jml_diterima_lengkap" placeholder="Jumlah Diterima Lengkap" style="width: 250px;" onkeyup="hitungPersen()">
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
                                                <input type="text" class="form-control" name="persen" id="persen" placeholder="Persen" style="width: 250px;">
                                            </div>
                                        </div>
                                        <!-- end persen -->
                                    </div>
                                </div>
                                
                                <a class="btn btn-secondary btn-sm mb-3" href="formulir3A.php"><i class="fa fa fa-arrow-left"></i> Batal</a>
                                <button type="submit" class="btn btn-success btn-sm mb-3" name="tambah"><i class="fa fa fa-plus"></i> Tambah Data</button>
                            </form>
                        </div>
                    </div>
                    </section>
                    </section>

<?php include '../../template/footer.php'; ?>