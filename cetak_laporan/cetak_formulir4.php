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
        $query = mysqli_query($konek, "SELECT * FROM tb_formulir2a f INNER JOIN tb_bumil b ON f.id_bumil = b.id_bumil INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan WHERE b.kelurahan='$kelurahan' AND b.bulan=$bulan AND b.tahun=$tahun");
    }
    if(isset($_POST['cetak_semua'])){
        $query = mysqli_query($konek, "SELECT * FROM tb_formulir2a f INNER JOIN tb_bumil b ON f.id_bumil=b.id_bumil INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan");
    }
} else {
    $kelurahan = $_POST['kelurahan'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $nama_kpm = $_POST['nama_kpm'];
    if(isset($_POST['cetak'])){
        $query = mysqli_query($konek, "SELECT * FROM tb_formulir2a f INNER JOIN tb_bumil b ON f.id_bumil = b.id_bumil INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan WHERE b.kelurahan='$kel' AND b.bulan=$bulan AND b.tahun=$tahun");
    }
    if(isset($_POST['cetak_semua'])){
        $query = mysqli_query($konek, "SELECT * FROM tb_formulir2a f INNER JOIN tb_bumil b ON f.id_bumil=b.id_bumil INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan WHERE b.kelurahan='$kel'");
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

    /* Style untuk kolom tanda tangan */
    .signature-container {
        display: flex;
        justify-content: space-between;
    }

    /* Style untuk tanda tangan kiri */
    .left-signature {
        width: 45%;
        /* border-bottom: 1px solid black; */
        /* padding: 10px; */
    }

    /* Style untuk tanda tangan kanan */
    .right-signature {
        width: 45%;
        /* border-bottom: 1px solid black; */
        /* padding: 10px; */
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
</center>
<center>
		<table class="table table-stripped table-bordered mt-3 table-responsive demo" width="850">
            <H3>LAPORAN 4 KONVERGENSI PENCEGAHAN STUNTING TINGKAT DESA TERHADAP SASARAN<br> RUMAH TANGGA 1000 HPK</H3>
</center>
<!-- <div class="signature-container">
    <div class="left-signature">
        <p>Kota: Banjarmasin</p>
        <p>Kelurahan: </p>
    </div>
    <div class="right-signature">
        <p>Kecamatan:</p>
        <p>Tahun:</p>
    </div>
</div> -->
<center>
            <tbody>
                <tr>
                    <td width="638" colspan="13" valign="top" style="background-color: #99FFEC;">
                        <p>
                            TABEL 1. JUMLAH SASARAN 1.000 HPK (IBU HAMIL DAN ANAK 0 -
                            23 BULAN)
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="134" colspan="2" rowspan="2">
                        <p align="center">
                            SASARAN
                        </p>
                    </td>
                    <td width="158" colspan="2" rowspan="2">
                        <p align="center">
                            JML TOTAL RUMAH TANGGA 1.000 HPK
                        </p>
                    </td>
                    <td width="149" colspan="3">
                        <p align="center">
                            IBU HAMIL
                        </p>
                    </td>
                    <td width="197" colspan="6">
                        <p align="center">
                            ANAK 0-23 BULAN
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="72">
                        <p align="center">
                            TOTAL
                        </p>
                    </td>
                    <td width="77" colspan="2">
                        <p align="center">
                            KEK/RISTI
                        </p>
                    </td>
                    <td width="72" colspan="3">
                        <p align="center">
                            TOTAL
                        </p>
                    </td>
                    <td width="125" colspan="3">
                        <p align="center">
                            GIZI KURANG/GIZI BURUK/STUNTING
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="134" colspan="2" >
                        <p align="center">
                            Jumlah
                        </p>
                    </td>
                    <td width="158" colspan="2" valign="top">
                    </td>
                    <td width="72" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_bumil WHERE kelurahan='$kelurahan' AND bulan='$bulan' AND tahun='$tahun'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_bumil");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_bumil WHERE kelurahan='$kel' AND tahun='$tahun' AND bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_bumil WHERE kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="77" colspan="2" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_bumil b INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_bumil b INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan WHERE s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_bumil b INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_bumil b INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan WHERE b.kelurahan='$kel' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="72" colspan="3" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta WHERE kelurahan='$kelurahan' AND tahun='$tahun' AND bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta WHERE kelurahan='$kel' AND tahun='$tahun' AND bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta WHERE kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="125" colspan="3" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak WHERE g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak WHERE b.kelurahan='$kel' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="638" colspan="13" valign="top" style="background-color: #d2aeef;">
                        <p>
                            TABEL 2. HASIL PENGUKURAN TIKAR PERTUMBUHAN (DETEKSI DINI
                            STUNTING)
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="134" colspan="2">
                        <p align="center">
                            SASARAN
                        </p>
                    </td>
                    <td width="75">
                        <p align="center">
                            JUMLAH TOTAL ANAK USIA 0-23 BULAN
                        </p>
                    </td>
                    <td width="83">
                        <p align="center">
                            HIJAU (NOMINAL)
                        </p>
                    </td>
                    <td width="149" colspan="3">
                        <p align="center">
                            KUNING (RESIKO STUNTING)
                        </p>
                    </td>
                    <td width="197" colspan="6">
                        <p align="center">
                            MERAH TERINDIKASI STUNTING
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="134" colspan="2" >
                        <p align="center">
                            Jumlah
                        </p>
                    </td>
                    <td width="75" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta WHERE kelurahan='$kelurahan' AND tahun='$tahun' AND bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta WHERE kelurahan='$kel' AND tahun='$tahun' AND bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta WHERE kelurahan='$kel'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="83" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan' AND h.hasil='H'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE h.hasil='H'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan' AND h.hasil='H'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE b.kelurahan='$kel' AND h.hasil='H'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="149" colspan="3" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan' AND h.hasil='K'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE h.hasil='K'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan' AND h.hasil='K'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE b.kelurahan='$kel' AND h.hasil='K'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="197" colspan="6" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan' AND h.hasil='M'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE h.hasil='M'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan' AND h.hasil='M'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM tb_baduta b INNER JOIN tb_hasil h ON b.id_hasil=h.id_hasil WHERE b.kelurahan='$kel' AND h.hasil='M'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="638" colspan="13" valign="top" style="background-color: #c9d708;">
                        <p>
                            TABEL 3. KELENGKAPAN KONVERGENSI PAKET LAYANAN PENCEGAHAN
                            STUNTING BAGI 1.000 HPK
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="92">
                        <p align="center">
                            SASARAN
                        </p>
                    </td>
                    <td width="42" valign="top">
                    </td>
                    <td width="336" colspan="6">
                        <p align="center">
                            INDIKATOR
                        </p>
                    </td>
                    <td width="104" colspan="4">
                        <p align="center">
                            JUMLAH
                        </p>
                    </td>
                    <td width="64">
                        <p align="center" >
                            %
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="92" rowspan="8">
                        <p align="center">
                            IBU HAMIL
                        </p>
                    </td>
                    <td width="42">
                        <p align="center">
                            1
                        </p>
                    </td>
                    <td width="336" colspan="6" valign="top">
                        <p>
                            Ibu hamil periksa kehamilan paling sedkit 4 kali selama kehamilan
                        </p>
                    </td>
                    <td width="104" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.pemeriksaan_kehamilan='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_kehamilan='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.pemeriksaan_kehamilan='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_kehamilan='Y' AND b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="64" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.pemeriksaan_kehamilan='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_kehamilan='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.pemeriksaan_kehamilan='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
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
                    <td width="42">
                        <p align="center">
                            2
                        </p>
                    </td>
                    <td width="336" colspan="6" valign="top">
                        <p>
                            Ibu hamil mendapatkan dari minum 1 table tambahan darah (pil FE) setiap hari minimal selama 90 hari
                        </p>
                    </td>
                    <td width="104" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.dapat_pilfe='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.dapat_pilfe='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.dapat_pilfe='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.dapat_pilfe='Y' AND b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="64" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.dapat_pilfe='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.dapat_pilfe='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.dapat_pilfe='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.dapat_pilfe='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.dapat_pilfe) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
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
                    <td width="42">
                        <p align="center">
                            3
                        </p>
                    </td>
                    <td width="336" colspan="6" valign="top">
                        <p>
                            Ibu bersalin mendapatkan layanan nifas oleh nakes
                            dilaksanakan minimal 3 kali
                        </p>
                    </td>
                    <td width="104" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.pemeriksaan_nifas='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_nifas='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.pemeriksaan_nifas='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_nifas='Y' AND b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="64" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.pemeriksaan_nifas='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.pemeriksaan_nifas='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.pemeriksaan_nifas='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.pemeriksaan_nifas='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_nifas) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
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
                    <td width="42">
                        <p align="center">
                            4
                        </p>
                    </td>
                    <td width="336" colspan="6" valign="top">
                        <p>
                            Ibu hamil mengikuti kegiatan konseling gizi atau kelas ibu hamil minimal 4 kali selama kehamilan
                        </p>
                    </td>
                    <td width="104" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.konseling_gizi='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.konseling_gizi='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.konseling_gizi='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.konseling_gizi='Y' AND b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="64" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.konseling_gizi='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.konseling_gizi='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.konseling_gizi='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.konseling_gizi) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
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
                    <td width="42">
                        <p align="center">
                            5
                        </p>
                    </td>
                    <td width="336" colspan="6" valign="top">
                        <p>
                            Ibu hamil dengan resiko tinggi dan atau kekurangan energi kronis (KEK) mendapat kunjungan ke rumah oleh bidan desa secara terpadu minimal 1 bulan sekali
                        </p>
                    </td>
                    <td width="104" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kelurahan' AND c.kunjungan_rumah='Y' AND b.tahun='$tahun' AND b.bulan='$bulan' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE c.kunjungan_rumah='Y' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND b.tahun='$tahun' AND b.bulan='$bulan' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE c.kunjungan_rumah='Y' AND b.kelurahan='$kel' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="64" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kelurahan' AND c.kunjungan_rumah='Y' AND b.tahun='$tahun' AND b.bulan='$bulan' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE c.kunjungan_rumah='Y' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND b.tahun='$tahun' AND b.bulan='$bulan' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) INNER JOIN tb_status_kehamilan s ON b.id_status_kehamilan=s.id_status_kehamilan) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan' AND (s.status_kehamilan='KEK' OR s.status_kehamilan='RISTI')");
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
                    <td width="42">
                        <p align="center">
                            6
                        </p>
                    </td>
                    <td width="336" colspan="6" valign="top">
                        <p>
                            Rumah tangga ibu hamil memiliki sarana akses air minum yang aman
                        </p>
                    </td>
                    <td width="104" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.kepem_air_bersih='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_air_bersih='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_air_bersih='Y' AND b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="64" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.kepem_air_bersih='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_air_bersih='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
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
                    <td width="42">
                        <p align="center">
                            7
                        </p>
                    </td>
                    <td width="336" colspan="6" valign="top">
                        <p>
                            Rumah tangga ibu hamil memiliki sarana jamban keluarga yang layak
                        </p>
                    </td>
                    <td width="104" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.kepem_jamban='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_jamban='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_jamban='Y' AND b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="64" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.kepem_jamban='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.kepem_jamban='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
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
                    <td width="42">
                        <p align="center">
                            8
                        </p>
                    </td>
                    <td width="336" colspan="6" valign="top">
                        <p>
                            Ibu hamil memiliki jaminan layanan kesehatan
                        </p>
                    </td>
                    <td width="104" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.jamkes='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.jamkes='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.jamkes='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.jamkes='Y' AND b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="64" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND c.jamkes='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE c.jamkes='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND c.jamkes='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
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
                <tr>
                    <td width="92" rowspan="11">
                        <p align="center">
                            ANAK 0 sd 23 BULAN (0 sd 2 TAHUN)
                        </p>
                    </td>
                    <td width="42">
                        <p align="center">
                            1
                        </p>
                    </td>
                    <td width="336" colspan="6" valign="top">
                        <p>
                            Bayi usia 12 bulan ke bawah mendapatkan imunisasi dasar lengkap
                        </p>
                    </td>
                    <td width="104" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pemberian_imunisasi_dasar='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pemberian_imunisasi_dasar='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y' AND b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="64" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pemberian_imunisasi_dasar='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pemberian_imunisasi_dasar='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
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
                    <td width="42">
                        <p align="center">
                            2
                        </p>
                    </td>
                    <td width="336" colspan="6" valign="top">
                        <p>
                            Anak usia 0-23 bulan diukur dengan berat badannya di
                            posyandu secara rutin setiap bulan
                        </p>
                    </td>
                    <td width="104" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.berat_badan='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.berat_badan='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y' AND b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="64" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.berat_badan='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.berat_badan='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
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
                    <td width="42">
                        <p align="center">
                            3
                        </p>
                    </td>
                    <td width="336" colspan="6" valign="top">
                        <p>
                            Anak usia 0-23 bulan diukur panjang/tinggi badannya oleh tenaga kesehatan terlatih minimal 2 kali dalam setahun
                        </p>
                    </td>
                    <td width="104" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.tinggi_badan='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.tinggi_badan='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y' AND b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="64" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.tinggi_badan='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.tinggi_badan='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
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
                    <td width="42" rowspan="2">
                        <p align="center">
                            4
                        </p>
                    </td>
                    <td width="336" colspan="6" rowspan="2" valign="top">
                        <p>
                            Orang tua/pengasuh yang memiliki anak usia 0-23 bulan mengikuti kegiatan konseling gizi secara rutin minimal sebulan sekali
                        </p>
                    </td>
                    <td width="47" colspan="3" valign="top">
                        <p>Laki</p>
                    </td>
                    <td width="47" valign="top">
                        <p>Jml</p>
                    </td>
                    <td width="64" valign="top">
                    </td>
                </tr>
                <tr>
                    <td width="57" colspan="3" valign="top" align="center">
                    </td>
                    <td width="47" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.k1L='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.k1L='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y' AND b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="64" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.k1L='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.k1L='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
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
                    <td width="42">
                        <p align="center">
                            5
                        </p>
                    </td>
                    <td width="336" colspan="6" valign="top">
                        <p>
                            Anak usia 0-23 bulan dengan status gizi buruk, kurang, dan
                            stunting mendapat kunjungan ke rumah secara terpadu minimal 1 bulan sekali
                        </p>
                    </td>
                    <td width="104" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kelurahan' AND c.kunjungan_rumah='Y' AND b.tahun='$tahun' AND b.bulan='$bulan' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE c.kunjungan_rumah='Y' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND b.tahun='$tahun' AND b.bulan='$bulan' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE c.kunjungan_rumah='Y' AND b.kelurahan='$kel' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="64" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kelurahan' AND c.kunjungan_rumah='Y' AND b.tahun='$tahun' AND b.bulan='$bulan' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE c.kunjungan_rumah='Y' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND c.kunjungan_rumah='Y' AND b.tahun='$tahun' AND b.bulan='$bulan' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM (((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan' AND (g.status_gizi='BURUK' OR g.status_gizi='KURANG' OR g.status_gizi='STUNTING')");
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
                    <td width="42">
                        <p align="center">
                            6
                        </p>
                    </td>
                    <td width="336" colspan="6" valign="top">
                        <p>
                            Rumah tangga anak usia 0-23 bulan memiliki sarana akses air minum yang aman
                        </p>
                    </td>
                    <td width="104" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_air_bersih='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y' AND b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="64" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_air_bersih='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_air_bersih='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
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
                    <td width="42">
                        <p align="center">
                            7
                        </p>
                    </td>
                    <td width="336" colspan="6" valign="top">
                        <p>
                            Rumah tangga anak usia 0-23 bulan memiliki sarana jamban yang layak
                        </p>
                    </td>
                    <td width="104" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_jamban='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y' AND b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="64" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.kepem_jamban='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.kepem_jamban='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
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
                    <td width="42">
                        <p align="center">
                            8
                        </p>
                    </td>
                    <td width="336" colspan="6" valign="top">
                        <p>
                            Anak usia 0-23 bulan memiliki akta kelahiran
                        </p>
                    </td>
                    <td width="104" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.akta_lahir='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.akta_lahir='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y' AND b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="64" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.akta_lahir='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.akta_lahir='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
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
                    <td width="42">
                        <p align="center">
                            9
                        </p>
                    </td>
                    <td width="336" colspan="6" valign="top">
                        <p>
                            Anak usia 0-23 bulan memiliki jaminan layanan kesehatan
                        </p>
                    </td>
                    <td width="104" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.jamkes='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.jamkes='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y' AND b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="64" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.jamkes='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.jamkes='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
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
                    <td width="42">
                        <p align="center">
                            10
                        </p>
                    </td>
                    <td width="336" colspan="6" valign="top">
                        <p>
                            Orang tua/pengasuh yang memiliki anak usia 0-23 bulan mengikuti kelas pengasuhan minimal sebulan sekali
                        </p>
                    </td>
                    <td width="104" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pengasuhan_paud='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pengasuhan_paud='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y' AND b.kelurahan='$kel'");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="64" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pengasuhan_paud='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pengasuhan_paud='Y' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
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
                <tr>
                    <td width="92">
                        <p align="center">
                            ANAK 2 sd 6
                        </p>
                    </td>
                    <td width="42">
                        <p align="center">
                            1
                        </p>
                    </td>
                    <td width="336" colspan="6" valign="top">
                        <p>
                            Anak usia 2-6 tahun terdaftar dan aktif mengikuti kegiatan layanan PAUD
                        </p>
                    </td>
                    <td width="104" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kelurahan' AND a.jml_aktif=12 AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE a.jml_aktif=12");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel' AND a.jml_aktif=12 AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel' AND a.jml_aktif=12");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td width="64" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kelurahan' AND a.jml_aktif=12 AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE a.jml_aktif=12");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel' AND a.jml_aktif=12 AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_aktif) FROM tb_formulir2c a INNER JOIN tb_balita b ON a.id_balita=b.id_balita WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
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
                <tr>
                    <td width="638" colspan="13" valign="top" style="background-color: #ff6900;">
                        <p>
                            TABEL 4. TINGKAT KONVERGENSI DESA
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="92" rowspan="2">
                        <p align="center">
                            NO
                        </p>
                    </td>
                    <td width="200" colspan="3" rowspan="2">
                        <p align="center">
                            SASARAN
                        </p>
                    </td>
                    <td width="346" colspan="9">
                        <p align="center">
                            JUMLAH INDIKATOR
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="103" colspan="2">
                        <p align="center">
                            YANG DITERIMA
                        </p>
                    </td>
                    <td width="104" colspan="3">
                        <p align="center">
                            SEHARUSNYA DITERIMA
                        </p>
                    </td>
                    <td width="140" colspan="4">
                        <p align="center">
                            TINGKAT KONVERGENSI
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="92">
                        <p align="center">
                            1
                        </p>
                    </td>
                    <td width="200" colspan="3" valign="top">
                        <p>
                            Ibu hamil
                        </p>
                    </td>
                    <td width="103" colspan="2" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND a.jml_diterima_lengkap=6 AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE a.jml_diterima_lengkap=6");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND a.jml_diterima_lengkap=6 AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE a.jml_diterima_lengkap=6 AND b.kelurahan='$kel'");
                        }
                        
                        $exe_hamil = mysqli_fetch_array($query);
                        echo $exe_hamil[0];
                        ?>
                    </td>
                    <td width="104" colspan="3" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                        }
                        
                        $exe_jml_hamil = mysqli_fetch_array($query);
                        echo $exe_jml_hamil[0];
                        ?>
                    </td>
                    <td width="140" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND a.persen=100 AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE a.persen=100");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND a.persen=100 AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel' AND a.persen=100");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3a a INNER JOIN tb_bumil b ON a.id_bumil=b.id_bumil) INNER JOIN tb_formulir2a c ON a.id_formulir_duaA=c.id_formulir_duaA) WHERE b.kelurahan='$kel'");
                            $exe_jml = mysqli_fetch_array($query);
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            $hasil_hamil = round(100 / ($exe_jml_hamil[0] / $exe_hamil[0]))."%";
                            echo $hasil_hamil;
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil_hamil = 0;
                        }

                        restore_error_handler();
                        
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="92">
                        <p align="center">
                            2
                        </p>
                    </td>
                    <td width="200" colspan="3" valign="top">
                        <p>
                            Anak 0-23 bulan
                        </p>
                    </td>
                    <td width="103" colspan="2" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND a.jml_diterima_lengkap=10 AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE a.jml_diterima_lengkap=10");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND a.jml_diterima_lengkap=10 AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE a.jml_diterima_lengkap=10 AND b.kelurahan='$kel'");
                        }
                        
                        $exe_anak = mysqli_fetch_array($query);
                        echo $exe_anak[0];
                        ?>
                    </td>
                    <td width="104" colspan="3" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        }
                        
                        $exe_jml_anak = mysqli_fetch_array($query);
                        echo $exe_jml_anak[0];
                        ?>
                    </td>
                    <td width="140" colspan="4" valign="top" align="center">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND a.persen=100 AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE a.persen=100");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])) {
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND a.persen=100 AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun' AND b.bulan='$bulan'");
                            $exe_jml = mysqli_fetch_array($query);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND a.persen=100");
                            $exe = mysqli_fetch_array($query);
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                            $exe_jml = mysqli_fetch_array($query);
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            $hasil_anak = round(100 / ($exe_jml_anak[0] / $exe_anak[0]))."%";
                            echo $hasil_anak;
                        } catch( Exception $e ){
                            echo "0%".PHP_EOL;
                            $hasil = 0;
                        }

                        restore_error_handler();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="292" colspan="4">
                        <p align="center">
                            TOTAL TINGKAT KONVERGENSI DESA
                        </p>
                    </td>
                    <td width="103" colspan="2" valign="top" align="center">
                        <?php 
                        $total_hamil = $exe_hamil[0] + $exe_anak[0]; 
                        echo $total_hamil;
                        ?>
                    </td>
                    <td width="104" colspan="3" valign="top" align="center">
                        <?php 
                        $total_anak = $exe_jml_hamil[0] + $exe_jml_anak[0]; 
                        echo $total_anak;
                        ?>
                    </td>
                    <td width="140" colspan="4" valign="top" align="center">
                        <?php
                        set_error_handler(function () {
                            throw new Exception('Ach!');
                        });

                        try {
                            $hasil_anak = round(100 / ($total_anak / $total_hamil))."%";
                            echo $hasil_anak;
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