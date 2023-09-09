<?php
include '../setting/koneksi.php';
session_start();

// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
    header("location:../login/halaman_login.php");
}


$kel = $_SESSION['username'];
$kelurahan = $_POST['kelurahan'];
$stat = $_SESSION['status'];
if($stat == 'kpm'){
    $nama_kpm = $_POST['nama_kpm'];
}
$tahun = $_POST['tahun'];
// $tgl_akhir = $_POST['tgl_akhir'];
// if($kel == 'admin'){
//     if(isset($_POST['cetak'])){
//         $query = mysqli_query($konek, "SELECT * FROM tb_formulir2a f INNER JOIN tb_bumil b ON f.id_bumil = b.id_bumil INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan WHERE b.kelurahan='$kelurahan' AND b.bulan=$bulan AND b.tahun=$tahun");
//     }
//     if(isset($_POST['cetak_semua'])){
//         $query = mysqli_query($konek, "SELECT * FROM tb_formulir2a f INNER JOIN tb_bumil b ON f.id_bumil=b.id_bumil INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan");
//     }
// } else {
//     $kelurahan = $_POST['kelurahan'];
//     $bulan = $_POST['bulan'];
//     $tahun = $_POST['tahun'];
//     $nama_kpm = $_POST['nama_kpm'];
//     if(isset($_POST['cetak'])){
//         $query = mysqli_query($konek, "SELECT * FROM tb_formulir2a f INNER JOIN tb_bumil b ON f.id_bumil = b.id_bumil INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan WHERE b.kelurahan='$kel' AND b.bulan=$bulan AND b.tahun=$tahun");
//     }
//     if(isset($_POST['cetak_semua'])){
//         $query = mysqli_query($konek, "SELECT * FROM tb_formulir2a f INNER JOIN tb_bumil b ON f.id_bumil=b.id_bumil INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan WHERE b.kelurahan='$kel'");
//     }
    
// }
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
        <H3>LAPORAN PROGRAM KERJA TAHUNAN UNTUK PENCEGAHAN STUNTING</H3>
        <thead>
            <tr>
                <th>No</th>
                <th>Kelurahan</th>
                <th>Kecamatan</th>
                <th>Nama Kegiatan</th>
                <th>Tujuan</th>
                <th>Sasaran</th>
                <th>Tempat Pelaksanaan</th>
                <th>Waktu Pelaksanaan</th>
                <th>Anggaran</th>
                <th>Indikator Keberhasilan</th>
                <th>Penanggung Jawab</th>
                <th>Mitra Kerja</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            include '../setting/koneksi.php';
            if($stat !== 'kpm' && isset($_POST['cetak'])){
                $tahun = $_POST['tahun'];
                $query = mysqli_query($konek, "SELECT a.*, b.kelurahan, c.kecamatan FROM tb_progjer a, tb_kelurahan b, tb_kecamatan c WHERE a.id_kelurahan=b.id AND a.id_kecamatan=c.id AND b.id='$kelurahan' AND a.tahun = $tahun");
            } else if($stat == 'kpm' && isset($_POST['cetak'])){
                $tahun = $_POST['tahun'];
                $query = mysqli_query($konek, "SELECT a.*, b.kelurahan, c.kecamatan FROM tb_progjer a, tb_kelurahan b, tb_kecamatan c WHERE a.id_kelurahan=b.id AND a.id_kecamatan=c.id AND b.id='$kel' AND a.tahun = $tahun");
            } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                $query = mysqli_query($konek, "SELECT a.*, b.kelurahan, c.kecamatan FROM tb_progjer a, tb_kelurahan b, tb_kecamatan c WHERE a.id_kelurahan=b.id AND a.id_kecamatan=c.id");
            } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                $query = mysqli_query($konek, "SELECT a.*, b.kelurahan, c.kecamatan FROM tb_progjer a, tb_kelurahan b, tb_kecamatan c WHERE a.id_kelurahan=b.id AND a.id_kecamatan=c.id AND b.id='$kel'");
            }
            $no = 1;
            while($row = mysqli_fetch_array($query)){
                setlocale(LC_TIME, 'id_ID');
                $tanggal_format = strftime('%d %B %Y', strtotime($row['waktu_pelaksanaan']));
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['kelurahan']; ?></td>
                <td><?php echo $row['kecamatan']; ?></td>
                <td><?php echo $row['nm_kegiatan']; ?></td>
                <td><?php echo $row['tujuan']; ?></td>
                <td><?php echo $row['sasaran']; ?></td>
                <td><?php echo $row['tmpt_pelaksanaan']; ?></td>
                <td><?php echo $tanggal_format; ?></td>
                <td><?php echo 'Rp. ' . number_format($row['anggaran'], 0, ',', '.') . ',-'; ?></td>
                <td><?php echo $row['indikator']; ?></td>
                <td><?php echo $row['penanggung_jawab']; ?></td>
                <td><?php echo $row['mitra_kerja']; ?></td>
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
<?php if($_SESSION['status'] !== 'kpm'){?>
<div class="footer" style="margin-left: 40rem;">
    <?php if(isset($_POST['cetak_semua'])){?>
        <p>Banjarmasin,	<?php echo tgl_indo(date('Y-m-d')) ?> </p>
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
    <p>KPM <?php echo $kel; ?></p>
    <br><br>
    <p style="font-weight:bold; text-transform: capitalize;"><?php echo $nama_kpm; ?></p>
</div>
<?php } ?>
<script>
    window.print();
</script>