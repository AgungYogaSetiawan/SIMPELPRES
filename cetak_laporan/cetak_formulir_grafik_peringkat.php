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
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$jk = $_POST['filter-jk'];
// $status = $_POST['filter-status'];


// TERTINGGI //
// NORMAL
$kelurahan = array();
$total = array();
if($stat !== 'kpm' && isset($_POST['cetak'])){
    $query = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=1 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
} else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
    $query = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=1 GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
} else if($stat == 'kpm' && isset($_POST['cetak'])){
    $query = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=1 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' AND a.kelurahan='$kel' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
} else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
    $query = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=1 AND a.kelurahan='$kel' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
}
while($row = mysqli_fetch_array($query)){
    $kelurahan[] = $row['kelurahan'];
    $total[] = $row['total'];
}
$kelurahan = json_encode($kelurahan);
$total = json_encode($total);

// KURANG
$kelurahan2 = array();
$total2 = array();
if($stat !== 'kpm' && isset($_POST['cetak'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=2 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
} else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=2 GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
} else if($stat == 'kpm' && isset($_POST['cetak'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=2 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' AND a.kelurahan='$kel' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
} else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=2 AND a.kelurahan='$kel' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
}
while($row = mysqli_fetch_array($query2)){
    $kelurahan2[] = $row['kelurahan'];
    $total2[] = $row['total'];
}
$kelurahan2 = json_encode($kelurahan2);
$total2 = json_encode($total2);


// BURUK
$kelurahan3 = array();
$total3 = array();
if($stat !== 'kpm' && isset($_POST['cetak'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=3 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
} else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=3 GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
} else if($stat == 'kpm' && isset($_POST['cetak'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=3 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' AND a.kelurahan='$kel' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
} else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=3 AND a.kelurahan='$kel' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
}
while($row = mysqli_fetch_array($query2)){
    $kelurahan3[] = $row['kelurahan'];
    $total3[] = $row['total'];
}
$kelurahan3 = json_encode($kelurahan3);
$total3 = json_encode($total3);


// STUNTING
$kelurahan4 = array();
$total4 = array();
if($stat !== 'kpm' && isset($_POST['cetak'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=4 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
} else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=4 GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
} else if($stat == 'kpm' && isset($_POST['cetak'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=4 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' AND a.kelurahan='$kel' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
} else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=4 AND a.kelurahan='$kel' GROUP BY a.kelurahan ORDER BY total DESC LIMIT 10");
}
while($row = mysqli_fetch_array($query2)){
    $kelurahan4[] = $row['kelurahan'];
    $total4[] = $row['total'];
}
$kelurahan4 = json_encode($kelurahan4);
$total4 = json_encode($total4);


// TERENDAH //
// NORMAL
$kelurahan5 = array();
$total5 = array();
if($stat !== 'kpm' && isset($_POST['cetak'])){
    $query = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=1 AND a.bulan='$bulan' OR a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
} else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
    $query = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=1 GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
} else if($stat == 'kpm' && isset($_POST['cetak'])){
    $query = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=1 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' AND a.kelurahan='$kel' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
} else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
    $query = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=1 AND a.kelurahan='$kel' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
}
while($row = mysqli_fetch_array($query)){
    $kelurahan5[] = $row['kelurahan'];
    $total5[] = $row['total'];
}
$kelurahan5 = json_encode($kelurahan5);
$total5 = json_encode($total5);

// KURANG
$kelurahan6 = array();
$total6 = array();
if($stat !== 'kpm' && isset($_POST['cetak'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=2 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
} else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=2 GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
} else if($stat == 'kpm' && isset($_POST['cetak'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=2 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' AND a.kelurahan='$kel' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
} else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=2 AND a.kelurahan='$kel' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
}
while($row = mysqli_fetch_array($query2)){
    $kelurahan6[] = $row['kelurahan'];
    $total6[] = $row['total'];
}
$kelurahan6 = json_encode($kelurahan6);
$total6 = json_encode($total6);


// BURUK
$kelurahan7 = array();
$total7 = array();
if($stat !== 'kpm' && isset($_POST['cetak'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=3 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
} else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=3 GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
} else if($stat == 'kpm' && isset($_POST['cetak'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=3 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' AND a.kelurahan='$kel' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
} else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=3 AND a.kelurahan='$kel' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
}
while($row = mysqli_fetch_array($query2)){
    $kelurahan7[] = $row['kelurahan'];
    $total7[] = $row['total'];
}
$kelurahan7 = json_encode($kelurahan7);
$total7 = json_encode($total7);


// STUNTING
$kelurahan8 = array();
$total8 = array();
if($stat !== 'kpm' && isset($_POST['cetak'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=4 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
} else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=4 GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
} else if($stat == 'kpm' && isset($_POST['cetak'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=4 AND a.bulan='$bulan' AND a.tahun='$tahun' AND a.jk='$jk' AND a.kelurahan='$kel' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
} else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
    $query2 = mysqli_query($konek, "SELECT a.kelurahan, COUNT(a.id_gizi_anak) AS total FROM tb_baduta a, tb_gizi_anak b WHERE a.id_gizi_anak=b.id_gizi_anak AND b.id_gizi_anak=4 AND a.kelurahan='$kel' GROUP BY a.kelurahan ORDER BY total ASC LIMIT 10");
}
while($row = mysqli_fetch_array($query2)){
    $kelurahan8[] = $row['kelurahan'];
    $total8[] = $row['total'];
}
$kelurahan8 = json_encode($kelurahan8);
$total8 = json_encode($total8);
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
        <H3>LAPORAN GRAFIK STATUS GIZI ANAK TERTINGGI DAN TERENDAH</H3>
        <?php if($stat !== 'kpm'){ ?>
        <canvas id="chart"></canvas>
        <canvas id="chart-kurang"></canvas>
        <canvas id="chart-buruk"></canvas>
        <canvas id="chart-stunting"></canvas>
        <canvas id="chart2"></canvas>
        <canvas id="chart-kurang-rendah"></canvas>
        <canvas id="chart-buruk-rendah"></canvas>
        <canvas id="chart-stunting-rendah"></canvas>
        <?php } else { ?>
        <canvas id="chart-total-rendah"></canvas>
        <?php } ?>


        
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
<div class="footer" style="margin-left: 57rem;">
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
    <div class="footer" style="margin-left: 57rem;">
    <p>Banjarmasin,	<?php echo tgl_indo(date('Y-m-d')) ?></p>
    <p>KPM <?php echo $kel; ?></p>
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
<?php if($stat == 'kpm'){ ?>
<script>
        // Mengonversi data JSON ke array JavdESCript
        // Generate array warna latar belakang acak
        // var backgroundColors = [];
        // for (var i = 0; i < 5; i++) {
        //     var randomColor = "rgba(" + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", 0.5)";
        //     backgroundColors.push(randomColor);
        // }

        // Membuat grafik menggunakan Charts.js
        var ctx = document.getElementById("chart-total-rendah").getContext("2d");
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: 
                    <?php echo $kelurahan; ?>
                ,
                datasets: [
                {
                    label: "Normal",
                    data: 
                        <?php echo $total; ?>
                    ,
                    backgroundColor:  [
					'rgba(0, 235, 71, 0.8)'
					],
                    borderColor: [
					'rgba(0, 235, 71, 0.8)'
					],
                    borderWidth: 1
                },
                {
                    label: "Kurang",
                    data: 
                        <?php echo $total2; ?>
                    ,
                    backgroundColor:  [
					'rgba(192, 207, 0, 0.8)'
					],
                    borderColor: [
					'rgba(192, 207, 0, 0.8)'
					],
                    borderWidth: 1
                },
                {
                    label: "Buruk",
                    data: 
                        <?php echo $total3; ?>
                    ,
                    backgroundColor:  [
					'rgba(255, 231, 3, 0.8)'
					],
                    borderColor: [
					'rgba(255, 231, 3, 0.8)'
					],
                    borderWidth: 1
                },
                {
                    label: "Stunting",
                    data: 
                        <?php echo $total4; ?>
                    ,
                    backgroundColor:  [
					'rgba(248, 68, 29, 0.8)'
					],
                    borderColor: [
					'rgba(248, 68, 29, 0.8)'
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
<?php } else { ?>

<script>
        // Mengonversi data JSON ke array JavdESCript
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
                labels: 
                    <?php echo $kelurahan; ?>   
                ,
                datasets: [
                {
                    label: "Normal",
                    data: 
                        <?php echo $total; ?>
                    ,
                    backgroundColor:  [
					'rgba(0, 235, 71, 0.8)'
					],
                    borderColor: [
					'rgba(0, 235, 71, 0.8)'
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

    <script>
        // Mengonversi data JSON ke array JavdESCript
        // Generate array warna latar belakang acak
        // var backgroundColors = [];
        // for (var i = 0; i < 5; i++) {
        //     var randomColor = "rgba(" + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", 0.5)";
        //     backgroundColors.push(randomColor);
        // }

        // Membuat grafik menggunakan Charts.js
        var ctx = document.getElementById("chart-kurang").getContext("2d");
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: 
                    <?php echo $kelurahan2; ?>   
                ,
                datasets: [
                {
                    label: "Kurang",
                    data: 
                        <?php echo $total2; ?>
                    ,
                    backgroundColor:  [
					'rgba(192, 207, 0, 0.8)'
					],
                    borderColor: [
					'rgba(192, 207, 0, 0.8)'
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


    <script>
        // Mengonversi data JSON ke array JavdESCript
        // Generate array warna latar belakang acak
        // var backgroundColors = [];
        // for (var i = 0; i < 5; i++) {
        //     var randomColor = "rgba(" + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", 0.5)";
        //     backgroundColors.push(randomColor);
        // }

        // Membuat grafik menggunakan Charts.js
        var ctx = document.getElementById("chart-buruk").getContext("2d");
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: 
                    <?php echo $kelurahan3; ?>   
                ,
                datasets: [
                {
                    label: "Buruk",
                    data: 
                        <?php echo $total3; ?>
                    ,
                    backgroundColor:  [
					'rgba(255, 231, 3, 0.8)'
					],
                    borderColor: [
					'rgba(255, 231, 3, 0.8)'
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


    <script>
        // Mengonversi data JSON ke array JavdESCript
        // Generate array warna latar belakang acak
        // var backgroundColors = [];
        // for (var i = 0; i < 5; i++) {
        //     var randomColor = "rgba(" + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", 0.5)";
        //     backgroundColors.push(randomColor);
        // }

        // Membuat grafik menggunakan Charts.js
        var ctx = document.getElementById("chart-stunting").getContext("2d");
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: 
                    <?php echo $kelurahan4; ?>   
                ,
                datasets: [
                {
                    label: "Stunting",
                    data: 
                        <?php echo $total4; ?>
                    ,
                    backgroundColor:  [
					'rgba(248, 68, 29, 0.8)'
					],
                    borderColor: [
					'rgba(248, 68, 29, 0.8)'
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



    <script>
        // Mengonversi data JSON ke array JavdESCript
        // Generate array warna latar belakang acak
        // var backgroundColors = [];
        // for (var i = 0; i < 5; i++) {
        //     var randomColor = "rgba(" + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", 0.5)";
        //     backgroundColors.push(randomColor);
        // }

        // Membuat grafik menggunakan Charts.js
        var ctx = document.getElementById("chart2").getContext("2d");
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: 
                    <?php echo $kelurahan5; ?>   
                ,
                datasets: [
                {
                    label: "Normal",
                    data: 
                        <?php echo $total5; ?>
                    ,
                    backgroundColor:  [
					'rgba(0, 235, 71, 0.8)'
					],
                    borderColor: [
					'rgba(0, 235, 71, 0.8)'
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

    <script>
        // Mengonversi data JSON ke array JavdESCript
        // Generate array warna latar belakang acak
        // var backgroundColors = [];
        // for (var i = 0; i < 5; i++) {
        //     var randomColor = "rgba(" + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", 0.5)";
        //     backgroundColors.push(randomColor);
        // }

        // Membuat grafik menggunakan Charts.js
        var ctx = document.getElementById("chart-kurang-rendah").getContext("2d");
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: 
                    <?php echo $kelurahan6; ?>   
                ,
                datasets: [
                {
                    label: "Kurang",
                    data: 
                        <?php echo $total6; ?>
                    ,
                    backgroundColor:  [
					'rgba(192, 207, 0, 0.8)'
					],
                    borderColor: [
					'rgba(192, 207, 0, 0.8)'
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


    <script>
        // Mengonversi data JSON ke array JavdESCript
        // Generate array warna latar belakang acak
        // var backgroundColors = [];
        // for (var i = 0; i < 5; i++) {
        //     var randomColor = "rgba(" + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", 0.5)";
        //     backgroundColors.push(randomColor);
        // }

        // Membuat grafik menggunakan Charts.js
        var ctx = document.getElementById("chart-buruk-rendah").getContext("2d");
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: 
                    <?php echo $kelurahan7; ?>   
                ,
                datasets: [
                {
                    label: "Buruk",
                    data: 
                        <?php echo $total7; ?>
                    ,
                    backgroundColor:  [
					'rgba(255, 231, 3, 0.8)'
					],
                    borderColor: [
					'rgba(255, 231, 3, 0.8)'
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


    <script>
        // Mengonversi data JSON ke array JavdESCript
        // Generate array warna latar belakang acak
        // var backgroundColors = [];
        // for (var i = 0; i < 5; i++) {
        //     var randomColor = "rgba(" + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", " + Math.floor(Math.random() * 256) + ", 0.5)";
        //     backgroundColors.push(randomColor);
        // }

        // Membuat grafik menggunakan Charts.js
        var ctx = document.getElementById("chart-stunting-rendah").getContext("2d");
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: 
                    <?php echo $kelurahan8; ?>   
                ,
                datasets: [
                {
                    label: "Stunting",
                    data: 
                        <?php echo $total8; ?>
                    ,
                    backgroundColor:  [
					'rgba(248, 68, 29, 0.8)'
					],
                    borderColor: [
					'rgba(248, 68, 29, 0.8)'
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
    <?php } ?>