<?php 
session_start();

// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
    header("location:../../login/halaman_login.php");
}

$id_balita = $_GET['id_balita'];

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

    <title>SIMPELKPM - Data Histori Anak >2-6 Tahun</title>

    <!-- Custom fonts for this template-->
    
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
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
                        <a href="data_balita.php" class="btn btn-secondary btn-sm"><i class="fa fa fa-arrow-left"></i> Kembali</a>
                        <div class="card mb-4 mt-2">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold">Data Histori Anak >2-6 Tahun</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
                                    <thead style="background-color: #1ABA80; color: white;">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Anak</th>
                                            <th>Bulan Lama</th>
                                            <th>Bulan Baru</th>
                                            <th>Usia Lama</th>
                                            <th>Usia Baru</th>
                                            <th>Waktu Perubahan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../setting/koneksi.php';
                                        $query = mysqli_query($konek, "SELECT * FROM tb_log_balita lb INNER JOIN tb_balita tb ON lb.id_balita=tb.id_balita WHERE tb.id_balita='$id_balita'");
                                        $no = 1;
                                        
                                        while($row = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <td align="center"><?php echo $no++ ?></td>
                                            <td><?php echo $row['nama_anak']; ?></td>
                                            <td><?php echo $row['bulan_lama']; ?></td>
                                            <td><?php echo $row['bulan_baru']; ?></td>
                                            <td align="center"><?php echo $row['usia_lama']; ?></td>
                                            <td align="center"><?php echo $row['usia_baru']; ?></td>
                                            <td align="center"><?php echo date("d/m/Y", strtotime($row['waktu_perubahan'])); ?></td>
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
