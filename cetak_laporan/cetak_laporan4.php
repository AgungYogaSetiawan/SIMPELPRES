<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="../img/logo_pemko_bjm2.png">

    <title>SIMPELPRES - Cetak Laporan 4</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body id="page-top">
    <?php 
    session_start();

    // cek apakah yang mengakses halaman ini sudah login
    if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
        header("location:../login/halaman_login.php");
    }

    ?>

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
        <?php include '../template/sidebar2.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="datetime">
                        <span id="date_time" class="text-gray-700 small"></span>
                    </div>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Selamat Datang <b><?php echo $_SESSION['username']; ?></b></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/logo-ava.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a href="../login/logout.php" class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Content Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4 mt-2">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-uppercase">CETAK Laporan 4 Konvergensi Pencegahan Stunting Tingkat Desa Terhadap Sasaran Rumah Tangga 1000 HPK</h6>
                            </div>
                            <div class="card-body">
                                <form action="cetak_formulir4.php" method="post" target="_blank">
                                    <table>
                                    <tr>
                                        <td>Bulan</td>
                                        <td>: 
                                            <select class=" select2" name="bulan" id="bulan" style="width: 193px;">
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
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tahun</td>
                                        <td>: 
                                            <select class="select2" name="tahun" id="tahun" style="width: 193px;">
                                                <?php
                                                for ($x = 2015; $x <= 2040; $x++) {
                                                ?>
                                                <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php if($_SESSION['status'] == 'kpm'){?>
                                        <tr>
                                            <td>Nama KPM</td>
                                            <td>: <input type="text" name="nama_kpm" style="width:193px;"></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td>Kelurahan </td>
                                        <td>: 
                                            <select class="select2" name="kelurahan" style="width:193px;">
                                                <?php
                                                include '../setting/koneksi.php';
                                                $kel = $_SESSION['username'];
                                                //query menampilkan nama unit kerja ke dalam combobox
                                                if($stat == 'pegawai' or $_SESSION['status'] == 'administrator') {
                                                    $query = mysqli_query($konek, "SELECT * FROM tb_kelurahan GROUP BY kelurahan ORDER BY kelurahan");
                                                }else {
                                                    $query = mysqli_query($konek, "SELECT * FROM tb_kelurahan WHERE kelurahan='$kel' GROUP BY kelurahan ORDER BY kelurahan");
                                                }
                                                
                                                while ($data = mysqli_fetch_array($query)) {
                                                ?>
                                                <option value="<?=$data['kelurahan'];?>"><?php echo $data['kelurahan'];?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" style="padding-top:20px;"><button type="submit" name="cetak" class="btn btn-success btn-sm"><i class="fa fa fa-print"></i> Cetak</a></td>
                                        <td align="left" style="padding-top:20px;"><button type="submit" name="cetak_semua" class="btn btn-success btn-sm"><i class="fa fa fa-print"></i> Cetak Semua</a></td>
                                    </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            
        </div>
        <!-- End of Main Content -->
            
            
        <a class="up-icon" data-toggle="modal" data-target="#tipsModal">
            <i class="fa fa-question"></i>
        </a>
        <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <a href="https://www.linkedin.com/in/agung-yoga-setiawan/" target="_blank">Agung Yoga Setiawan 2023</a></span>
                        
                    </div>
                </div>
            </footer>
        </div>
        <!-- End of Content Wrapper -->
    
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    
    <!-- <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a> -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda mau Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Keluar" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../login/logout.php">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- tips Modal-->
    <div class="modal fade" id="tipsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cara Pengisian Laporan KPM</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>A. Cara pengisian Laporan 2.A. Pemantauan Bulanan Ibu Hamil</p>
                    <ul>
                        <li>Tujuan:
                            Untuk mencatat secara rutin layanan konvergensi yang diperoleh Ibu Hamil
                        </li>
                        <li>
                            Waktu Pengisian dan Sumber Data:
                            Setiap Bulan. Data bersumber dari Buku Register Posyandu / Kohort Baduta dan Buku Register Posyandu / Kohort Ibu Hamil, Bersalin dan Nifas, hasil wawancara atau kunjungan rumah terutama keberadaan jamban, air bersih dan kepemilikan jaminan sosial/ kesehatan dan akta lahir anak, dan dari desa.
                        </li>
                        <li>
                            Cara Pengisian:
                        </li>
                    </ul>
                    <img src="../img/tabel2a.PNG" width="470px">
                    <p>B. Cara pengisian Laporan 2.B. Pemantauan Bulanan Anak 0 - 2 Tahun</p>
                    <ul>
                        <li>Tujuan:
                            Untuk mencatat hasil pengukuran dari alat Tikar Pertumbuhan "Aku Tumbuh Tinggi dan Cerdas" untuk usia 0-23 bulan dan hasil pemantauan 5 paket layanan konvergensi sasaran 1000 HPK.
                        </li>
                        <li>Waktu Pengisian dan Sumber Data:
                            Dicatat setiap ada pengukuran menggunakan Tikar Pertumbuhan "Aku Tumbuh Tinggi dan Cerdas" dan dilengkapi pada setiap 3 bulan sekali.
                        </li>
                        <li>Cara Pengisian:</li>
                    </ul>
                    <img src="../img/tabel2b.PNG" width="470px">
                    <img src="../img/tabel2bb.PNG" width="470px">
                    <p>C. Cara pengisian Laporan 2.C. Pemantauan Layanan Dan Sasaran Paud Anak 2 – 6 Tahun</p>
                    <ul>
                        <li>Tujuan:
                            Untuk mencatat secara rutin keikutsertaan anak dalam layanan PAUD.
                        </li>
                        <li>
                            Waktu Pengisian dan Sumber Data:
                            Dicatat Setiap Bulan, sumber data dari lembaga – lembaga PAUD di Desa dan para orangtua sasaran PAUD.
                        </li>
                        <li>Cara Pengisian:</li>
                    </ul>
                    <img src="../img/tabel2c.PNG" width="470px">
                    <p>D. Cara pengisian Laporan 3.A. Rekapitulasi Hasil Pemantauan 3 (Tiga) Bulanan Bagi Ibu Hamil</p>
                    <ul>
                        <li>Tujuan:
                            Untuk Mengetahui status konvergensi 3 bulanan desa yang digunakan di rapat 3 bulanan tingkat desa pada sasaran 1,000 HPK (Ibu Hamil).
                        </li>
                        <li>Tatacara Pengisian:</li>
                    </ul>
                    <img src="../img/tabel3a.PNG" width="470px">
                    <img src="../img/3a.PNG" width="470px">
                    <p>E. Cara pengisian laporan 3.B Rekapitulasi Hasil Pemantauan 3 (Tiga) Bulanan Bagi Anak 0-2 Tahun</p>
                    <ul>
                        <li>Tujuan:
                            Untuk Mengetahui status konvergensi 3 bulanan desa yang digunakan di rapat 3 bulanan tingkat desa pada sasaran 1,000 HPK (Anak 0-2 Tahun).
                        </li>
                        <li>Tatacara Pengisian:</li>
                    </ul>
                    <img src="../img/tabel3b.PNG" width="470px">
                    <img src="../img/tabel3bb.PNG" width="470px">
                    <img src="../img/tabel3bbb.PNG" width="470px">
                    <img src="../img/uku.PNG" width="470px">
                    <img src="../img/3b.PNG" width="470px">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- datetime js -->
    <script type="text/javascript" src="../js/datetime.js"></script>
    <script type="text/javascript">window.onload = date_time('date_time');</script>

    <!-- tooltip -->
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>

    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

    <!-- load event -->
    <script>
        // set delay 10s
        var delay = 1000;
        
        $(window).on('load', function() {
            setTimeout(function(){
                $("#loading").hide();
                $(".loader").hide();
            },delay);
        });
    </script>
</body>

</html>