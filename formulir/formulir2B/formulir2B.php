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

    <title>SIMPELPRES - Laporan 2.B</title>

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
                            <a href="formulir2B.php" class="btn btn-secondary btn-sm mt-2"><i class="fa fa fa-sync"></i> Refresh</a>
                        </form>
                        <!-- end form pencarian -->
                        </div>
                        </div>
                        <!-- table -->
                        <?php if($_SESSION['status'] !== 'pegawai') {?>
                        <a href="tambah_data.php" class="btn btn-success btn-sm"><i class="fa fa fa-plus"></i> Tambah Data</a>
                        <?php } ?>
                        <a href="../../cetak_laporan/cetak_laporan2b.php" class="btn btn-warning btn-sm"><i class="fa fa fa-print"></i> Cetak</a>
                        <div class="card mb-4 mt-2">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold">Data Laporan 2B Pemantauan Bulanan Anak 0-2 Tahun</h6>
                            </div>
                            <div class="card-body">
                                    <table class="table table-stripped table-bordered mt-3 table-responsive">
                                    <thead style="background-color: #1ABA80; color: white;">
                                        <tr>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;" valign="middle">No</th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">Kelurahan</th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">Kecamatan</th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">Bulan</th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">Tahun</th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">No Register (KIA)</th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">Nama Anak</th>
                                            <th style="text-align:center; vertical-align: middle;" rowspan=3>
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Jenis Kelamin (L/P)</span>
                                            </th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">Tanggal Lahir Anak (Tgl/Bln/Thn)</th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">Status Gizi Anak (Normal/Buruk/Kurang/Stunting)</th>
                                            <th colspan="13" style="text-align:center; vertical-align: middle;">BULAN</th>
                                            <th rowspan=3 style="text-align:center; vertical-align: middle;">Aksi</th>
                                        </tr>
                                        <tr>
                                            <th colspan=2 style="text-align:center; vertical-align: middle;">Umur dan Status Tikar</th>
                                            <th colspan=3 style="text-align:center; vertical-align: middle;">Indikator Layanan</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <th style="text-align:center; vertical-align: middle;">Umur (Bulan)</th>
                                            <th style="text-align:center; vertical-align: middle;">Hasil (M/K/H)</th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Pemberian Imunisasi Dasar</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Pengukuran Berat Badan</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Pengukuran Tinggi Badan</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;" colspan=2>
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Konseling Gizi Bagi Orang Tua</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Kunjungan Rumah</span>
                                                
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Kepimilikan Akses Air Bersih</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Kepimilikan Jamban Sehat</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Akta Lahir</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Jaminan Kesehatan</span>
                                            </th>
                                            <th style="text-align:center; vertical-align: middle;">
                                                <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Pengasuhan (PAUD)</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td class="td1"></td>
                                            <td class="td1"></td>
                                            <td class="td1"></td>
                                            <td class="td1"></td>
                                            <td class="td1"></td>
                                            <td class="td1">a</td>
                                            <td class="td1">b</td>
                                            <td class="td1">c</td>
                                            <td class="td1">d</td>
                                            <td class="td1">e</td>
                                            <td class="td1">f</td>
                                            <td class="td1">g</td>
                                            <td class="td1">h</td>
                                            <td class="td1">i</td>
                                            <td class="td1">j</td>
                                            <td class="td1">k1 (L)</td>
                                            <td class="td1">k2 (P)</td>
                                            <td class="td1">l</td>
                                            <td class="td1">m</td>
                                            <td class="td1">n</td>
                                            <td class="td1">o</td>
                                            <td class="td1">p</td>
                                            <td class="td1">q</td>
                                            <td class="td1"></td>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                            $query = mysqli_query($konek, "SELECT * FROM tb_formulir2b f INNER JOIN tb_baduta b ON f.id_baduta = b.id_baduta INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE b.kelurahan='$kelurahan' AND b.bulan='$bulan' AND b.tahun='$tahun' ORDER BY b.kelurahan LIMIT $halaman_awal, $batas");
                                            $query_halaman = mysqli_query($konek, "SELECT * FROM tb_formulir2b f INNER JOIN tb_baduta b ON f.id_baduta = b.id_baduta INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE b.kelurahan='$kelurahan' AND b.bulan='$bulan' AND b.tahun='$tahun' ORDER BY b.kelurahan");
                                            $jumlah_data = mysqli_num_rows($query_halaman);
				                            $total_halaman = ceil($jumlah_data / $batas);
                                        } else if($stat == 'pegawai' or $_SESSION['status'] == 'administrator'){
                                            $query = mysqli_query($konek, "SELECT * FROM tb_formulir2b f INNER JOIN tb_baduta b ON f.id_baduta = b.id_baduta INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil ORDER BY b.kelurahan LIMIT $halaman_awal, $batas");
                                            $query_halaman = mysqli_query($konek, "SELECT * FROM tb_formulir2b f INNER JOIN tb_baduta b ON f.id_baduta = b.id_baduta INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil ORDER BY b.kelurahan");
                                            $jumlah_data = mysqli_num_rows($query_halaman);
				                            $total_halaman = ceil($jumlah_data / $batas);
                                        } else if($stat == 'kpm'){
                                            $query = mysqli_query($konek, "SELECT * FROM tb_formulir2b f INNER JOIN tb_baduta b ON f.id_baduta = b.id_baduta INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE b.kelurahan='$kel' ORDER BY b.kelurahan LIMIT $halaman_awal, $batas");
                                            $query_halaman = mysqli_query($konek, "SELECT * FROM tb_formulir2b f INNER JOIN tb_baduta b ON f.id_baduta = b.id_baduta INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE b.kelurahan='$kel' ORDER BY b.kelurahan");
                                            $jumlah_data = mysqli_num_rows($query_halaman);
				                            $total_halaman = ceil($jumlah_data / $batas);
                                        }
                                        $no = $halaman_awal+1;
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
                                            <td class="td1"><?php echo $no++ ?></td>
                                            <td><?php echo $row['kelurahan']; ?></td>
                                            <td><?php echo $row['kecamatan']; ?></td>
                                            <td class="td1"><?php echo getBulan($row['bulan']); ?></td>
                                            <td class="td1"><?php echo $row['tahun']; ?></td>
                                            <td class="td1"><?php echo $row['no_register']; ?></td>
                                            <td><?php echo $row['nama_anak']; ?></td>
                                            <td class="td1"><?php 
                                            $jk = $row['jk'];
                                            echo $jk == 'L' ? 'Laki-laki' : 'Perempuan';
                                            ?></td>
                                            <td class="td1"><?php echo date("d/m/Y", strtotime($row['tgl_lahir_anak'])); ?></td>
                                            <td class="td1"><?php echo $row['status_gizi']; ?></td>
                                            <td class="td1"><?php echo $row['umur'] ?></td>
                                            <td class="td1"><?php 
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
                                            ?></td>
                                            <td class="td1">
                                            <?php 
                                            if($row['pemberian_imunisasi_dasar'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['pemberian_imunisasi_dasar'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['pemberian_imunisasi_dasar'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['berat_badan'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['berat_badan'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['berat_badan'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['tinggi_badan'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['tinggi_badan'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['tinggi_badan'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['k1L'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['k1L'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['k1L'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['k2P'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['k2P'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['k2P'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['kunjungan_rumah'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['kunjungan_rumah'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['kunjungan_rumah'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['kepem_air_bersih'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['kepem_air_bersih'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['kepem_air_bersih'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['kepem_jamban'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['kepem_jamban'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['kepem_jamban'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['akta_lahir'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['akta_lahir'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['akta_lahir'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['jamkes'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['jamkes'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['jamkes'];
                                            }
                                            ?></td>
                                            <td class="td1">
                                            <?php
                                            if($row['pengasuhan_paud'] == 'Y'){
                                                echo '&#128504;';
                                            } else if($row['pengasuhan_paud'] == 'T'){
                                                echo '&#9747;';
                                            } else{
                                                echo $row['pengasuhan_paud'];
                                            }
                                            ?></td>
                                            <?php echo "
                                            <td>";
                                            if($_SESSION['status'] !== 'pegawai'){
                                            echo "<div class='btn-row'>
                                            <div class='btn-group'>
                                            <a href='edit_data.php?id_formulir_duaB=$row[0]' class='btn btn-warning btn-sm mr-2'><i class='fa fa fa-pen'></i></a>
                                            <a href='hapus_data.php?id_formulir_duaB=$row[0]' class='btn btn-danger btn-sm mr-2 alert_hapus'><i class='fa fa fa-trash'></i></a>";
                                            }
                                            echo "<a href='data_histori.php?id_formulir_duaB=$row[0]' class='btn btn-primary btn-sm'><i class='fa fa fa-eye'></i></a>
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
