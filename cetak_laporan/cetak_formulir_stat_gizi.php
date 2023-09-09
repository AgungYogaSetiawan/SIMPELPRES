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
$bulan = $_POST['bulan'];
$bulan2 = $_POST['bulan2'];
if($stat == 'kpm'){
    $nama_kpm = $_POST['nama_kpm'];
}
if($bulan == 1 and $bulan2 == 3){
    $kuartal = "Kuartal 1";
} else if($bulan == 4 and $bulan2 == 6){
    $kuartal = "Kuartal 2";
} else if($bulan == 7 and $bulan2 == 9){
    $kuartal = "Kuartal 3";
} else if($bulan == 10 and $bulan2 == 12){
    $kuartal = "Kuartal 4";
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
		<table class="table table-stripped table-bordered mt-3 table-responsive demo" id="tabel" width="850" cellspacing="0">
            <H3>LAPORAN STATUS GIZI ANAK</H3>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Nama Anak</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir Anak</th>
                    <th>Gizi Anak</th>
                    <th>Umur (Bulan)</th>
                    <th>Hasil</th>
                </tr>
            </thead>
            <tbody>
            <?php
            include '../setting/koneksi.php';
            if($stat !== 'kpm' && isset($_POST['cetak'])){
                $query = mysqli_query($konek, "SELECT * FROM (((((tb_status_gizi s INNER JOIN tb_formulir3b a ON s.id_formulir_tigaB=a.id_formulir_tigaB) INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) INNER JOIN tb_hasil h ON h.id_hasil=b.id_hasil) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
            } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                $query = mysqli_query($konek, "SELECT * FROM (((((tb_status_gizi s INNER JOIN tb_formulir3b a ON s.id_formulir_tigaB=a.id_formulir_tigaB) INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON g.id_gizi_anak=b.id_gizi_anak) INNER JOIN tb_hasil h ON h.id_hasil=b.id_hasil)");
            } else if($stat == 'kpm' && isset($_POST['cetak'])){
                $query = mysqli_query($konek, "SELECT * FROM (((((tb_status_gizi s INNER JOIN tb_formulir3b a ON s.id_formulir_tigaB=a.id_formulir_tigaB) INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) INNER JOIN tb_hasil h ON h.id_hasil=b.id_hasil) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2 ORDER BY b.kelurahan DESC");
            } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                $query = mysqli_query($konek, "SELECT * FROM (((((tb_status_gizi s INNER JOIN tb_formulir3b a ON s.id_formulir_tigaB=a.id_formulir_tigaB) INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) INNER JOIN tb_hasil h ON h.id_hasil=b.id_hasil) WHERE b.kelurahan='$kel' ORDER BY b.kelurahan DESC");
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
                <td><?php echo getBulan($row['bulan']); ?></td>
                <td><?php echo $row['tahun']; ?></td>
                <td><?php echo $row['nama_anak']; ?></td>
                <td><?php
                $jk = $row['jk'];
                echo $jk == 'L' ? 'Laki-laki' : 'Perempuan';
                ?></td>
                <td><?php echo date("d/m/Y", strtotime($row['tgl_lahir_anak'])); ?></td>
                <td><?php echo $row['status_gizi']; ?></td>
                <td align="center"><?php echo $row['umur']; ?></td>
                <td><?php 
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