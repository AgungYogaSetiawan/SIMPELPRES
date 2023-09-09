<?php 
session_start();

// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
    header("location:../../login/halaman_login.php");
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

    <title>SIMPELPRES - Data Laporan Prediksi Stunting</title>

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"  type="text/css">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css">

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
                            <div class="mb-5">
                                <div class="row">
                                    <!-- form pencarian -->
                                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
                                        <div class="row">
                                            <div class="col" style="margin-top: 11px;">
                                                <p>Filter Kelurahan:</p>
                                                <select class="form-select form-select-sm select2" aria-label=".form-select-sm example" name="kelurahan" style="width:200px;">
                                                    <?php
                                                    include '../../setting/koneksi.php';
                                                    $kel = $_SESSION['username'];
                                                    $stat = $_SESSION['status'];
                                                    //query menampilkan nama unit kerja ke dalam combobox
                                                    if($stat == 'pegawai' or $_SESSION['status'] == 'administrator'){
                                                        $query = mysqli_query($konek, "SELECT * FROM tb_kelurahan GROUP BY kelurahan ORDER BY kelurahan");
                                                    } else{
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
                                            <div class="col">
                                                <p style="margin-top:10px;">Filter Tanggal Awal:</p>
                                                <input type="date" name="tgl_awal" id="tgl_awal" style="width: 200px;">
                                            </div>
                                            <div class="col">
                                                <p style="margin-top:10px;">Filter Sampai Tanggal:</p>
                                                <input type="date" name="tgl_akhir" id="tgl_akhir" style="width: 200px;">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <p style="margin-top:10px;">Filter Hasil Prediksi:</p>
                                                <select class="form-select select2" name="hasil" id="hasil" style="width: 200px;">
                                                    <option >--Pilih Hasil Prediksi--</option>
                                                    <option value="Stunting">Stunting</option>
                                                    <option value="Tidak Stunting">Tidak Stunting</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm mt-2" name="cari"><i class="fa fa fa-search"></i> Tampilkan</button>
                                        <a href="formulir_prediksi.php" class="btn btn-secondary btn-sm mt-2"><i class="fa fa fa-sync"></i> Refresh</a>
                                    </form>
                                    <!-- end form pencarian -->
                                </div>
                            </div>

                            <!-- table -->
                            <!-- <?php if($_SESSION['status'] !== 'pegawai') {?>
                            <a href="tambah_data.php" class="btn btn-success btn-sm"><i class="fa fa fa-plus"></i> Tambah Data</a>
                            <?php } ?> -->
                            <a href="../../cetak_laporan/cetak_laporan_prediksi.php" class="btn btn-warning btn-sm"><i class="fa fa fa-print"></i> Cetak</a>
                            <div class="card mb-4 mt-2">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold">Data Prediksi Stunting</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
                                        <thead style="background-color: #1ABA80; color: white;">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Anak</th>
                                                <th>Kelurahan</th>
                                                <th>Umur</th>
                                                <th>Tanggal</th>
                                                <th>Tinggi Badan</th>
                                                <th>Berat Badan</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Hasil Prediksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        include '../../setting/koneksi.php';
                                        $kel = $_SESSION['username'];
                                        $stat = $_SESSION['status'];
                                        date_default_timezone_set('Asia/Ujung_Pandang');
                                        if(isset($_POST['cari'])){
                                            $kelurahan = trim($_POST['kelurahan']);
                                            $tgl_awal = trim($_POST['tgl_awal']);
                                            $tgl_akhir = trim($_POST['tgl_akhir']);
                                            $hasil = trim($_POST['hasil']);
                                            $query = mysqli_query($konek, "SELECT * FROM tb_prediksi WHERE kelurahan='$kelurahan' AND hasil='$hasil' AND tgl_input BETWEEN '$tgl_awal' AND '$tgl_akhir'");
                                        } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator'){
                                            $query = mysqli_query($konek, "SELECT * FROM tb_prediksi");
                                        } else if($stat == 'kpm'){
                                            $query = mysqli_query($konek, "SELECT * FROM tb_prediksi WHERE kelurahan='$kel' ORDER BY kelurahan DESC");
                                        }
                                        $no = 1;
                                        while($row = mysqli_fetch_array($query)){
                                            setlocale(LC_TIME, 'id_ID');
                                            $tanggal_format = strftime('%d %B %Y', strtotime($row['tgl_input']));
                                        ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $row['nama']; ?></td>
                                            <td><?php echo $row['kelurahan']; ?></td>
                                            <td align="center"><?php echo $row['umur']; ?></td>
                                            <td><?php echo $tanggal_format; ?></td>
                                            <td align="center"><?php echo $row['tinggi_badan']; ?></td>
                                            <td align="center"><?php echo $row['berat_badan']; ?></td>
                                            <td><?php echo $row['jenis_kelamin']; ?></td>
                                            <td><?php echo $row['hasil']; ?></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </section>
                    </section>

<?php include '../../template/footer.php'; ?>