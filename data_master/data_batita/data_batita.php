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

    <title>SIMPELPRES - Data Anak 0-2 Tahun</title>

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
                            <?php if($_SESSION['status'] !== 'pegawai') {?>
                            <a href="tambah_data.php" class="btn btn-success btn-sm "><i class="fa fa fa-plus"></i> Tambah Data</a>
                            <?php } ?>
                            <div class="card mb-4 mt-2">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold">Data Anak 0-2 Tahun</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
                                        <thead style="background-color: #1ABA80; color: white;">
                                            <tr>
                                                <th>No</th>
                                                <th>Kelurahan</th>
                                                <th>Kecamatan</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>No Register (KIA)</th>
                                                <th>Nama Anak</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tanggal Melahirkan</th>
                                                <th>Status Gizi Anak</th>
                                                <th>Umur (Bulan)</th>
                                                <th>Hasil</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../../setting/koneksi.php';
                                            $kel = $_SESSION['username'];
                                            if($kel == 'admin' or $_SESSION['status'] == 'administrator'){
                                                $query = mysqli_query($konek, "SELECT a.*, b.status_gizi, c.hasil FROM tb_baduta a, tb_gizi_anak b, tb_hasil c WHERE a.id_gizi_anak=b.id_gizi_anak AND a.id_hasil=c.id_hasil ORDER BY a.kelurahan");
                                            } else {
                                                $query = mysqli_query($konek, "SELECT a.*, b.status_gizi, c.hasil FROM tb_baduta a, tb_gizi_anak b, tb_hasil c WHERE a.id_gizi_anak=b.id_gizi_anak AND a.id_hasil=c.id_hasil AND a.kelurahan='$kel' ORDER BY a.kelurahan");
                                            }
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
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $row['kelurahan']; ?></td>
                                                <td><?php echo $row['kecamatan']; ?></td>
                                                <td align="center"><?php echo getBulan($row['bulan']); ?></td>
                                                <td align="center"><?php echo $row['tahun']; ?></td>
                                                <td><?php echo $row['no_register']; ?></td>
                                                <td><?php echo $row['nama_anak']; ?></td>
                                                <td align="center">
                                                <?php 
                                                $jk = $row['jk'];
                                                echo $jk == 'L' ? 'Laki-laki' : 'Perempuan';
                                                ?>
                                                </td>
                                                <td><?php echo date("d/m/Y", strtotime($row['tgl_lahir_anak'])); ?></td>
                                                <td align="center"><?php echo $row['status_gizi']; ?></td>
                                                <td align="center"><?php echo $row['umur']; ?></td>
                                                <td>
                                                <?php 
                                                $hasil = $row['hasil'];
                                                $hasil = $hasil == 'M'
                                                            ? 'Merah'
                                                            : ($hasil == 'K'
                                                            ? 'Kuning'
                                                            : ($hasil == 'H'
                                                            ? 'Hijau'
                                                            : 'Kosong'
                                                            )
                                                            );
                                                echo $hasil;
                                                ?>
                                                </td>
                                                <?php
                                                echo "
                                                <td>";
                                                if($_SESSION['status'] !== 'pegawai'){
                                                echo "<div class='btn-row'>
                                                <div class='btn-group'>
                                                <a href='edit_data.php?id_baduta=$row[0]' class='btn btn-warning btn-sm mr-2'><i class='fa fa fa-pen'></i></a>
                                                <a href='hapus_data.php?id_baduta=$row[0]' class='btn btn-danger btn-sm mr-2 alert_hapus'><i class='fa fa fa-trash'></i></a>";
                                                }
                                                echo "<a href='data_histori.php?id_baduta=$row[0]' class='btn btn-primary btn-sm'><i class='fa fa fa-eye'></i></a>
                                                </div>
                                                </div>
                                                </td>
                                                ";
                                                ?>
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
