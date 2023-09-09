<?php
include '../setting/koneksi.php';
session_start();

// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
    header("location:../login/halaman_login.php");
}


$kel = $_SESSION['username'];
$stat = $_SESSION['status'];
if($stat == 'kpm') {
    $nama_kpm = $_POST['nama_kpm'];
}
$kelurahan = $_POST['kelurahan'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
// $jk = $_POST['filter-jk'];
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
        </table>
        <H3>LAPORAN GRAFIK STATUS GIZI ANAK</H3>
        <canvas id="chart"></canvas>
            

        
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
<div class="footer" style="margin-left: 50rem;">
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
    <div class="footer" style="margin-left: 50rem;">
    <p>Banjarmasin,	<?php echo tgl_indo(date('Y-m-d')) ?></p>
    <p>KPM <?php echo $kelurahan; ?></p>
    <br><br>
    <p style="font-weight:bold; text-transform: capitalize;"><?php echo $nama_kpm; ?></p>
</div>
<?php } ?>
<script>
    window.print();
</script>
<!-- Tautan ke file Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- grafik charts.js -->
<script>
// Mengonversi data JSON ke array JavaScript
// Generate array warna latar belakang acak
// var backgroundColors = [];
// for (var i = 0; i < 5; i++) {
//     var randomColor = "rgba(" + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", 0.5)";
//     backgroundColors.push(randomColor);
// }

// Membuat grafik menggunakan Charts.js
var ctx = document.getElementById("chart").getContext("2d");
var chart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: ["BURUK","KURANG","STUNTING","NORMAL"],
        datasets: [{
            label: "Status Gizi Anak Perempuan",
            data: [
                <?php
                if($stat !== 'kpm' && isset($_POST['cetak'])) {
                    $jumlah_buruk = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='BURUK' AND a.kelurahan='$kelurahan' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                    $jumlah_buruk = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='BURUK' AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                    $jumlah_buruk = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='BURUK' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat == 'kpm' && isset($_POST['cetak_semua'])) {
                    $jumlah_buruk = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='BURUK' AND a.jk='P' AND a.kelurahan='$kel' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                }
                while($row_buruk = mysqli_fetch_array($jumlah_buruk)){
                    echo $row_buruk['total'];
                }
                ?>,
                <?php
                if($stat !== 'kpm' && isset($_POST['cetak'])) {
                    $jumlah_kurang = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='KURANG' AND a.kelurahan='$kelurahan' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                    $jumlah_kurang = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='KURANG' AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                    $jumlah_kurang = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='KURANG' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat == 'kpm' && isset($_POST['cetak_semua'])) {
                    $jumlah_kurang = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='KURANG' AND a.jk='P' AND a.kelurahan='$kel' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                }
                while($row_kurang = mysqli_fetch_array($jumlah_kurang)){
                    echo $row_kurang['total'];
                }
                ?>,
                <?php
                if($stat !== 'kpm' && isset($_POST['cetak'])) {
                    $jumlah_stunting = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='STUNTING' AND a.kelurahan='$kelurahan' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                    $jumlah_stunting = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='STUNTING' AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                    $jumlah_stunting = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='STUNTING' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat == 'kpm' && isset($_POST['cetak_semua'])) {
                    $jumlah_stunting = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='STUNTING' AND a.jk='P' AND a.kelurahan='$kel' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                }
                while($row_stunting = mysqli_fetch_array($jumlah_stunting)){
                    echo $row_stunting['total'];
                }
                ?>,
                <?php
                if($stat !== 'kpm' && isset($_POST['cetak'])) {
                    $jumlah_normal = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='NORMAL' AND a.kelurahan='$kelurahan' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                    $jumlah_normal = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='NORMAL' AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='P' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                    $jumlah_normal = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='NORMAL' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat == 'kpm' && isset($_POST['cetak_semua'])) {
                    $jumlah_normal = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='NORMAL' AND a.jk='P' AND a.kelurahan='$kel' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                }
                while($row_normal = mysqli_fetch_array($jumlah_normal)){
                    echo $row_normal['total'];
                }
                ?>
            ],
            backgroundColor:  [
            'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
            'rgba(255,99,132,1)'
            ],
            borderWidth: 1
            },
            {
            label: "Status Gizi Anak Laki-laki",
            data: [
                <?php
                if($stat !== 'kpm' && isset($_POST['cetak'])) {
                    $jumlah_buruk = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='BURUK' AND a.kelurahan='$kelurahan' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                    $jumlah_buruk = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='BURUK' AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                    $jumlah_buruk = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='BURUK' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat == 'kpm' && isset($_POST['cetak_semua'])) {
                    $jumlah_buruk = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='BURUK' AND a.jk='L' AND a.kelurahan='$kel' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                }
                while($row_buruk = mysqli_fetch_array($jumlah_buruk)){
                    echo $row_buruk['total'];
                }
                ?>,
                <?php
                if($stat !== 'kpm' && isset($_POST['cetak'])) {
                    $jumlah_kurang = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='KURANG' AND a.kelurahan='$kelurahan' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                    $jumlah_kurang = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='KURANG' AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                    $jumlah_kurang = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='KURANG' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat == 'kpm' && isset($_POST['cetak_semua'])) {
                    $jumlah_kurang = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='KURANG' AND a.jk='L' AND a.kelurahan='$kel' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                }
                while($row_kurang = mysqli_fetch_array($jumlah_kurang)){
                    echo $row_kurang['total'];
                }
                ?>,
                <?php
                if($stat !== 'kpm' && isset($_POST['cetak'])) {
                    $jumlah_stunting = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='STUNTING' AND a.kelurahan='$kelurahan' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                    $jumlah_stunting = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='STUNTING' AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                    $jumlah_stunting = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='STUNTING' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat == 'kpm' && isset($_POST['cetak_semua'])) {
                    $jumlah_stunting = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='STUNTING' AND a.jk='L' AND a.kelurahan='$kel' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                }
                while($row_stunting = mysqli_fetch_array($jumlah_stunting)){
                    echo $row_stunting['total'];
                }
                ?>,
                <?php
                if($stat !== 'kpm' && isset($_POST['cetak'])) {
                    $jumlah_normal = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='NORMAL' AND a.kelurahan='$kelurahan' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                    $jumlah_normal = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='NORMAL' AND a.kelurahan='$kel' AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                    $jumlah_normal = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='NORMAL' AND a.jk='L' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                } else if($stat == 'kpm' && isset($_POST['cetak_semua'])) {
                    $jumlah_normal = mysqli_query($konek,"SELECT b.status_gizi, COUNT(*) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.status_gizi='NORMAL' AND a.jk='L' AND a.kelurahan='$kel' GROUP BY b.status_gizi ORDER BY b.status_gizi");
                }
                while($row_normal = mysqli_fetch_array($jumlah_normal)){
                    echo $row_normal['total'];
                }
                ?>
            ],
            backgroundColor:  [
            'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 1
            }
        ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        }
    });
</script>