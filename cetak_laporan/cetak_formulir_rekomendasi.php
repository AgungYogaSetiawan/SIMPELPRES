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
$tahun = $_POST['tahun'];
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
    .td1 {
        text-align: center;
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
        <H3>LAPORAN REKOMENDASI INTERVENSI PENCEGAHAN STUNTING</H3>
            <thead>
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
                    <th colspan="13" style="text-align:center; vertical-align: middle;">
                    <?php
                    if(isset($_POST['cetak'])){
                        echo getBulan($bulan);
                    } else if(isset($_POST['cetak_semua'])){
                        $bulan = date('n');
                        $nama_bulan = [
                            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                        ];
                        echo $nama_bulan[$bulan - 1];
                    }
                    ?> 
                    <?php 
                    if(isset($_POST['cetak'])){
                        echo $tahun;
                    } else if(isset($_POST['cetak_semua'])){
                        echo date('Y');
                    }
                    ?>
                    </th>
                    <th rowspan=3 style="text-align:center; vertical-align: middle;">Rekomendasi Pencegahan Stunting<br><span style="color: #1ABA80; visibility:hidden;">gggggggggggggggggggggggggggggggggggg</span>
                    </th>
                    
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
                <tr align="center">
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
                include '../setting/koneksi.php';
                if($stat !== 'kpm' && isset($_POST['cetak'])){
                    $query = mysqli_query($konek, "SELECT r.*, f.*, b.*, g.status_gizi, h.hasil, p.deskripsi FROM tb_intervensi r, tb_formulir2b f, tb_baduta b, tb_gizi_anak g, tb_hasil h, tb_pencegahan p WHERE r.id_formulir_duaB=f.id_formulir_duaB AND f.id_baduta=b.id_baduta AND b.id_gizi_anak=g.id_gizi_anak AND b.id_hasil=h.id_hasil AND b.kelurahan='$kelurahan' AND b.bulan=$bulan AND b.tahun=$tahun AND g.status_gizi = 'STUNTING' GROUP BY r.id_formulir_duaB ORDER BY b.kelurahan DESC");
                } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                    $query = mysqli_query($konek, "SELECT r.*, f.*, b.*, g.status_gizi, h.hasil, p.deskripsi FROM tb_intervensi r, tb_formulir2b f, tb_baduta b, tb_gizi_anak g, tb_hasil h, tb_pencegahan p WHERE r.id_formulir_duaB=f.id_formulir_duaB AND f.id_baduta=b.id_baduta AND b.id_gizi_anak=g.id_gizi_anak AND b.id_hasil=h.id_hasil AND g.status_gizi = 'STUNTING' GROUP BY r.id_formulir_duaB ORDER BY b.kelurahan DESC");
                } else if($stat == 'kpm' && isset($_POST['cetak'])){
                    $query = mysqli_query($konek, "SELECT r.*, f.*, b.*, g.status_gizi, h.hasil, p.deskripsi FROM tb_intervensi r, tb_formulir2b f, tb_baduta b, tb_gizi_anak g, tb_hasil h, tb_pencegahan p WHERE r.id_formulir_duaB=f.id_formulir_duaB AND f.id_baduta=b.id_baduta AND b.id_gizi_anak=g.id_gizi_anak AND b.id_hasil=h.id_hasil AND b.kelurahan='$kel' AND b.bulan=$bulan AND b.tahun=$tahun AND g.status_gizi = 'STUNTING' GROUP BY r.id_formulir_duaB ORDER BY b.kelurahan DESC");
                } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                    $query = mysqli_query($konek, "SELECT r.*, f.*, b.*, g.status_gizi, h.hasil, p.deskripsi FROM tb_intervensi r, tb_formulir2b f, tb_baduta b, tb_gizi_anak g, tb_hasil h, tb_pencegahan p WHERE r.id_formulir_duaB=f.id_formulir_duaB AND f.id_baduta=b.id_baduta AND b.id_gizi_anak=g.id_gizi_anak AND b.id_hasil=h.id_hasil AND b.kelurahan='$kel' AND g.status_gizi = 'STUNTING' GROUP BY r.id_formulir_duaB ORDER BY b.kelurahan DESC");
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
                    <td class="td1"><?php echo $no++ ?></td>
                    <td><?php echo $row['kelurahan']; ?></td>
                    <td><?php echo $row['kecamatan']; ?></td>
                    <td class="td1" align="center"><?php echo getBulan($row['bulan']); ?></td>
                    <td class="td1" align="center"><?php echo $row['tahun']; ?></td>
                    <td class="td1"><?php echo $row['no_register']; ?></td>
                    <td><?php echo $row['nama_anak']; ?></td>
                    <td class="td1" align="center"><?php 
                    $jk = $row['jk'];
                    echo $jk == 'L' ? 'Laki-laki' : 'Perempuan';
                    ?></td>
                    <td class="td1" align="center"><?php echo date("d/m/Y", strtotime($row['tgl_lahir_anak'])); ?></td>
                    <td class="td1" align="center"><?php echo $row['status_gizi']; ?></td>
                    <td class="td1" align="center"><?php echo $row['umur'] ?></td>
                    <td class="td1" align="center"><?php 
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
                    <td style="max-width:150px;">
                        <?php
                        $sql_pencegahan = mysqli_query($konek, "SELECT a.*,b.deskripsi FROM tb_rekomendasi a, tb_pencegahan b WHERE a.id_pencegahan=b.id_pencegahan AND a.id_intervensi='$row[id_intervensi]'");
                        while($row_pencegahan = mysqli_fetch_array($sql_pencegahan)){
                            echo $row_pencegahan['deskripsi']."<br>";
                        }
                        ?>
                    </td>
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
<div class="footer" style="margin-left: 65rem;">
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
    <div class="footer" style="margin-left: 65rem;">
    <p>Banjarmasin,	<?php echo tgl_indo(date('Y-m-d')) ?></p>
    <p>KPM <?php echo $kelurahan; ?></p>
    <br><br>
    <p style="font-weight:bold; text-transform: capitalize;"><?php echo $nama_kpm; ?></p>
</div>
<?php } ?>
<script>
    window.print();
</script>