<?php
    session_start();
    include '../../setting/koneksi.php';

    // cek apakah yang mengakses halaman ini sudah login
    if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
        header("location:../../login/halaman_login.php");
    } 

    $id_formulir_duaC = $_GET['id_formulir_duaC'];
    $sql = "SELECT * FROM tb_formulir2c f INNER JOIN tb_balita b ON f.id_balita = b.id_balita WHERE f.id_formulir_duaC='$id_formulir_duaC'";
    $result = mysqli_query($konek,$sql);
    $data = mysqli_fetch_array($result);

    if(isset($_POST['edit'])){
        $id_formulir_duaC = $_POST['id_formulir_duaC'];
        $januari =  $_POST['januari'];
        $februari =  $_POST['februari'];
        $maret = $_POST['maret'];
        $april =  $_POST['april'];
        $mei =  $_POST['mei'];
        $juni =  $_POST['juni'];
        $juli =  $_POST['juli'];
        $agustus =  $_POST['agustus'];
        $september = $_POST['september'];
        $oktober =  $_POST['oktober'];
        $november =  $_POST['november'];
        $desember =  $_POST['desember'];
        $jml_aktif = $_POST['jml_aktif'];

        // simpan ke tabel formulir2c
        $sql = "UPDATE tb_formulir2c SET januari = '$januari', februari = '$februari', maret = '$maret', april = '$april', mei = '$mei', juli = '$juli', juni = '$juni', agustus = '$agustus', september = '$september', oktober = '$oktober', november = '$november', desember = '$desember', jml_aktif='$jml_aktif' WHERE id_formulir_duaC = '$id_formulir_duaC'";
        mysqli_query($konek, $sql);


        echo "<script>alert('Data Berhasil Diubah');</script>";
        echo '<meta http-equiv="refresh" content="1;url=formulir2C.php">';
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="../../img/logo_pemko_bjm2.png">

    <title>Laporan 2.C - Edit Data</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body id="page-top">
    <div id="loading">
        <span class="loader"></span>
        <div class="textLoader">
            <center>
            <b>Please Wait ... </b>
            </center>
        </div>
    </div>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include '../../template/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include '../../template/header.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <section id="main-content">
                    <section class="wrapper">
                    <div class="card mb-4 mt-2">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold">Data Laporan 2C Pemantauan Layanan dan Sasaran Paud Anak >2-6 Tahun</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <input type="hidden" id="id_formulir_duaC" name="id_formulir_duaC" value="<?php echo $data['id_formulir_duaC']; ?>" readonly>
                                <div class="row">
                                            <div class="col">
                                                <!-- kelurahan -->
                                                <div class="form-group row">
                                                    <label for="kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select select2" name="kelurahan" id="kelurahan" style="width: 250px;" disabled>
                                                        <?php
                                                            include '../../setting/koneksi.php';
                                                            $kel = $_SESSION['username'];
                                                            //query menampilkan nama unit kerja ke dalam combobox
                                                            if($stat == 'pegawai' or $_SESSION['status'] == 'administrator'){
                                                                $query = mysqli_query($konek, "SELECT * FROM tb_kelurahan");
                                                            } else {
                                                                $query = mysqli_query($konek, "SELECT * FROM tb_kelurahan WHERE kelurahan='$kel'");
                                                            }
                                                            while ($res = mysqli_fetch_array($query)) {
                                                                if($data['kelurahan']==$res['kelurahan']) {
                                                                    $select = "selected";
                                                                } else {
                                                                    $select = "";
                                                                }
                                                                echo "<option $select>".$res['kelurahan']."</option>";
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- end kelurahan -->
                                            </div>
                                            <div class="col">
                                                <!-- kecamatan -->
                                                <div class="form-group row">
                                                    <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select select2" name="kecamatan" id="kecamatan" style="width: 250px;" disabled>
                                                        <?php
                                                            include '../../setting/koneksi.php';
                                                            //query menampilkan nama unit kerja ke dalam combobox
                                                            $query = mysqli_query($konek, "SELECT * FROM tb_kecamatan GROUP BY kecamatan ORDER BY kecamatan");
                                                            while ($res = mysqli_fetch_array($query)) {
                                                                if($data['kecamatan']==$res['kecamatan']) {
                                                                    $select = "selected";
                                                                } else {
                                                                    $select = "";
                                                                }
                                                                echo "<option $select>".$res['kecamatan']."</option>";
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- end kecamatan -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <!-- bulan -->
                                                <div class="form-group row">
                                                    <label for="bulan" class="col-sm-2 col-form-label">Bulan</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select select2" name="bulan" id="bulan" style="width: 250px;" disabled>
                                                            <option value="--Pilih Bulan--"></option>
                                                            <option value="Januari" <?php echo ($data['bulan'] == 'Januari') ? " selected" : "" ?>>Januari</option>
                                                            <option value="Februari" <?php echo ($data['bulan'] == 'Februari') ? " selected" : "" ?>>Februari</option>
                                                            <option value="Maret" <?php echo ($data['bulan'] == 'Maret') ? " selected" : "" ?>>Maret</option>
                                                            <option value="April" <?php echo ($data['bulan'] == 'April') ? " selected" : "" ?>>April</option>
                                                            <option value="Mei" <?php echo ($data['bulan'] == 'Mei') ? " selected" : "" ?>>Mei</option>
                                                            <option value="Juni" <?php echo ($data['bulan'] == 'Juni') ? " selected" : "" ?>>Juni</option>
                                                            <option value="Juli" <?php echo ($data['bulan'] == 'Juli') ? " selected" : "" ?>>Juli</option>
                                                            <option value="Agustus" <?php echo ($data['bulan'] == 'Agustus') ? " selected" : "" ?>>Agustus</option>
                                                            <option value="September" <?php echo ($data['bulan'] == 'September') ? " selected" : "" ?>>September</option>
                                                            <option value="Oktober" <?php echo ($data['bulan'] == 'Oktober') ? " selected" : "" ?>>Oktober</option>
                                                            <option value="November" <?php echo ($data['bulan'] == 'November') ? " selected" : "" ?>>November</option>
                                                            <option value="Desember" <?php echo ($data['bulan'] == 'Desember') ? " selected" : "" ?>>Desember</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- end bulan -->
                                            </div>
                                            <div class="col">
                                                <!-- tahun -->
                                                <div class="form-group row">
                                                    <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select select2" name="tahun" id="tahun" style="width: 250px;" disabled>
                                                            <option value="--Pilih tahun--"></option>
                                                            <option value="2019" <?php echo ($data['tahun'] == 2019) ? " selected" : "" ?>>2019</option>
                                                            <option value="2020" <?php echo ($data['tahun'] == 2020) ? " selected" : "" ?>>2020</option>
                                                            <option value="2021" <?php echo ($data['tahun'] == 2021) ? " selected" : "" ?>>2021</option>
                                                            <option value="2022" <?php echo ($data['tahun'] == 2022) ? " selected" : "" ?>>2022</option>
                                                            <option value="2023" <?php echo ($data['tahun'] == 2023) ? " selected" : "" ?>>2023</option>
                                                            <option value="2024" <?php echo ($data['tahun'] == 2024) ? " selected" : "" ?>>2024</option>
                                                            <option value="2025" <?php echo ($data['tahun'] == 2025) ? " selected" : "" ?>>2025</option>
                                                            <option value="2026" <?php echo ($data['tahun'] == 2026) ? " selected" : "" ?>>2026</option>
                                                            <option value="2027" <?php echo ($data['tahun'] == 2027) ? " selected" : "" ?>>2027</option>
                                                            <option value="2028" <?php echo ($data['tahun'] == 2028) ? " selected" : "" ?>>2028</option>
                                                            <option value="2029" <?php echo ($data['tahun'] == 2029) ? " selected" : "" ?>>2029</option>
                                                            <option value="2030" <?php echo ($data['tahun'] == 2030) ? " selected" : "" ?>>2030</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- end tahun -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <!-- no_rmh_tangga -->
                                                <div class="form-group row">
                                                    <label for="no_rmh_tangga" class="col-sm-2 col-form-label">Nama Rumah Tangga</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <input type="text" class="form-control" name="no_rmh_tangga" id="no_rmh_tangga" placeholder="Nama Rumah Tangga" style="width: 250px;" value="<?php echo $data['no_rmh_tangga']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <!-- end no_rmh_tangga -->
                                            </div>
                                            <div class="col">
                                                <!-- nama anak -->
                                                <div class="form-group row">
                                                    <label for="nama_anak" class="col-sm-2 col-form-label">Nama Anak</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <input type="text" class="form-control" name="nama_anak" id="nama_anak" placeholder="Nama Anak" style="width: 250px;" value="<?php echo $data['nama_anak']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <!-- end nama anak -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <!-- jk -->
                                                <div class="form-group row">
                                                    <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="L" name="jk" id="jk" <?php echo ($data['jk'] == 'L') ? " checked" : "" ?> required disabled>
                                                            <label class="form-check-label" for="jk">
                                                                L
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="P" name="jk" id="jk2" <?php echo ($data['jk'] == 'P') ? " checked" : "" ?> required disabled>
                                                            <label class="form-check-label" for="jk2">
                                                                P</h4>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end jk -->
                                            </div>
                                            <div class="col">
                                                <!-- tanggal lahir anak -->
                                                <div class="form-group row">
                                                    <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" style="width: 250px;" value="<?php echo $data['tgl_lahir']; ?>" onchange="hitungUsia2C()" disabled>
                                                    </div>
                                                </div>
                                                <!-- end tanggal lahir anak -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <!-- anak_usia_baduta -->
                                                <div class="form-group row">
                                                    <label for="usia_anak" class="col-sm-2 col-form-label">Usia Anak (Tahun)</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="usia_anak" id="usia_anak" placeholder="Usia Anak (Tahun)" style="width: 250px;" value="<?php echo $data['usia_anak']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <!-- end anak_usia_baduta -->
                                            </div>
                                    <div class="col">
                                        <!-- januari -->
                                        <div class="form-group row">
                                            <label for="januari" class="col-sm-2 col-form-label">Januari</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="januari" id="januari" <?php echo ($data['januari'] == 'Y') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="januari">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="januari" id="januari2" <?php echo ($data['januari'] == 'T') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="januari2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="januari" id="januari3" <?php echo ($data['januari'] == 'TS') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="januari3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end januari -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- februari -->
                                        <div class="form-group row">
                                            <label for="februari" class="col-sm-2 col-form-label">Februari</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="februari" id="februari" <?php echo ($data['februari'] == 'Y') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="februari">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="februari" id="februari2" <?php echo ($data['februari'] == 'T') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="februari2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="februari" id="februari3" <?php echo ($data['februari'] == 'TS') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="februari3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end februari -->
                                    </div>
                                    <div class="col">
                                        <!-- maret -->
                                        <div class="form-group row">
                                            <label for="maret" class="col-sm-2 col-form-label">Maret</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="maret" id="maret" <?php echo ($data['maret'] == 'Y') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="maret">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="maret" id="maret2" <?php echo ($data['maret'] == 'T') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="maret2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="maret" id="maret3" <?php echo ($data['maret'] == 'TS') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="maret3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end maret -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- april -->
                                        <div class="form-group row">
                                            <label for="april" class="col-sm-2 col-form-label">April</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="april" id="april" <?php echo ($data['april'] == 'Y') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="april">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="april" id="april2" <?php echo ($data['april'] == 'T') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="april2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="april" id="april3" <?php echo ($data['april'] == 'TS') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="april3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end april -->
                                    </div>  
                                    <div class="col">
                                        <!-- mei -->
                                        <div class="form-group row">
                                            <label for="mei" class="col-sm-2 col-form-label">Mei</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="mei" id="mei" <?php echo ($data['mei'] == 'Y') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="mei">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="mei" id="mei2" <?php echo ($data['mei'] == 'T') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="mei2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="mei" id="mei3" <?php echo ($data['mei'] == 'TS') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="mei3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end konseling gizi -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- juli -->
                                        <div class="form-group row">
                                            <label for="juli" class="col-sm-2 col-form-label">Juli</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="juli" id="juli" <?php echo ($data['juli'] == 'Y') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="juli">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="juli" id="juli2" <?php echo ($data['juli'] == 'T') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="juli2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="juli" id="juli3" <?php echo ($data['juli'] == 'TS') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="juli3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end juli-->
                                    </div>
                                    <div class="col">
                                        <!-- juni -->
                                        <div class="form-group row">
                                            <label for="juni" class="col-sm-2 col-form-label">Juni</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="juni" id="juni" <?php echo ($data['juni'] == 'Y') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="juni">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="juni" id="juni2" <?php echo ($data['juni'] == 'T') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="juni2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="juni" id="juni3" <?php echo ($data['juni'] == 'TS') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="juni3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end juni -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- agustus -->
                                        <div class="form-group row">
                                            <label for="agustus" class="col-sm-2 col-form-label">Agustus</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="agustus" id="agustus" <?php echo ($data['agustus'] == 'Y') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="agustus">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="agustus" id="agustus2" <?php echo ($data['agustus'] == 'T') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="agustus2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="agustus" id="agustus3" <?php echo ($data['agustus'] == 'TS') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="agustus3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end agustus -->
                                    </div>
                                    <div class="col">
                                        <!-- september -->
                                        <div class="form-group row">
                                            <label for="september" class="col-sm-2 col-form-label">September</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="september" id="september" <?php echo ($data['september'] == 'Y') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="september">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="september" id="september2" <?php echo ($data['september'] == 'T') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="september2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="september" id="september3" <?php echo ($data['september'] == 'TS') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="september3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end september -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- oktober -->
                                        <div class="form-group row">
                                            <label for="oktober" class="col-sm-2 col-form-label">Oktober</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="oktober" id="oktober" <?php echo ($data['oktober'] == 'Y') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="oktober">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="oktober" id="oktober2" <?php echo ($data['oktober'] == 'T') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="oktober2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="oktober" id="oktober3" <?php echo ($data['oktober'] == 'TS') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="oktober3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end oktober -->
                                    </div>
                                    <div class="col">
                                    <!-- november -->
                                        <div class="form-group row">
                                            <label for="november" class="col-sm-2 col-form-label">November</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="november" id="november" <?php echo ($data['november'] == 'Y') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="november">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="november" id="november2" <?php echo ($data['november'] == 'T') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="november2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="november" id="november3" <?php echo ($data['november'] == 'TS') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="november3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end november -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    <!-- desember -->
                                        <div class="form-group row">
                                            <label for="desember" class="col-sm-2 col-form-label">Desember</label>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Y" name="desember" id="desember" <?php echo ($data['desember'] == 'Y') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="desember">
                                                        Y
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="T" name="desember" id="desember2" <?php echo ($data['desember'] == 'T') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="desember2">
                                                        T
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="TS" name="desember" id="desember3" <?php echo ($data['desember'] == 'TS') ? " checked" : "" ?> required>
                                                    <label class="form-check-label" for="desember3">
                                                        TS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end desember -->
                                    </div>
                                    <div class="col">
                                        <!-- anak_usia_baduta -->
                                        <div class="form-group row">
                                            <label for="jml_aktif" class="col-sm-2 col-form-label">Jumlah Keaktifan</label>
                                            <div class="col-sm-10 mt-2">
                                                <input type="text" class="form-control" name="jml_aktif" id="jml_aktif" placeholder="Jumlah Keaktifan" style="width: 250px;" value="<?php echo $data['jml_aktif']; ?>">
                                            </div>
                                        </div>
                                        <!-- end anak_usia_baduta -->
                                    </div>
                                </div>
                                
                                <a class="btn btn-secondary btn-sm mb-3" href="formulir2C.php"><i class="fa fa fa-arrow-left"></i> Batal</a>
                                <button type="submit" class="btn btn-success btn-sm mb-3" name="edit"><i class="fa fa fa-save"></i> Simpan</button>
                            </form>
                        </div>
                    </div>
                    </section>
                    </section>

<?php include '../../template/footer.php'; ?>