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
if($stat !== 'kpm'){
    if(isset($_POST['cetak'])){
        $query = mysqli_query($konek,"SELECT * FROM tb_formulir2b f INNER JOIN tb_baduta b ON f.id_baduta = b.id_baduta INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE b.kelurahan='$kelurahan' AND b.bulan=$bulan AND b.tahun=$tahun ORDER BY b.kelurahan");
    }
    if(isset($_POST['cetak_semua'])){
        $query = mysqli_query($konek, "SELECT * FROM tb_formulir2b f INNER JOIN tb_baduta b ON f.id_baduta = b.id_baduta INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil ORDER BY b.kelurahan");
    }
} else {
    $kelurahan = $_POST['kelurahan'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $nama_kpm = $_POST['nama_kpm'];
    if(isset($_POST['cetak'])){
            $query = mysqli_query($konek, "SELECT * FROM tb_formulir2b f INNER JOIN tb_baduta b ON f.id_baduta = b.id_baduta INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE b.kelurahan='$kel' AND b.bulan=$bulan AND b.tahun=$tahun ORDER BY b.kelurahan");
    }
    if(isset($_POST['cetak_semua'])){
        $query = mysqli_query($konek, "SELECT * FROM tb_formulir2b f INNER JOIN tb_baduta b ON f.id_baduta = b.id_baduta INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE b.kelurahan='$kel' ORDER BY b.kelurahan");
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
                <font size="5"><b>PEMERINTAH KOTA BANJARMASIN</b></font><br>
                <font size="3"><b>DINAS PENGENDALIAN PENDUDUK KELUARGA BERENCANA DAN PEMBERDAYAAN MASYARAKAT KOTA BANJARMASIN</b></font><br>
                <font size="3"><b>Jalan Brigjen. H. Hasan Basri - Kayu Tangi II RT. 16 Banjarmasin 70124 | Telp./Fax. (0511) 3301346</b></font><br>
                <font size="3"><b>Email: <u>dppkbpm.bjm@gmail.com</u> / <u>dppkbpm@mail.banjarmasinkota.go.id</u></b></font><br>
                <font size="3"><b>Website: <u>https://dppkbpm.banjarmasinkota.go.id/</u></b></font>
            </center>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr style="height:2px;border-width:0;color:gray;background-color:gray"></td>
        </tr>
        <table class="table table-stripped table-bordered mt-3 table-responsive demo" width="625">
        <H3>LAPORAN 2B PEMANTAUAN BULANAN BAGI ANAK 0-2 TAHUN</H3>
        <thead>
            <tr>
                <th rowspan=3 style="text-align:center; vertical-align: middle;" valign="middle">No</th>
                <?php if($stat !== 'kpm' && isset($_POST['cetak_semua'])){ ?>
                <th rowspan=3 style="text-align:center; vertical-align: middle;">Kecamatan</th>
                <th rowspan=3 style="text-align:center; vertical-align: middle;">Kelurahan</th>
                <?php } ?>
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
                <td></td>
                <?php if($stat !== 'kpm' && isset($_POST['cetak_semua'])){ ?>
                <td style="text-align:center;" class="td1"></td>
                <td style="text-align:center;" class="td1"></td>
                <?php } ?>
                <td style="text-align:center; vertical-align: middle;">a</td>
                <td style="text-align:center; vertical-align: middle;">b</td>
                <td style="text-align:center; vertical-align: middle;">c</td>
                <td style="text-align:center; vertical-align: middle;">d</td>
                <td style="text-align:center; vertical-align: middle;">e</td>
                <td style="text-align:center; vertical-align: middle;">f</td>
                <td style="text-align:center; vertical-align: middle;">g</td>
                <td style="text-align:center; vertical-align: middle;">h</td>
                <td style="text-align:center; vertical-align: middle;">i</td>
                <td style="text-align:center; vertical-align: middle;">j</td>
                <td style="text-align:center; vertical-align: middle;">k1(L)</td>
                <td style="text-align:center; vertical-align: middle;">k2(P)</td>
                <td style="text-align:center; vertical-align: middle;">l</td>
                <td style="text-align:center; vertical-align: middle;">m</td>
                <td style="text-align:center; vertical-align: middle;">n</td>
                <td style="text-align:center; vertical-align: middle;">o</td>
                <td style="text-align:center; vertical-align: middle;">p</td>
                <td style="text-align:center; vertical-align: middle;">q</td>
                
            </tr>
        </thead>
        <tbody>
            <?php
            include '../setting/koneksi.php';
            
            $no = 1;
            while($row = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <?php if($stat !== 'kpm' && isset($_POST['cetak_semua'])){ ?>
                <td class="td1"><?php echo $row['kecamatan']; ?></td>
                <td class="td1"><?php echo $row['kelurahan']; ?></td>
                <?php } ?>
                <td><?php echo $row['no_register']; ?></td>
                <td><?php echo $row['nama_anak']; ?></td>
                <td style="text-align:center; vertical-align: middle;"><?php 
                $jk = $row['jk'];
                echo $jk == 'L' ? 'Laki-laki' : 'Perempuan';
                ?></td>
                <td style="text-align:right; vertical-align: middle;"><?php echo date("d/m/Y", strtotime($row['tgl_lahir_anak'])); ?></td>
                <td style="text-align:center; vertical-align: middle;"><?php echo $row['status_gizi']; ?></td>
                <td style="text-align:center; vertical-align: middle;"><?php echo $row['umur'] ?></td>
                <td style="text-align:center; vertical-align: middle;"><?php 
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
                <td style="text-align:center; vertical-align: middle;">
                <?php 
                if($row['pemberian_imunisasi_dasar'] == 'Y'){
                    echo '&#128504;';
                } else if($row['pemberian_imunisasi_dasar'] == 'T'){
                    echo '&#9747;';
                } else{
                    echo $row['pemberian_imunisasi_dasar'];
                }
                ?></td>
                <td style="text-align:center; vertical-align: middle;">
                <?php
                if($row['berat_badan'] == 'Y'){
                    echo '&#128504;';
                } else if($row['berat_badan'] == 'T'){
                    echo '&#9747;';
                } else{
                    echo $row['berat_badan'];
                }
                ?></td>
                <td style="text-align:center; vertical-align: middle;">
                <?php
                if($row['tinggi_badan'] == 'Y'){
                    echo '&#128504;';
                } else if($row['tinggi_badan'] == 'T'){
                    echo '&#9747;';
                } else{
                    echo $row['tinggi_badan'];
                }
                ?></td>
                <td style="text-align:center; vertical-align: middle;">
                <?php
                if($row['k1L'] == 'Y'){
                    echo '&#128504;';
                } else if($row['k1L'] == 'T'){
                    echo '&#9747;';
                } else{
                    echo $row['k1L'];
                }
                ?></td>
                <td style="text-align:center; vertical-align: middle;">
                <?php
                if($row['k2P'] == 'Y'){
                    echo '&#128504;';
                } else if($row['k2P'] == 'T'){
                    echo '&#9747;';
                } else{
                    echo $row['k2P'];
                }
                ?></td>
                <td style="text-align:center; vertical-align: middle;">
                <?php
                if($row['kunjungan_rumah'] == 'Y'){
                    echo '&#128504;';
                } else if($row['kunjungan_rumah'] == 'T'){
                    echo '&#9747;';
                } else{
                    echo $row['kunjungan_rumah'];
                }
                ?></td>
                <td style="text-align:center; vertical-align: middle;">
                <?php
                if($row['kepem_air_bersih'] == 'Y'){
                    echo '&#128504;';
                } else if($row['kepem_air_bersih'] == 'T'){
                    echo '&#9747;';
                } else{
                    echo $row['kepem_air_bersih'];
                }
                ?></td>
                <td style="text-align:center; vertical-align: middle;">
                <?php
                if($row['kepem_jamban'] == 'Y'){
                    echo '&#128504;';
                } else if($row['kepem_jamban'] == 'T'){
                    echo '&#9747;';
                } else{
                    echo $row['kepem_jamban'];
                }
                ?></td>
                <td style="text-align:center; vertical-align: middle;">
                <?php
                if($row['akta_lahir'] == 'Y'){
                    echo '&#128504;';
                } else if($row['akta_lahir'] == 'T'){
                    echo '&#9747;';
                } else{
                    echo $row['akta_lahir'];
                }
                ?></td>
                <td style="text-align:center; vertical-align: middle;">
                <?php
                if($row['jamkes'] == 'Y'){
                    echo '&#128504;';
                } else if($row['jamkes'] == 'T'){
                    echo '&#9747;';
                } else{
                    echo $row['jamkes'];
                }
                ?></td>
                <td style="text-align:center; vertical-align: middle;">
                <?php
                if($row['pengasuhan_paud'] == 'Y'){
                    echo '&#128504;';
                } else if($row['pengasuhan_paud'] == 'T'){
                    echo '&#9747;';
                } else{
                    echo $row['pengasuhan_paud'];
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
<?php if($_SESSION['status'] !== 'kpm'){?>
<div class="footer" style="margin-left: 55rem;">
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
    <div class="footer" style="margin-left: 55rem;">
    <p>Banjarmasin,	<?php echo tgl_indo(date('Y-m-d')) ?></p>
    <p>KPM <?php echo $kelurahan; ?></p>
    <br>
    <p style="font-weight:bold; text-transform: capitalize;"><?php echo $nama_kpm; ?></p>
</div>
<?php } ?>
<script>
    window.print();
</script>