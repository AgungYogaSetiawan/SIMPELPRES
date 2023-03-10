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
        $query = mysqli_query($konek,"SELECT * FROM tb_formulir2c f INNER JOIN tb_balita b ON f.id_balita = b.id_balita WHERE b.kelurahan='$kelurahan' AND b.bulan='$bulan' AND b.tahun='$tahun'");
    }
    if(isset($_POST['cetak_semua'])){
    $query = mysqli_query($konek, "SELECT * FROM tb_formulir2c f INNER JOIN tb_balita b ON f.id_balita = b.id_balita");
    }
} else {
    $kelurahan = $_POST['kelurahan'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $nama_kpm = $_POST['nama_kpm'];
    if(isset($_POST['cetak'])){
        $query = mysqli_query($konek, "SELECT * FROM tb_formulir2c f INNER JOIN tb_balita b ON f.id_balita = b.id_balita WHERE b.kelurahan='$kel' AND b.bulan='$bulan' AND b.tahun='$tahun'");
    }
    if(isset($_POST['cetak_semua'])){
    $query = mysqli_query($konek, "SELECT * FROM tb_formulir2c f INNER JOIN tb_balita b ON f.id_balita = b.id_balita WHERE b.kelurahan='$kel'");
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
            <td colspan="2"><hr style="height:2px;border-width:0;color:gray;background-color:gray"></td>
        </tr>
        <table class="table table-stripped table-bordered mt-3 table-responsive demo" width="860">
        <H3>LAPORAN 2C PEMANTAUAN BULANAN BAGI ANAK >2-6 TAHUN</H3>
        <thead>
            <tr>
                <th rowspan=4 class="th1" style="text-align:center; vertical-align: middle;">No</th>
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
            </tr>
            <tr>
                <th colspan=12 class="th1" style="text-align:center; vertical-align: middle;">Mengikuti Layanan PAUD (Parenting Bagi Orang Tua Anak Usia)</th>
            <tr>
                <th colspan=12 style="text-align:left; vertical-align: middle;"><?php echo $bulan ?> <?php echo $tahun; ?></th>
            </tr>
                
            </tr>
            <tr>
                <th rowspan=3 class="th1" style="text-align:center; vertical-align: middle;">
                    <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Usia Anak</span>
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
                <td align="center" class="td1"></td>
                <td align="center" class="td1">a</td>
                <td align="center" class="td1">b</td>
                <td align="center" class="td1">c</td>
                <td align="center" class="td1">d</td>
                <td align="center" class="td1">e</td>
                <td align="center" class="td1">f</td>
                <td align="center" class="td1">g</td>
                <td align="center" class="td1">h</td>
                <td align="center" class="td1">i</td>
                <td align="center" class="td1">j</td>
                <td align="center" class="td1">k</td>
                <td align="center" class="td1">l</td>
                <td align="center" class="td1">m</td>
                <td align="center" class="td1">n</td>
                <td align="center" class="td1">o</td>
                <td align="center" class="td1">p</td>
                <td align="center" class="td1">q</td>
            </tr>
            <?php
            include '../setting/koneksi.php';
            $no = 1;
            while($row = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td class="td1"><?php echo $no++ ?></td>
                <td class="td1"><?php echo $row['no_rmh_tangga'];?></td>
                <td class="td1"><?php echo $row['nama_anak'];?></td>
                <td class="td1" align="center"><?php echo $row['jk'];?></td>
                <td class="td1"><?php echo date("d/m/Y", strtotime($row['tgl_lahir'])); ?></td>
                <td class="td1" align="center"><?php echo $row['usia_anak'];?></td>
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
    <p>Banjarmasin, <?php echo tgl_indo(date('Y-m-d')) ?></p>
    <p>KPM <?php echo $kelurahan; ?></p>
    <br><br>
    <p style="font-weight:bold; text-transform: capitalize;"><?php echo $nama_kpm; ?></p>
</div>
<?php } ?>
<script>
    window.print();
</script>