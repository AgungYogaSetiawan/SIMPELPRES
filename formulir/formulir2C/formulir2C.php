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

    <title>SIMPELPRES - Laporan 2.C</title>

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

                <?php include '../../template/header.php';?>
                
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <section id="main-content">
                    <section class="wrapper">
                        <div class="mb-5">
                        <div class="row">
                        <!-- form pencarian -->
                        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" >
                            <div class="row">
                                <div class="col" style="margin-top: 11px;">
                                    <p>Filter Kelurahan:</p>
                                    <select class="form-select form-select-sm select2" aria-label="form-select-sm example" name="kelurahan" style="width:200px;">
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
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <option value="<?=$row['kelurahan'];?>"><?php echo $row['kelurahan'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <p style="margin-top:10px;">Filter Bulan:</p>
                                    <select class="form-select select2" name="bln" id="bln" style="width: 200px;">
                                        <option >--Pilih Bulan--</option>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <p style="margin-top:10px;">Filter Tahun:</p>
                                    <select class="form-select select2" name="tahun" id="tahun" style="width: 200px;">
                                        <option >--Pilih Tahun--</option>
                                        <?php
                                        for ($x = 2015; $x <= 2040; $x++) {
                                        ?>
                                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <button type="submit" name="cari" class="btn btn-primary btn-sm mt-2"><i class="fa fa fa-search"></i> Tampilkan</button>
                            <a href="formulir2C.php" class="btn btn-secondary btn-sm mt-2"><i class="fa fa fa-sync"></i> Refresh</a>
                        </form>
                        <!-- end form pencarian -->
                        </div>
                        </div>
                        <?php if($_SESSION['status'] !== 'pegawai') {?>
                        <a href="tambah_data.php" class="btn btn-success btn-sm"><i class="fa fa fa-plus"></i> Tambah Data</a>
                        <?php } ?>
                        <a href="../../cetak_laporan/cetak_laporan2c.php" class="btn btn-warning btn-sm"><i class="fa fa fa-print"></i> Cetak</a>
                        <div class="card mb-4 mt-2">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold">Data Laporan 2C Pemantauan Layanan dan Sasaran Paud Anak >2-6 Tahun</h6>
                            </div>
                            <div class="card-body">
                                <!-- table -->
                                    <table class="table table-stripped table-bordered mt-3 table-responsive">
                                    <thead style="background-color: #1cc88a; color: white;">
                                        <tr>
                                            <th rowspan=4 class="th1" style="text-align:center; vertical-align: middle;">No</th>
                                            <th rowspan=4 class="th1" style="text-align:center; vertical-align: middle;">Kelurahan</th>
                                            <th rowspan=4 class="th1" style="text-align:center; vertical-align: middle;">Kecamatan</th>
                                            <th rowspan=4 class="th1" style="text-align:center; vertical-align: middle;">Bulan</th>
                                            <th rowspan=4 class="th1" style="text-align:center; vertical-align: middle;">Tahun</th>
                                            <th rowspan=4 class="th1" style="text-align:center; vertical-align: middle;">No Rumah Tangga</th>
                                            <th rowspan=4 class="th1" style="text-align:center; vertical-align: middle;">Nama Anak</th>
                                            <th class="th1" rowspan=4 style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Jenis Kelamin (L/P)</span>
                                            </th>
                                            <th rowspan=4 class="th1" style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">TTL (Tgl/Bln/Thn)</span>
                                            </th>
                                            <th rowspan=3 class="th1" style="text-align:center; vertical-align: middle;">Usia Menurut Kategori</th>
                                            <th colspan="12" class="th1" style="text-align:center; vertical-align: middle;">Pada Bulan ini Apakah Anak</th>
                                            <th rowspan=4 class="th1" style="text-align:center; vertical-align: middle;">Jumlah Keaktifan</th>
                                            <th rowspan=4 class="th1" style="text-align:center; vertical-align: middle;">Aksi</th>
                                        </tr>
                                        <tr>
                                            <th colspan=12 class="th1" style="text-align:center; vertical-align: middle;">Mengikuti Layanan PAUD (Parenting Bagi Orang Tua Anak Usia)</th>
                                        <tr>
                                            <th colspan=12 style="text-align:left; vertical-align: middle;">Tahun:</th>
                                        </tr>
                                            
                                        </tr>
                                        <tr>
                                            <th rowspan=3 class="th1" style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Usia Anak (Bulan)</span>
                                            </th>
                                            <th rowspan=3 class="th1" style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Januari</span>
                                            </th>
                                            <th rowspan=3 class="th1" style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Februari</span>
                                            </th>
                                            <th rowspan=3 class="th1" style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Maret</span>
                                            </th>
                                            <th rowspan=3 class="th1" style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">April</span>
                                            </th>
                                            <th rowspan=3 class="th1" style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Mei</span>
                                                
                                            </th>
                                            <th rowspan=3 class="th1" style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Juni</span>
                                            </th>
                                            <th rowspan=3 class="th1" style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Juli</span>
                                            </th>
                                            <th rowspan=3 class="th1" style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Agustus</span>
                                            </th>
                                            <th rowspan=3 class="th1" style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">September</span>
                                            </th>
                                            <th rowspan=3 class="th1" style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Oktober</span>
                                            </th>
                                            <th rowspan=3 class="th1" style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">November</span>
                                            </th>
                                            <th rowspan=3 class="th1" style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Desember</span>
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="td1" style="background-color: #1cc88a; color: white;"></td>
                                            <td class="td1" style="background-color: #1cc88a; color: white;"></td>
                                            <td class="td1" style="background-color: #1cc88a; color: white;"></td>
                                            <td class="td1" style="background-color: #1cc88a; color: white;"></td>
                                            <td class="td1" style="background-color: #1cc88a; color: white;"></td>
                                            <td class="td1" style="background-color: #1cc88a; color: white;">a</td>
                                            <td class="td1" style="background-color: #1cc88a; color: white;">b</td>
                                            <td class="td1" style="background-color: #1cc88a; color: white;">c</td>
                                            <td class="td1" style="background-color: #1cc88a; color: white;">d</td>
                                            <td class="td1" style="background-color: #1cc88a; color: white;">e</td>
                                            <td class="td1" style="background-color: #1cc88a; color: white;">f</td>
                                            <td class="td1" style="background-color: #1cc88a; color: white;">g</td>
                                            <td class="td1" style="background-color: #1cc88a; color: white;">h</td>
                                            <td class="td1" style="background-color: #1cc88a; color: white;">i</td>
                                            <td class="td1" style="background-color: #1cc88a; color: white;">j</td>
                                            <td class="td1" style="background-color: #1cc88a; color: white;">k</td>
                                            <td class="td1" style="background-color: #1cc88a; color: white;">l</td>
                                            <td class="td1" style="background-color: #1cc88a; color: white;">m</td>
                                            <td class="td1" style="background-color: #1cc88a; color: white;">n</td>
                                            <td class="td1" style="background-color: #1cc88a; color: white;">o</td>
                                            <td style="background-color: #1cc88a; color: white;">p</td>
                                            <td style="background-color: #1cc88a; color: white;">q</td>
                                            <td style="background-color: #1cc88a; color: white;"></td>
                                            <td style="background-color: #1cc88a; color: white;"></td>
                                            
                                        </tr>
                                        <?php
                                        include '../../setting/koneksi.php';
                                        $kel = $_SESSION['username'];
                                        $stat = $_SESSION['status'];
                                        $batas = 10;
                                        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                                        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
                                        $previous = $halaman - 1;
                                        $next = $halaman + 1;
                                        if(isset($_POST['cari'])){
                                            $kelurahan = trim($_POST['kelurahan']);
                                            $bulan = trim($_POST['bln']);
                                            $tahun = trim($_POST['tahun']);
                                            $query = mysqli_query($konek, "SELECT * FROM tb_formulir2c f INNER JOIN tb_balita b ON f.id_balita = b.id_balita WHERE b.kelurahan='$kelurahan' AND b.bulan='$bulan' AND b.tahun='$tahun' ORDER BY b.kelurahan LIMIT $halaman_awal, $batas");
                                            $query_halaman = mysqli_query($konek, "SELECT * FROM tb_formulir2c f INNER JOIN tb_balita b ON f.id_balita = b.id_balita WHERE b.kelurahan='$kelurahan' AND b.bulan='$bulan' AND b.tahun='$tahun' ORDER BY b.kelurahan");
                                            $jumlah_data = mysqli_num_rows($query_halaman);
				                            $total_halaman = ceil($jumlah_data / $batas);
                                        } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator'){
                                            $query = mysqli_query($konek, "SELECT * FROM tb_formulir2c f INNER JOIN tb_balita b ON f.id_balita = b.id_balita ORDER BY b.kelurahan LIMIT $halaman_awal, $batas");
                                            $query_halaman = mysqli_query($konek, "SELECT * FROM tb_formulir2c f INNER JOIN tb_balita b ON f.id_balita = b.id_balita ORDER BY b.kelurahan");
                                            $jumlah_data = mysqli_num_rows($query_halaman);
				                            $total_halaman = ceil($jumlah_data / $batas);
                                        } else if($stat == 'kpm'){
                                            $query = mysqli_query($konek, "SELECT * FROM tb_formulir2c f INNER JOIN tb_balita b ON f.id_balita = b.id_balita WHERE b.kelurahan='$kel' ORDER BY b.kelurahan LIMIT $halaman_awal, $batas");
                                            $query_halaman = mysqli_query($konek, "SELECT * FROM tb_formulir2c f INNER JOIN tb_balita b ON f.id_balita = b.id_balita WHERE b.kelurahan='$kel' ORDER BY b.kelurahan");
                                            $jumlah_data = mysqli_num_rows($query_halaman);
				                            $total_halaman = ceil($jumlah_data / $batas);
                                        }
                                        $no = $halaman_awal+1;
                                        while($row = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <td class="td1"><?php echo $no++ ?></td>
                                            <td><?php echo $row['kelurahan']; ?></td>
                                            <td><?php echo $row['kecamatan']; ?></td>
                                            <td class="td1"><?php echo $row['bulan']; ?></td>
                                            <td class="td1"><?php echo $row['tahun']; ?></td>
                                            <td class="td1"><?php echo $row['no_rmh_tangga'];?></td>
                                            <td><?php echo $row['nama_anak'];?></td>
                                            <td class="td1"><?php 
                                            $jk = $row['jk'];
                                            echo $jk == 'L' ? 'Laki-laki' : 'Perempuan';
                                            ?></td>
                                            <td class="td1"><?php echo date("d/m/Y", strtotime($row['tgl_lahir'])); ?></td>
                                            <td class="td1"><?php echo $row['usia_anak'];?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['januari'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['januari'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['januari'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['februari'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['februari'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['februari'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['maret'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['maret'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['maret'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['april'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['april'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['april'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['mei'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['mei'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['mei'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['juni'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['juni'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['juni'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['juli'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['juli'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['juli'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['agustus'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['agustus'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['agustus'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['september'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['september'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['september'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['oktober'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['oktober'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['oktober'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['november'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['november'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['november'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['desember'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['desember'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['desember'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                                <?php echo $row['jml_aktif'];?>
                                            </td>
                                            <?php echo "
                                            <td>";
                                            if($_SESSION['status'] !== 'pegawai'){
                                            echo "<div class='btn-row'>
                                            <div class='btn-group'>
                                            <a href='edit_data.php?id_formulir_duaC=$row[0]' class='btn btn-warning btn-sm mr-2'><i class='fa fa fa-pen'></i></a>
                                            <a href='hapus_data.php?id_formulir_duaC=$row[0]' class='btn btn-danger btn-sm mr-2 alert_hapus'><i class='fa fa fa-trash'></i></a>";
                                            }
                                            echo "<a href='data_histori.php?id_formulir_duaC=$row[0]' class='btn btn-primary btn-sm'><i class='fa fa fa-eye'></i></a>
                                            </div>
                                            </div>
                                            </td>";
                                            ?>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    </table>
                                    <nav>
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item">
                                                <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                                            </li>
                                            <?php 
                                            for($x=1;$x<=$total_halaman;$x++){
                                                ?> 
                                                <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                                <?php
                                            }
                                            ?>				
                                            <li class="page-item">
                                                <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                            </div>
                        </div>
                    </section>
                    </section>
<?php include '../../template/footer.php';?>
