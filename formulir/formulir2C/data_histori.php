<?php 
session_start();

// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
    header("location:../../login/halaman_login.php");
}

$id_formulir_duaC = $_GET['id_formulir_duaC'];

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

    <title>SIMPELKPM - Data Histori Anak Laporan 2C</title>

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
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../dashboard.php">
                <div class="sidebar-brand-icon">
                    <i><img src="../../img/logo_pemko_bjm2.png" style="width: 42px;"></i>
                </div>
                <div class="sidebar-brand-text mx-1">SIMPELKPM</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../../dashboard.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if($_SESSION['status'] == 'kpm') {?>
            <div class="sidebar-heading">
                Master
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../../data_master/data_kecamatan.php">Data Kecamatan</a>
                        <a class="collapse-item" href="../../data_master/data_kelurahan.php">Data Kelurahan</a>
                        <a class="collapse-item" href="../../data_master/data_bumil/data_bumil.php">Data Ibu Hamil</a>
                        <a class="collapse-item" href="../../data_master/data_batita/data_batita.php">Data Anak 0-2 Tahun</a>
                        <a class="collapse-item" href="../../data_master/data_balita/data_balita.php">Data Anak >2-6 Tahun</a>
                    </div>
                </div>
            </li>
            <?php } ?>

            <div class="sidebar-heading">
                Proses
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>Berkas Laporan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../../formulir/formulir2A/formulir2A.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Bulanan Ibu Hamil">Data Laporan 2.A</a>
                        <a class="collapse-item" href="../../formulir/formulir2B/formulir2B.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Bulanan Anak 0-2 Tahun">Data Laporan 2.B</a>
                        <a class="collapse-item" href="formulir2C.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Layanan dan Sasaran Paud Anak >2-6 Tahun">Data Laporan 2.C</a>
                        <a class="collapse-item" href="../../formulir/formulir3A/formulir3A.php" data-toggle="tooltip" data-placement="top" title="Data Rekapitulasi Hasil Pemantauan Tiga Bulanan Ibu Hamil">Data Laporan 3.A</a>
                        <a class="collapse-item" href="../../formulir/formulir3B/formulir3B.php" data-toggle="tooltip" data-placement="top" title="Data Rekapitulasi Tiga Bulanan Bagi Anak 0-2 Tahun">Data Laporan 3.B</a>
                    </div>
                </div>
            </li>

            <div class="sidebar-heading">
                Laporan
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Cetak Laporan</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan2a.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Bulanan Ibu Hamil">Cetak Laporan 2.A</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan2b.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Bulanan Anak 0-2 Tahun">Cetak Laporan 2.B</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan2c.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Layanan dan Sasaran Paud Anak >2-6 Tahun">Cetak Laporan 2.C</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan3a.php" data-toggle="tooltip" data-placement="top" title="Data Rekapitulasi Hasil Pemantauan Tiga Bulanan Bagi Ibu Hamil">Cetak Laporan 3.A</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan3b.php" data-toggle="tooltip" data-placement="top" title="Data Rekapitulasi Tiga Bulanan Bagi Anak 0-2 Tahun">Cetak Laporan 3.B</a>
                    </div>
                </div>
                
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
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
                        <a href="formulir2C.php" class="btn btn-secondary btn-sm"><i class="fa fa fa-arrow-left"></i> Kembali</a>
                        <div class="card mb-4 mt-2">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold">Data Histori Laporan 2C</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Anak</th>
                                            <th>Bulan</th>
                                            <th>Usia</th>
                                            <th>Januari Lama</th>
                                            <th>Februari Lama</th>
                                            <th>Maret Lama</th>
                                            <th>April Lama</th>
                                            <th>Mei Lama</th>
                                            <th>Juni Lama</th>
                                            <th>Juli Lama</th>
                                            <th>Agustus Lama</th>
                                            <th>September Lama</th>
                                            <th>Oktober Lama</th>
                                            <th>November Lama</th>
                                            <th>Desember Lama</th>
                                            <th>Waktu Perubahan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../setting/koneksi.php';
                                        $query = mysqli_query($konek, "SELECT * FROM tb_log_2c lb INNER JOIN tb_balita tb ON lb.id_balita=tb.id_balita INNER JOIN tb_formulir2c tf ON lb.id_formulir_duaC=tf.id_formulir_duaC WHERE tf.id_formulir_duaC='$id_formulir_duaC'");
                                        $no = 1;
                                        function  getBulan($bln){
                                            switch  ($bln){
                                                case  1:
                                                return  "Januari";
                                                break;
                                                case  2:
                                                return  "Februari";
                                                break;
                                                case  3:
                                                return  "Maret";
                                                break;
                                                case  4:
                                                return  "April";
                                                break;
                                                case  5:
                                                return  "Mei";
                                                break;
                                                case  6:
                                                return  "Juni";
                                                break;
                                                case  7:
                                                return  "Juli";
                                                break;
                                                case  8:
                                                return  "Agustus";
                                                break;
                                                case  9:
                                                return  "September";
                                                break;
                                                case  10:
                                                return  "Oktober";
                                                break;
                                                case  11:
                                                return  "November";
                                                break;
                                                case  12:
                                                return  "Desember";
                                                break;
                                            }
                                        }
                                        while($row = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <td align="center"><?php echo $no++ ?></td>
                                            <td><?php echo $row['nama_anak']; ?></td>
                                            <td><?php echo $row['bulan']; ?></td>
                                            <td align="center"><?php echo $row['usia_anak']; ?></td>
                                            <td align="center"><?php echo $row['januari_lama']; ?></td>
                                            <td align="center"><?php echo $row['februari_lama']; ?></td>
                                            <td align="center"><?php echo $row['maret_lama']; ?></td>
                                            <td align="center"><?php echo $row['april_lama']; ?></td>
                                            <td align="center"><?php echo $row['mei_lama']; ?></td>
                                            <td align="center"><?php echo $row['juli_lama']; ?></td>
                                            <td align="center"><?php echo $row['juni_lama']; ?></td>
                                            <td align="center"><?php echo $row['agustus_lama']; ?></td>
                                            <td align="center"><?php echo $row['september_lama']; ?></td>
                                            <td align="center"><?php echo $row['oktober_lama']; ?></td>
                                            <td align="center"><?php echo $row['november_lama']; ?></td>
                                            <td align="center"><?php echo $row['desember_lama']; ?></td>
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
