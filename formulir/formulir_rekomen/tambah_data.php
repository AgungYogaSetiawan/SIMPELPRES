<?php
    session_start();
    include '../../setting/koneksi.php';

    $kel = $_SESSION['username'];

    // cek apakah yang mengakses halaman ini sudah login
    if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
        header("location:../../login/halaman_login.php");
    } 

    if(isset($_POST['tambah'])){
        $id_formulir_duaB = $_POST['id_formulir_duaB'];
        $id_pencegahan = $_POST['id_pencegahan'];
        $sql = "INSERT INTO tb_intervensi VALUES (NULL,'$id_formulir_duaB')";
        mysqli_query($konek,$sql);

        $id_intervensi = mysqli_insert_id($konek);
        foreach($id_pencegahan as $pencegahan){
            // menyimpan data ke tabel formulir 3a
            $sql = "INSERT INTO tb_rekomendasi VALUES (NULL,'$id_intervensi','$pencegahan')";
            mysqli_query($konek,$sql);
        }
        
        
        echo "<script>alert('Data Berhasil Ditambahkan');</script>";
        echo '<meta http-equiv="refresh" content="1;url=formulir_rekomen.php">';
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

    <title>Laporan Rekomendasi Intervensi - Tambah Data</title>

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
                            <h6 class="m-0 font-weight-bold">Data Laporan Rekomendasi Intervensi</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <!-- nama ibu -->
                                        <div class="form-group row">
                                            <label for="id_formulir_duaB" class="col-sm-2 col-form-label">Nama Anak Data Laporan 2B</label>
                                            <div class="col-sm-10 mt-2">
                                                <select class="form-select select2" name="id_formulir_duaB" id="id_formulir_duaB" style="width: 250px;">
                                                <?php
                                                    include "../../setting/koneksi.php";
                                                    if($stat == 'pegawai' or $_SESSION['status'] == 'administrator'){
                                                        $query = mysqli_query($konek, "SELECT * FROM tb_formulir2b f INNER JOIN tb_baduta b ON f.id_baduta=b.id_baduta INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak WHERE g.status_gizi='STUNTING'");
                                                    } else {
                                                        $query = mysqli_query($konek, "SELECT * FROM tb_formulir2b f INNER JOIN tb_baduta b ON f.id_baduta=b.id_baduta INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak WHERE kelurahan='$kel' AND g.status_gizi='STUNTING'");
                                                    }
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <option value="<?=$data['id_formulir_duaB'];?>"><?php echo $data['nama_anak'];?></option>
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
                                            <label for="id_pencegahan" class="col-sm-2 col-form-label">Pencegahan</label>
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
                                        <!-- end jumlah diterima lengkap -->
                                    </div>
                                </div>
                                
                                <a class="btn btn-secondary btn-sm mb-3" href="formulir_rekomen.php"><i class="fa fa fa-arrow-left"></i> Batal</a>
                                <button type="submit" class="btn btn-success btn-sm mb-3" name="tambah"><i class="fa fa fa-plus"></i> Tambah Data</button>
                            </form>
                        </div>
                    </div>
                    </section>
                    </section>

<?php include '../../template/footer.php'; ?>