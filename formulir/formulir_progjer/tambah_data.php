<?php
    session_start();
    include '../../setting/koneksi.php';

    $kel = $_SESSION['username'];

    // cek apakah yang mengakses halaman ini sudah login
    if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
        header("location:../../login/halaman_login.php");
    } 

    if(isset($_POST['tambah'])){
        $id_kelurahan = $_POST['id_kelurahan'];
        $id_kecamatan = $_POST['id_kecamatan'];
        $nm_kegiatan = $_POST['nm_kegiatan'];
        $tujuan = $_POST['tujuan'];
        $sasaran = $_POST['sasaran'];
        $tmpt_pelaksanaan = $_POST['tmpt_pelaksanaan'];
        $waktu_pelaksanaan = $_POST['waktu_pelaksanaan'];
        $anggaran = $_POST['anggaran'];
        $indikator = $_POST['indikator'];
        $penanggung_jawab = $_POST['penanggung_jawab'];
        $mitra_kerja = $_POST['mitra_kerja'];
        $tahun = date("Y");

        // menyimpan data ke tabel formulir 3a
        $sql = "INSERT INTO tb_progjer VALUES ('','$id_kelurahan','$id_kecamatan','$nm_kegiatan','$tujuan','$sasaran','$tmpt_pelaksanaan','$waktu_pelaksanaan','$anggaran','$indikator','$penanggung_jawab','$mitra_kerja','$tahun')";
        mysqli_query($konek,$sql);
        
        echo "<script>alert('Data Berhasil Ditambahkan');</script>";
        echo '<meta http-equiv="refresh" content="1;url=formulir_progjer.php">';
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

    <title>Laporan Program Kerja Tahunan - Tambah Data</title>

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
                            <h6 class="m-0 font-weight-bold">Data Laporan Program Kerja Tahunan Untuk Pencegahan Stunting</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <!-- nama ibu -->
                                        <div class="form-group row">
                                            <label for="id_kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
                                            <div class="col-sm-10 mt-2">
                                                <select class="form-select select2" name="id_kelurahan" id="id_kelurahan" style="width: 250px;">
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
                                                    <option value="<?=$data['id'];?>"><?php echo $data['kelurahan'];?></option>
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
                                            <label for="id_kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                            <div class="col-sm-10">
                                                <select class="form-select select2" name="id_kecamatan" id="id_kecamatan" style="width: 250px;">
                                                <option >--Pilih Kecamatan--</option>
                                                <?php
                                                include '../../setting/koneksi.php';
                                                //query menampilkan nama unit kerja ke dalam combobox
                                                $query = mysqli_query($konek, "SELECT * FROM tb_kecamatan GROUP BY kecamatan ORDER BY kecamatan");
                                                while ($data = mysqli_fetch_array($query)) {
                                                ?>
                                                <option value="<?=$data['id'];?>"><?php echo $data['kecamatan'];?></option>
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
                                            <label for="nm_kegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                                            <div class="col-sm-10 mt-2">
                                                <input type="text" class="form-control" name="nm_kegiatan" id="nm_kegiatan" placeholder="Program Kegiatan" style="width: 250px;">
                                            </div>
                                        </div>
                                        <!-- end jumlah diterima lengkap -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- tujuan -->
                                        <div class="form-group row">
                                            <label for="tujuan" class="col-sm-2 col-form-label">Tujuan Kegiatan</label>
                                            <div class="col-sm-10 mt-2">
                                                <input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan Kegiatan" style="width: 250px;">
                                            </div>
                                        </div>
                                        <!-- end tujuan -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- sasaran -->
                                        <div class="form-group row">
                                            <label for="sasaran" class="col-sm-2 col-form-label">Sasaran Kegiatan</label>
                                            <div class="col-sm-10 mt-2">
                                                <input type="text" class="form-control" name="sasaran" id="sasaran" placeholder="Sasaran Kegiatam" style="width: 250px;">
                                            </div>
                                        </div>
                                        <!-- end sasaran -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- tempat pelaksanaan -->
                                        <div class="form-group row">
                                            <label for="tmpt_pelaksanaan" class="col-sm-2 col-form-label">Tempat Pelaksanaan</label>
                                            <div class="col-sm-10 mt-2">
                                                <input type="text" class="form-control" name="tmpt_pelaksanaan" id="tmpt_pelaksanaan" placeholder="Tempat Pelaksanaan" style="width: 250px;">
                                            </div>
                                        </div>
                                        <!-- end tempat pelaksanaan -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- waktu -->
                                        <div class="form-group row">
                                            <label for="waktu_pelaksanaan" class="col-sm-2 col-form-label">Waktu Pelaksanaan</label>
                                            <div class="col-sm-10 mt-2">
                                                <input type="date" class="form-control" name="waktu_pelaksanaan" id="waktu_pelaksanaan" placeholder="Waktu Pelaksanaan" style="width: 250px;">
                                            </div>
                                        </div>
                                        <!-- end waktu -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- anggaran -->
                                        <div class="form-group row">
                                            <label for="anggaran" class="col-sm-2 col-form-label">Anggaran</label>
                                            <div class="col-sm-10 mt-2">
                                                <input type="text" class="form-control" name="anggaran" id="anggaran" placeholder="Anggaran" style="width: 250px;">
                                            </div>
                                        </div>
                                        <!-- end anggaran -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- indikator -->
                                        <div class="form-group row">
                                            <label for="indikator" class="col-sm-2 col-form-label">Indikator Keberhasilan</label>
                                            <div class="col-sm-10 mt-2">
                                                <input type="text" class="form-control" name="indikator" id="indikator" placeholder="Indikator Keberhasilan" style="width: 250px;">
                                            </div>
                                        </div>
                                        <!-- end indikator -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- penanggung jawab -->
                                        <div class="form-group row">
                                            <label for="penanggung_jawab" class="col-sm-2 col-form-label">Penanggung Jawab</label>
                                            <div class="col-sm-10 mt-2">
                                                <input type="text" class="form-control" name="penanggung_jawab" id="penanggung_jawab" placeholder="Penanggung Jawab" style="width: 250px;">
                                            </div>
                                        </div>
                                        <!-- end penanggung jawab -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- mitra kerja -->
                                        <div class="form-group row">
                                            <label for="mitra_kerja" class="col-sm-2 col-form-label">Mitra Kerja</label>
                                            <div class="col-sm-10 mt-2">
                                                <input type="text" class="form-control" name="mitra_kerja" id="mitra_kerja" placeholder="Mitra Kerja" style="width: 250px;">
                                            </div>
                                        </div>
                                        <!-- end mitra kerja -->
                                    </div>
                                </div>
                                
                                <a class="btn btn-secondary btn-sm mb-3" href="formulir_progjer.php"><i class="fa fa fa-arrow-left"></i> Batal</a>
                                <button type="submit" class="btn btn-success btn-sm mb-3" name="tambah"><i class="fa fa fa-plus"></i> Tambah Data</button>
                            </form>
                        </div>
                    </div>
                    </section>
                    </section>

<?php include '../../template/footer.php'; ?>