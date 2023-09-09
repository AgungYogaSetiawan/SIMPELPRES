<?php
include '../setting/koneksi.php';
session_start();

// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
    header("location:../login/halaman_login.php");
}


$kel = $_SESSION['username'];
$stat = $_SESSION['status'];
if($stat == 'kpm'){
    $nama_kpm = $_POST['nama_kpm'];
}
$kelurahan = $_POST['kelurahan'];
$bulan = $_POST['bulan'];
$bulan2 = $_POST['bulan2'];
if($bulan == 1 and $bulan2 == 3){
    $kuartal = "Kuartal 1";
} else if($bulan == 4 and $bulan2 == 6){
    $kuartal = "Kuartal 2";
} else if($bulan == 7 and $bulan2 == 9){
    $kuartal = "Kuartal 3";
} else if($bulan == 10 and $bulan2 == 12){
    $kuartal = "Kuartal 4";
}
if($kel == 'admin'){
    if(isset($_POST['cetak'])){
        $query = mysqli_query($konek, "SELECT * FROM (((tb_formulir3B a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kelurahan' OR b.bulan BETWEEN $bulan AND $bulan2");
    }
    
    if(isset($_POST['cetak_semua'])){
        $query = mysqli_query($konek, "SELECT * FROM (((tb_formulir3B a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak)");
    }
} else {
    $kelurahan = $_POST['kelurahan'];
    $bulan = $_POST['bulan'];
    $bulan2 = $_POST['bulan2'];
    if($bulan == 1 and $bulan2 == 3){
        $kuartal = "Kuartal 1";
    } else if($bulan == 4 and $bulan2 == 6){
        $kuartal = "Kuartal 2";
    } else if($bulan == 7 and $bulan2 == 9){
        $kuartal = "Kuartal 3";
    } else if($bulan == 10 and $bulan2 == 12){
        $kuartal = "Kuartal 4";
    }
    if(isset($_POST['cetak'])){
        $query = mysqli_query($konek, "SELECT * FROM (((tb_formulir3B a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
    }
    
    if(isset($_POST['cetak_semua'])){
        $query = mysqli_query($konek, "SELECT * FROM (((tb_formulir3B a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel'");
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
				<td colspan="2"><hr style="height:2px;border-width:0;color:black;background-color:black"></td>
			</tr>
		<table class="table table-stripped table-bordered mt-3 table-responsive demo" width="850">
            <H3>LAPORAN BANTUAN CAPAIAN PENERIMA LAYANAN</H3>
            <tbody>
                <tr>
                    <td colspan="2" width="432" align="center">
                        <p>Tingkat Capaian Indikator</p>
                    </td>
                    <td colspan="3" width="206" align="center">
                        <p><?php
                        if(isset($_POST['cetak'])){
                            echo $kuartal;
                        } else {
                            echo 'Kuartal';
                        }
                        ?></p>
                    </td>
                </tr>
                <tr align="center">
                    <td width="36">
                        <p>No</p>
                    </td>
                    <td width="397">
                        <p>Indikator</p>
                    </td>
                    <td width="66">
                        <p>Jumlah Diterima</p>
                    </td>
                    <td width="85">
                        <p>Jumlah Seharusnya</p>
                    </td>
                    <td width="55">
                        <p>%</p>
                    </td>
                </tr>
                <tr style="background-color: #1ABA80; color: black;">
                    <td colspan="5" width="638">
                        <p><strong>Sasaran Ibu Hamil</strong></p>
                    </td>
                </tr>
                <tr>
                    <td width="36" align="center">
                        <p>1</p>
                    </td>
                    <td width="397">
                        <p>Ibu hamil periksa kehamilan paling sedikit 4 kali selama kehamilan</p>
                    </td>
                    <td width="66" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.pemeriksaan_kehamilan='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_kehamilan='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.pemeriksaan_kehamilan='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_kehamilan='Y' AND b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="85" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="55" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm'){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_kehamilan='Y'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else {
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_kehamilan='Y' AND b.kelurahan='$kel'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        }

                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            echo round($exe[0] / $exe2[0] * 100,0)."%";
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="36" align="center">
                        <p>2</p>
                    </td>
                    <td width="397">
                        <p>Ibu hamil mendapatkan dan minum 1 tablet tambah darah (pilfe) setiap hari minimal 90 hari</p>
                    </td>
                    <td width="66" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.dapat_pilfe='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.dapat_pilfe='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.dapat_pilfe='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.dapat_pilfe='Y' AND b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="85" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="55" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm'){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.dapat_pilfe='Y'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else {
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.dapat_pilfe='Y' AND b.kelurahan='$kel'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        }

                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            echo round($exe[0] / $exe2[0] * 100,0)."%";
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="36" align="center">
                        <p>3</p>
                    </td>
                    <td width="397">
                        <p>Ibu bersalin mendapatkan layanan nifas oleh nakes dilaksanakan minimal 3 kali</p>
                    </td>
                    <td width="66" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.pemeriksaan_nifas='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_nifas='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.pemeriksaan_nifas='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_nifas='Y' AND b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="85" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="55" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.pemeriksaan_kehamilan='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_kehamilan='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.pemeriksaan_kehamilan='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.pemeriksaan_kehamilan='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                            $exe_jml = mysqli_fetch_array($query);
                        }
                        
                        // $exe = mysqli_fetch_array($query);
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="36" align="center">
                        <p>4</p>
                    </td>
                    <td width="397">
                        <p>Ibu hamil mengikuti kegiatan konseling gizi atau kelas ibu hamil minimal 4 kali selama kehamilan</p>
                    </td>
                    <td width="66" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.konseling_gizi='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.konseling_gizi='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.konseling_gizi='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.konseling_gizi='Y' AND b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="85" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="55" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.konseling_gizi='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.konseling_gizi='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.konseling_gizi='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.konseling_gizi='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                            $exe_jml = mysqli_fetch_array($query);
                        }
                        
                        // $exe = mysqli_fetch_array($query);
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="36" align="center">
                        <p>5</p>
                    </td>
                    <td width="397">
                        <p>Ibu hamil dengan kondisi resiko tinggi/atau kekurangan energi kronis (KEK) mendapat kunjungan ke rumah oleh bidan desa secara terpadu minimal 1 bulan sekali</p>
                    </td>
                    <td width="66" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kelurahan' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bulan AND $bulan2 AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE c.kunjungan_rumah='Y' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bulan AND $bulan2 AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE c.kunjungan_rumah='Y' AND b.kelurahan='$kel' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                    
                    $exe = mysqli_fetch_array($query);
                    echo $exe[0];
                    ?>
                    </td>
                    <td width="85" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kelurahan' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI') AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                        }
                    
                    $exe = mysqli_fetch_array($query);
                    echo $exe[0];
                    ?>

                    </td>
                    <td width="55" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kelurahan' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bulan AND $bulan2 AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2 AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE c.kunjungan_rumah='Y' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bulan AND $bulan2 AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2 AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                            $exe_jml = mysqli_fetch_array($query);
                        }
                        
                        // $exe = mysqli_fetch_array($query);
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="36" align="center">
                        <p>6</p>
                    </td>
                    <td width="397">
                        <p>Rumah tangga ibu hamil memiliki sarana akses air minum yang aman</p>
                    </td>
                    <td width="66" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.kepem_air_bersih='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_air_bersih='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_air_bersih='Y' AND b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="85" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="55" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.kepem_air_bersih='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_air_bersih='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                            $exe_jml = mysqli_fetch_array($query);
                        }
                        
                        // $exe = mysqli_fetch_array($query);
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="36" align="center">
                        <p>7</p>
                    </td>
                    <td width="397">
                        <p>Rumah tangga ibu hamil memiliki sarana jamban keluarga yang layak</p>
                    </td>
                    <td width="66" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.kepem_jamban='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_jamban='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_jamban='Y' AND b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="85" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="55" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.kepem_jamban='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_jamban='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                            $exe_jml = mysqli_fetch_array($query);
                        }
                        
                        // $exe = mysqli_fetch_array($query);
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="36" align="center">
                        <p>8</p>
                    </td>
                    <td width="397">
                        <p>Ibu hamil memiliki jaminan layanan kesehatan</p>
                    </td>
                    <td width="66" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.jamkes='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.jamkes='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.jamkes='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.jamkes='Y' AND b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="85" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="55" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.jamkes='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.jamkes='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.jamkes='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.jamkes='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                            $exe_jml = mysqli_fetch_array($query);
                        }
                        
                        // $exe = mysqli_fetch_array($query);
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
                <tr class="bg-warning text-dark" style="background-color: #ffce30;">
                    <td colspan="5" width="638">
                        <p><strong>Sasaran Anak 0 sd 23 Bulan</strong></p>
                    </td>
                    </tr>
                    <tr>
                    <td width="36" align="center">
                        <p>1</p>
                    </td>
                    <td width="397">
                        <p>Bayi usia 12 bulan kebawah mendapatkan imunisasi dasar lengkap</p>
                    </td>
                    <td width="66" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pemberian_imunisasi_dasar='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pemberian_imunisasi_dasar='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y' AND b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="85" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="55" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pemberian_imunisasi_dasar='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pemberian_imunisasi_dasar='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pemberian_imunisasi_dasar='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                            $exe_jml = mysqli_fetch_array($query);
                        }
                        
                        // $exe = mysqli_fetch_array($query);
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="36" align="center">
                        <p>2</p>
                    </td>
                    <td width="397">
                        <p>Anak usia 0-23 bulan diukur berat badannya di posyandu secara rutin setiap bulan</p>
                    </td>
                    <td width="66" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.berat_badan='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.berat_badan='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y' AND b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="85" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="55" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.berat_badan='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.berat_badan='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.berat_badan='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                            $exe_jml = mysqli_fetch_array($query);
                        }
                        
                        // $exe = mysqli_fetch_array($query);
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="36" align="center">
                        <p>3</p>
                    </td>
                    <td width="397">
                        <p>Anak usia 0-23 bulan diukur panjang/tinggi badannya oleh tenaga kesehatan terlatih minimal 2 kali setahun</p>
                    </td>
                    <td width="66" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.tinggi_badan='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.tinggi_badan='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y' AND b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="85" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="55" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.tinggi_badan='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.tinggi_badan='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.tinggi_badan='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                            $exe_jml = mysqli_fetch_array($query);
                        }
                        
                        // $exe = mysqli_fetch_array($query);
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="36" align="center">
                        <p>4</p>
                    </td>
                    <td width="397">
                        <p>Orang tua/pengasuh yang memiliki anak 0-23 bulan mengikuti kegiatan konseling gizi secara rutin minimal sebulan sekali</p>
                    </td>
                    <td width="66" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.k1L='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.k1L='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y' AND b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="85" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>

                    </td>
                    <td width="55" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.k1L='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.k1L='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.k1L='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                            $exe_jml = mysqli_fetch_array($query);
                        }
                        
                        // $exe = mysqli_fetch_array($query);
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="36" align="center">
                        <p>5</p>
                    </td>
                    <td width="397">
                        <p>Anak usia 0-23 bulan dengan status gizi buruk, gizi kurang, dan stunting mendapat kunjungan ke rumah secara terpadu minimal 1 bulan sekali</p>
                    </td>
                    <td width="66" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kelurahan' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bulan AND $bulan2 AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE c.kunjungan_rumah='Y' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bulan AND $bulan2 AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE c.kunjungan_rumah='Y' AND b.kelurahan='$kel' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="85" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kelurahan' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING') AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="55" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kelurahan' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bulan AND $bulan2 AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2 AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE c.kunjungan_rumah='Y' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND b.bulan BETWEEN $bulan AND $bulan2 AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2 AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                            $exe_jml = mysqli_fetch_array($query);
                        }
                        
                        // $exe = mysqli_fetch_array($query);
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="36" align="center">
                        <p>6</p>
                    </td>
                    <td width="397">
                        <p>Rumah tangga anak usia 0-23 bulan memiliki akses sarana minuman yang aman</p>
                    </td>
                    <td width="66" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_air_bersih='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y' AND b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="85" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="55" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_air_bersih='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                            $exe_jml = mysqli_fetch_array($query);
                        }
                        
                        // $exe = mysqli_fetch_array($query);
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="36" align="center">
                        <p>7</p>
                    </td>
                    <td width="397">
                        <p>Rumah tangga anak 0-23 bulan memiliki sarana jamban keluarga yang layak</p>
                    </td>
                    <td width="66" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_jamban='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y' AND b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="85" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="55" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_jamban='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                            $exe_jml = mysqli_fetch_array($query);
                        }
                        
                        // $exe = mysqli_fetch_array($query);
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="36" align="center">
                        <p>8</p>
                    </td>
                    <td width="397">
                        <p>Anak usia 0-23 bulan memiliki akta kelahiran</p>
                    </td>
                    <td width="66" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.akta_lahir='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.akta_lahir='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y' AND b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="85" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="55" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.akta_lahir='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.akta_lahir='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.akta_lahir='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                            $exe_jml = mysqli_fetch_array($query);
                        }
                        
                        // $exe = mysqli_fetch_array($query);
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="36" align="center">
                        <p>9</p>
                    </td>
                    <td width="397">
                        <p>Anak usia 0-23 bulan memiliki jaminan layanan kesehatan</p>
                    </td>
                    <td width="66" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.jamkes='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.jamkes='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y' AND b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="85" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="55" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.jamkes='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.jamkes='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.jamkes='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                            $exe_jml = mysqli_fetch_array($query);
                        }
                        
                        // $exe = mysqli_fetch_array($query);
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="36" align="center">
                        <p>10</p>
                    </td>
                    <td width="397">
                        <p>Orang tua/pengasuh yang memiliki anak usia 0-23 bulan mengikuti kelas pengasuhan minimal sebulan sekali</p>
                    </td>
                    <td width="66" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pengasuhan_paud='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pengasuhan_paud='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y' AND b.kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="85" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="55" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pengasuhan_paud='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pengasuhan_paud='Y' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pengasuhan_paud='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                            $exe_jml = mysqli_fetch_array($query);
                        }
                        
                        // $exe = mysqli_fetch_array($query);
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
                <tr class="bg-danger text-dark" style="background-color: #d9534f;">
                    <td colspan="5" width="638">
                        <p><strong>Sasaran Anak &gt;2 sd 6 Tahun</strong></p>
                    </td>
                </tr>
                <tr>
                    <td width="36" align="center">
                        <p>1</p>
                    </td>
                    <td width="397">
                        <p>Anak usia &gt;2-6 tahun terdaftar dan aktif mengikuti kegiatan layanan PAUD</p>
                    </td>
                    <td width="66" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kelurahan' AND a.jml_aktif=12 AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE a.jml_aktif=12");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel' AND a.jml_aktif=12 AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel' AND a.jml_aktif=12");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="85" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="55" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kelurahan' AND a.jml_aktif=12 AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kelurahan' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE a.jml_aktif=12");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel' AND a.jml_aktif=12 AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel' AND a.jml_aktif=12");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel'");
                            $exe_jml = mysqli_fetch_array($query);
                        }
                        
                        // $exe = mysqli_fetch_array($query);
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- end of table -->
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
