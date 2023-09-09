<?php
include '../setting/koneksi.php';
session_start();

// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
    header("location:../login/halaman_login.php");
}


$kel = $_SESSION['username'];
$stat = $_SESSION['status'];
$kelurahan = $_POST['kelurahan'];
$tgl_awal = $_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];
$hasil = $_POST['hasil'];
if($stat == 'kpm'){
    $nama_kpm = $_POST['nama_kpm'];
}
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

// function  getBulan($bln){
//     switch  ($bln){
//         case  1:
//         return  "Januari";
//         break;
//         case  2:
//         return  "Februari";
//         break;
//         case  3:
//         return  "Maret";
//         break;
//         case  4:
//         return  "April";
//         break;
//         case  5:
//         return  "Mei";
//         break;
//         case  6:
//         return  "Juni";
//         break;
//         case  7:
//         return  "Juli";
//         break;
//         case  8:
//         return  "Agustus";
//         break;
//         case  9:
//         return  "September";
//         break;
//         case  10:
//         return  "Oktober";
//         break;
//         case  11:
//         return  "November";
//         break;
//         case  12:
//         return  "Desember";
//         break;
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
            <H3>LAPORAN PREDIKSI STUNTING DI BANJARMASIN</H3>
            <thead>
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
            include '../setting/koneksi.php';
            if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                $query = mysqli_query($konek, "SELECT * FROM tb_prediksi");
            } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                $query = mysqli_query($konek, "SELECT * FROM tb_prediksi WHERE kelurahan='$kel' ORDER BY kelurahan DESC");
            } else if($stat !== 'kpm' && isset($_POST['cetak'])){
                $query = mysqli_query($konek, "SELECT * FROM tb_prediksi WHERE kelurahan='$kelurahan' AND hasil='$hasil' AND tgl_input BETWEEN '$tgl_awal' AND '$tgl_akhir'");
            } else if($stat == 'kpm' && isset($_POST['cetak'])){
                $query = mysqli_query($konek, "SELECT * FROM tb_prediksi WHERE kelurahan='$kel' AND hasil='$hasil' AND tgl_input BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY kelurahan DESC");
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