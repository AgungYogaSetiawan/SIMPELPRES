<?php
include '../setting/koneksi.php';
session_start();

// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
    header("location:../login/halaman_login.php");
}


$kel = $_SESSION['username'];
$kelurahan = $_POST['kelurahan'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
if($kel == 'admin'){
    if(isset($_POST['cetak'])){
        $query = mysqli_query($konek, "SELECT * FROM tb_formulir2a f INNER JOIN tb_bumil b ON f.id_bumil = b.id_bumil WHERE b.kelurahan='$kelurahan' AND b.bulan=$bulan AND b.tahun=$tahun");
    }
    if(isset($_POST['cetak_semua'])){
        $query = mysqli_query($konek, "SELECT * FROM tb_formulir2a f INNER JOIN tb_bumil b ON f.id_bumil=b.id_bumil");
    }
} else {
    $kelurahan = $_POST['kelurahan'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $nama_kpm = $_POST['nama_kpm'];
    if(isset($_POST['cetak'])){
        $query = mysqli_query($konek, "SELECT * FROM tb_formulir2a f INNER JOIN tb_bumil b ON f.id_bumil = b.id_bumil WHERE b.kelurahan='$kel' AND b.bulan=$bulan AND b.tahun=$tahun");
    }
    if(isset($_POST['cetak_semua'])){
        $query = mysqli_query($konek, "SELECT * FROM tb_formulir2a f INNER JOIN tb_bumil b ON f.id_bumil=b.id_bumil WHERE b.kelurahan='$kel'");
    }
    
}

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
?>


<style>
	.demo {
		border:1px solid;
		border-collapse:collapse;
		padding:5px;
	}
	.demo th {
		border:1px solid;
		padding:5px;
		font-weight: normal;
	}
	.demo td {
		border:1px solid;
		padding:5px;
	}
</style>
<center>
		<table>
			<tr>
				<td><img src="../img/logo_pemko_bjm2.png" width="90" height="90"></td>
				<td>
				<center>
					<font size="4"><b>PEMERINTAH KOTA BANJARMASIN</b></font><br>
					<font size="2"><b>DINAS PENGENDALIAN PENDUDUK KELUARGA BERENCANA DAN PEMBERDAYAAN MASYARAKAT KOTA BANJARMASIN</b></font><br>
					<font size="2"><b>Jalan Brigjen. H. Hasan Basri - Kayu Tangi II RT. 16 Banjarmasin 70124 | Telp./Fax. (0511) 3301346</b></font><br>
                    <font size="2"><b>Email: <u>dppkbpm.bjm@gmail.com</u> / <u>dppkbpm@mail.banjarmasinkota.go.id</u></b></font><br>
					<font size="2"><b>Website: <u>https://dppkbpm.banjarmasinkota.go.id/</u></b></font>
				</center>
				</td>
			</tr>
			<tr>
				<td colspan="2"><hr style="height:4px;border-width:0;color:black;background-color:black"></td>
			</tr>
		<table class="table table-stripped table-bordered mt-3 table-responsive demo" width="850">
        <H3>LAPORAN 2A PEMANTAUAN BULANAN BAGI IBU HAMIL</H3>
        <thead>
            <tr>
                <th rowspan=3 style="text-align:right; vertical-align: middle;">No</th>
                <th rowspan=3 style="text-align:center; vertical-align: middle;">No Register <br>(KIA)</th>
                <th rowspan=3 style="text-align:center; vertical-align: middle;">Nama Ibu</th>
                <th rowspan=3 style="text-align:center; vertical-align: middle;">Status Kehamilan <br>(KEK/RISTI/NORMAL)</th>
                <th rowspan=3 style="text-align:center; vertical-align: middle;">Hari Perkiraan Lahir <br>(Tgl/Bln/Thn)</th>
                <th colspan="9" style="text-align:center; vertical-align: middle;"><?php echo getBulan($bulan) ?> <?php echo $tahun ?>
                </th>
                
            </tr>
            <tr>
                <th style="text-align:center; vertical-align: middle;">Usia Kehamilan dan Persalinan</th>
                <th colspan=8 style="text-align:center; vertical-align: middle;">Status Penerimaan Indikator</th>
            </tr>
            <tr>
                <th style="text-align:center; vertical-align: middle;">
                    <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Usia Kehamilan (Bulan)</span>
                </th>
                <th style="text-align:center; vertical-align: middle;">
                    <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Pemeriksaan Kehamilan</span>
                </th>
                <th style="text-align:center; vertical-align: middle;">
                    <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Dapat & Konsumsi Pil Fe</span>
                </th>
                <th style="text-align:center; vertical-align: middle;">
                    <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Pemeriksaan Nifas</span>
                </th>
                <th style="text-align:center; vertical-align: middle;">
                    <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Konseling Gizi (Kelas IH)</span>
                </th>
                <th style="text-align:center; vertical-align: middle;">
                    <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Kunjungan Rumah</span>
                    
                </th>
                <th style="text-align:center; vertical-align: middle;">
                    <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Kepimilikan Akses Air Bersih</span>
                </th>
                <th style="text-align:center; vertical-align: middle;">
                    <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Kepimilikan Jamban</span>
                </th>
                <th style="text-align:center; vertical-align: middle;">
                    <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Jaminan Kesehatan</span>
                </th>
            </tr>
            <tr>
                <td style="text-align:center;" class="td1"></td>
                <td style="text-align:center;" class="td1">a</td>
                <td style="text-align:center;" class="td1">b</td>
                <td style="text-align:center;" class="td1">c</td>
                <td style="text-align:center;" class="td1">d</td>
                <td style="text-align:center;" class="td1">e</td>
                <td style="text-align:center;" class="td1">f</td>
                <td style="text-align:center;" class="td1">g</td>
                <td style="text-align:center;" class="td1">h</td>
                <td style="text-align:center;" class="td1">i</td>
                <td style="text-align:center;" class="td1">j</td>
                <td style="text-align:center;" class="td1">k</td>
                <td style="text-align:center;" class="td1">l</td>
                <td style="text-align:center;" class="td1">m</td>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../setting/koneksi.php';
            
            $no = 1;
            while($row = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td style="text-align:center;" class="td1"><?php echo $no++ ?></td>
                <td style="text-align:center;" class="td1"><?php echo $row['no_register']; ?></td>
                <td style="text-align:left;" class="td1"><?php echo $row['nama_ibu']; ?></td>
                <td style="text-align:center;" class="td1"><?php echo $row['status_kehamilan']; ?></td>
                <td style="text-align:center;" class="td1"><?php echo date("d/m/Y", strtotime($row['hari_perkiraan_lahir'])); ?></td>
                <td style="text-align:center;" class="td1"><?php echo $row['usia_kehamilan']; ?></td>
                <td style="text-align:center;" class="td1">
                <?php 
                if($row['pemeriksaan_kehamilan'] == 'Y'){
                    echo '&#128504;';
                } else if($row['pemeriksaan_kehamilan'] == 'T'){
                    echo '&#9747;';
                } else{
                    echo $row['pemeriksaan_kehamilan'];
                }
                ?></td>
                <td style="text-align:center;" class="td1">
                <?php
                if($row['dapat_pilfe'] == 'Y'){
                    echo '&#128504;';
                } else if($row['dapat_pilfe'] == 'T'){
                    echo '&#9747;';
                } else{
                    echo $row['dapat_pilfe'];
                }
                ?></td>
                <td style="text-align:center;" class="td1">
                <?php
                if($row['pemeriksaan_nifas'] == 'Y'){
                    echo '&#128504;';
                } else if($row['pemeriksaan_nifas'] == 'T'){
                    echo '&#9747;';
                } else{
                    echo $row['pemeriksaan_nifas'];
                }
                ?></td>
                <td style="text-align:center;" class="td1">
                <?php
                if($row['konseling_gizi'] == 'Y'){
                    echo '&#128504;';
                } else if($row['konseling_gizi'] == 'T'){
                    echo '&#9747;';
                } else{
                    echo $row['konseling_gizi'];
                }
                ?></td>
                <td style="text-align:center;" class="td1">
                <?php
                if($row['kunjungan_rumah'] == 'Y'){
                    echo '&#128504;';
                } else if($row['kunjungan_rumah'] == 'T'){
                    echo '&#9747;';
                } else{
                    echo $row['kunjungan_rumah'];
                }
                ?></td>
                <td style="text-align:center;" class="td1">
                <?php
                if($row['kepem_air_bersih'] == 'Y'){
                    echo '&#128504;';
                } else if($row['kepem_air_bersih'] == 'T'){
                    echo '&#9747;';
                } else{
                    echo $row['kepem_air_bersih'];
                }
                ?></td>
                <td style="text-align:center;" class="td1">
                <?php
                if($row['kepem_jamban'] == 'Y'){
                    echo '&#128504;';
                } else if($row['kepem_jamban'] == 'T'){
                    echo '&#9747;';
                } else{
                    echo $row['kepem_jamban'];
                }
                ?></td>
                <td style="text-align:center;" class="td1">
                <?php
                if($row['jamkes'] == 'Y'){
                    echo '&#128504;';
                } else if($row['jamkes'] == 'T'){
                    echo '&#9747;';
                } else{
                    echo $row['jamkes'];
                }
                ?></td>
                
            </tr>
            <?php

            }
            ?>
            
                
            
            
        </tbody>
        </table>
        
</center>
<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
<?php if($_SESSION['username'] == 'admin'){?>
<div class="footer" style="margin-left: 40rem;">
    <?php if(isset($_POST['cetak_semua'])){?>
        <p>Banjarmasin,	<?php echo tgl_indo(date('Y-m-d')) ?></p>
    <?php
    } else {?>
        <p>Banjarmasin,	<?php echo tgl_indo(date('Y-m-d')) ?></p>
    <?php
    }
    ?>
    <p>Kepala Dinas</p>
    <br><br>
    <p><u><b>Drs. M. HELFIANNOOR, M.Si</b></u><br>Pembina Tingkat I<br>NIP. 19730719 199302 1 002</p>
</div>
<?php } else {?>
    <div class="footer" style="margin-left: 40rem;">
    <p>Banjarmasin,	<?php echo tgl_indo(date('Y-m-d')) ?></p>
    <p>KPM <?php echo $kelurahan; ?></p>
    <br><br>
    <p style="font-weight:bold; text-transform: capitalize;"><?php echo $nama_kpm; ?></p>
</div>
<?php } ?>
<script>
    window.print();
</script>