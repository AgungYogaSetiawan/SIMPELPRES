<?php 
session_start();

// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
    header("location:../../login/halaman_login.php");
}

$id_formulir_duaB = $_GET['id_formulir_duaB'];

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

    <title>SIMPELKPM - Data Histori Anak Laporan 2B</title>

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
                        <a href="formulir2B.php" class="btn btn-secondary btn-sm"><i class="fa fa fa-arrow-left"></i> Kembali</a>
                        <div class="card mb-4 mt-2">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold">Data Histori Laporan 2B</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
                                    <thead style="background-color: #1ABA80; color: white;">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Anak</th>
                                            <th>Bulan</th>
                                            <th>Usia</th>
                                            <th>Pemberian Imunisasi Dasar Lama</th>
                                            <th>Berat Badan Lama</th>
                                            <th>Tinggi Badan Lama</th>
                                            <th>K1L Lama</th>
                                            <th>K2P Lama</th>
                                            <th>Kunjungan Rumah Lama</th>
                                            <th>Kepemilikan Air Bersih Lama</th>
                                            <th>Kepemilikan Jamban Lama</th>
                                            <th>Akta Lahir Lama</th>
                                            <th>Jaminan Kesehatan Lama</th>
                                            <th>Pengasuhan Paud Lama</th>
                                            <th>Waktu Perubahan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../setting/koneksi.php';
                                        $query = mysqli_query($konek, "SELECT * FROM tb_log_2b lb INNER JOIN tb_baduta tb ON lb.id_baduta=tb.id_baduta INNER JOIN tb_formulir2b tf ON lb.id_formulir_duaB=tf.id_formulir_duaB WHERE tf.id_formulir_duaB='$id_formulir_duaB'");
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
                                            <td align="center"><?php echo getBulan($row['bulan']); ?></td>
                                            <td><?php echo $row['umur']; ?></td>
                                            <td align="center"><?php echo $row['pemberian_imunisasi_dasar_lama']; ?></td>
                                            <td align="center"><?php echo $row['berat_badan_lama']; ?></td>
                                            <td align="center"><?php echo $row['tinggi_badan_lama']; ?></td>
                                            <td align="center"><?php echo $row['k1L_lama']; ?></td>
                                            <td align="center"><?php echo $row['k2P_lama']; ?></td>
                                            <td align="center"><?php echo $row['kunjungan_rumah_lama']; ?></td>
                                            <td align="center"><?php echo $row['kepem_air_bersih_lama']; ?></td>
                                            <td align="center"><?php echo $row['kepem_jamban_lama']; ?></td>
                                            <td align="center"><?php echo $row['akta_lahir_lama']; ?></td>
                                            <td align="center"><?php echo $row['jamkes_lama']; ?></td>
                                            <td align="center"><?php echo $row['pengasuhan_paud_lama']; ?></td>
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
