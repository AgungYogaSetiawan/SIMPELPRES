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
if($stat !== 'kpm'){
    if(isset($_POST['cetak'])){
        $query = mysqli_query($konek, "SELECT * FROM (((tb_formulir3B a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kelurahan' OR b.bulan BETWEEN $bulan AND $bulan2 ORDER BY b.kelurahan");
    }
    
    if(isset($_POST['cetak_semua'])){
        $query = mysqli_query($konek, "SELECT * FROM (((tb_formulir3B a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) ORDER BY b.kelurahan");
    }
} else {
    $kelurahan = $_POST['kelurahan'];
    $bulan = $_POST['bulan'];
    $bulan2 = $_POST['bulan2'];
    $nama_kpm = $_POST['nama_kpm'];
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
        $query = mysqli_query($konek, "SELECT * FROM (((tb_formulir3B a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2 ORDER BY b.kelurahan");
    }
    
    if(isset($_POST['cetak_semua'])){
        $query = mysqli_query($konek, "SELECT * FROM (((tb_formulir3B a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) INNER JOIN tb_gizi_anak g ON b.id_gizi_anak=g.id_gizi_anak) WHERE b.kelurahan='$kel' ORDER BY b.kelurahan");
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
		<table class="table table-stripped table-bordered mt-3 table-responsive demo" width="625">
            <H3>LAPORAN 3B REKAPITULASI HASIL PEMANTAUAN 3 (TIGA) BULANAN BAGI ANAK 0-2 TAHUN</H3>
            <thead>
                <tr>
                    <th rowspan=3 style="text-align:center; vertical-align: middle;" style="text-align:center; vertical-align: middle;">No</th>
                    <?php if($stat !== 'kpm' && isset($_POST['cetak_semua'])){ ?>
                    <th rowspan=3 style="text-align:center; vertical-align: middle;">Kecamatan</th>
                    <th rowspan=3 style="text-align:center; vertical-align: middle;">Kelurahan</th>
                    <?php } ?>
                    <th rowspan=3 style="text-align:center; vertical-align: middle;">
                        <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg); text-align:center; vertical-align: middle;">No Registrasi (KIA)</span>
                    </th>
                    <th rowspan=3 style="text-align:center; vertical-align: middle;">Nama Anak</th>
                    <th rowspan=3 style="text-align:center; vertical-align: middle;">
                        <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg); text-align:center; vertical-align: middle;">Jenis Kelamin (L/P)</span>
                    </th>
                    <!-- <th rowspan=3 style="text-align:center; vertical-align: middle;">Bulan</th> -->
                    <th colspan="12" style="text-align:center; vertical-align: middle;">
                    <?php
                    if(isset($_POST['cetak'])){
                        echo $kuartal;
                    } else {
                        echo 'Kuartal';
                    }
                    ?></th>
                    <th colspan=3 rowspan=2 style="text-align:center; vertical-align: middle;">Tingkat Konvergensi Indikator</th>
                </tr>
                <tr>
                    <th colspan=3 style="text-align:center;">Umur dan Status Gizi</th>
                    <th colspan=10 style="text-align:center; vertical-align: middle;">Indikator Layanan</th>
                </tr>
                <tr>
                    <th style="text-align:center; vertical-align: middle;">Umur (Bulan)</th>
                    <th style="text-align:center; vertical-align: middle;">(Buruk/<br>Kurang/<br>Stunting)</th>
                    <th style="text-align:center; vertical-align: middle;">
                        <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Pemberian Imunisasi Dasar</span>
                    </th>
                    <th style="text-align:center; vertical-align: middle;">
                        <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Pengukur Berat Badan</span>
                    </th>
                    <th style="text-align:center; vertical-align: middle;">
                        <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Pengukur Tinggi Badan</span>
                    </th>
                    <th style="text-align:center; vertical-align: middle;">
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
                    <th style="text-align:center; vertical-align: middle;">
                        <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Jumlah Diterima Lengkap</span>
                    </th>
                    <th style="text-align:center; vertical-align: middle;">
                        <span style="writing-mode: vertical-lr; -ms-writing-mode: tb-rl; transform: rotate(180deg);">Jumlah Seharusnya</span>
                    </th>
                    <th style="text-align:center; vertical-align: middle;">%</th>
                    
                </tr>
                <tr>
                    <td align="center" class="td1"></td>
                    <?php if($stat !== 'kpm' && isset($_POST['cetak_semua'])){ ?>
                    <td style="text-align:center;" class="td1"></td>
                    <td style="text-align:center;" class="td1"></td>
                    <?php } ?>
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
                    <td align="center" class="td1">r</td>
                    <!-- <td align="center" class="td1">s</td> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $jml_seharusnya = 10;
                $stat = $_SESSION['status'];
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
                
                while($row = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td class="td1"><?php echo $no++ ?></td>
                    <?php if($stat !== 'kpm' && isset($_POST['cetak_semua'])){ ?>
                    <td class="td1"><?php echo $row['kecamatan']; ?></td>
                    <td class="td1"><?php echo $row['kelurahan']; ?></td>
                    <?php } ?>
                    <td class="td1"><?php echo $row['no_register']  ?></td>
                    <td class="td1"><?php echo $row['nama_anak']  ?></td>
                    <td class="td1"><?php 
                    $jk = $row['jk'];
                    echo $jk == 'L' ? 'Laki-laki' : 'Perempuan';
                    ?></td>
                    <!-- <td class="td1"><?php echo getBulan($row['bulan']); ?></td> -->
                    <td class="td1"><?php echo $row['umur']  ?></td>
                    <td class="td1"><?php echo $row['status_gizi']  ?></td>
                    <td class="td1"><?php echo $row['pemberian_imunisasi_dasar']  ?></td>
                    <td class="td1"><?php echo $row['berat_badan']  ?></td>
                    <td class="td1"><?php echo $row['tinggi_badan']  ?></td>
                    <td class="td1"><?php echo $row['k1L']  ?></td>
                    <td class="td1"><?php echo $row['kunjungan_rumah']  ?></td>
                    <td class="td1"><?php echo $row['kepem_air_bersih']  ?></td>
                    <td class="td1"><?php echo $row['kepem_jamban']; ?></td>
                    <td class="td1"><?php echo $row['akta_lahir']; ?></td>
                    <td class="td1"><?php echo $row['jamkes']; ?></td>
                    <td class="td1"><?php echo $row['pengasuhan_paud']; ?></td>
                    <td class="td1"><?php echo $row['jml_diterima_lengkap']; ?></td>
                    <td class="td1"><?php echo $jml_seharusnya ?></td>
                    <td class="td1">
                    <?php
                    echo $row['persen']. "%";
                    ?></td>
                    
                    <?php
                }
                ?>
                </tr>
                <tr>
                    <td rowspan=4 colspan=4 class="td1"></td>
                    <td rowspan=4 class="td1">Tingkat Konvergensi Indikator</td>
                    
                </tr>
                <tr>
                    <td colspan=3 class="td1">Jumlah Diterima Lengkap</td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y' AND b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y' AND b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y' AND b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y' AND b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y' AND b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y' AND b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y' AND b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y' AND b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kunjungan_rumah='Y' AND b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kunjungan_rumah='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kunjungan_rumah='Y' AND b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kunjungan_rumah='Y'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y' AND b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y' AND b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y' AND b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y' AND b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y' AND b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y' AND b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y' AND b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y' AND b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y' AND b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y' AND b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y'");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td rowspan=4 style="text-align:center; vertical-align: middle;">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE a.jml_diterima_lengkap=10 AND b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE a.jml_diterima_lengkap=10 AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE a.jml_diterima_lengkap=10 AND b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.jml_diterima_lengkap) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE a.jml_diterima_lengkap=10");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td rowspan=4 style="text-align:center; vertical-align: middle;">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(*) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        }
                        
                        $exe_jml = mysqli_fetch_array($query);
                        echo $exe_jml[0];
                        ?>
                    </td>
                    <td rowspan=4 style="text-align:center; vertical-align: middle;">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE a.persen=100 AND b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE a.persen=100 AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE a.persen=100 AND b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(a.persen) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE a.persen=100");
                        }
                        
                        $exe = mysqli_fetch_array($query);
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
                    <td colspan=3 class="td1">Jumlah Seharusnya</td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        }
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $query = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                        }
                        
                        $exe = mysqli_fetch_array($query);
                        echo $exe[0];
                        ?>
                    </td>
                </tr>

                <tr>
                    <td colspan=3 class="td1">%</td>
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y' AND b.kelurahan='$kelurahan'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemberian_imunisasi_dasar='Y' AND b.kelurahan='$kel'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.pemberian_imunisasi_dasar) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
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
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y' AND b.kelurahan='$kelurahan'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.berat_badan='Y' AND b.kelurahan='$kel'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.berat_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
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
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y' AND b.kelurahan='$kelurahan'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.tinggi_badan='Y' AND b.kelurahan='$kel'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.tinggi_badan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
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
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y' AND b.kelurahan='$kelurahan'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.k1L='Y' AND b.kelurahan='$kel'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.k1L) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
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
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kunjungan_rumah='Y' AND b.kelurahan='$kelurahan'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kunjungan_rumah='Y'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kunjungan_rumah='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kunjungan_rumah='Y' AND b.kelurahan='$kel'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.kunjungan_rumah) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
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
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y' AND b.kelurahan='$kelurahan'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_air_bersih='Y' AND b.kelurahan='$kel'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.kepem_air_bersih) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
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
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y' AND b.kelurahan='$kelurahan'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.kepem_jamban='Y' AND b.kelurahan='$kel'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.kepem_jamban) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
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
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y' AND b.kelurahan='$kelurahan'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.akta_lahir='Y' AND b.kelurahan='$kel'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.akta_lahir) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
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
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y' AND b.kelurahan='$kelurahan'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.jamkes='Y' AND b.kelurahan='$kel'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.jamkes) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
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
                    <td class="td1">
                        <?php
                        include ('../setting/koneksi.php');
                        if($stat !== 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y' AND b.kelurahan='$kelurahan'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan'");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat !== 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y' AND b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.bulan BETWEEN $bulan AND $bulan2");
                            $exe2 = mysqli_fetch_array($jml_harus);
                        } else if($stat == 'kpm' && isset($_POST['cetak_semua'])){
                            $jml_diterima = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pengasuhan_paud='Y' AND b.kelurahan='$kel'");
                            $exe = mysqli_fetch_array($jml_diterima);

                            $jml_harus = mysqli_query($konek, "SELECT COUNT(c.pengasuhan_paud) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
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
            </tbody>
            <!-- end of table -->
            </table>
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
