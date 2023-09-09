<?php
    session_start();
    include '../../setting/db.php';

    // cek apakah yang mengakses halaman ini sudah login
    if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
        header("location:../../login/halaman_login.php");
    } 

    $id_baduta = $_GET['id_baduta'];
    $findSQL = "SELECT * FROM tb_baduta WHERE id_baduta = ?";
    $database = new Database();
    $connection = $database->getConnection();
    $statement = $connection->prepare($findSQL);
    $statement->bindParam(1, $id_baduta);
    $statement->execute();
    $data = $statement->fetch();

    if(isset($_POST['edit'])){
        $id_baduta = $_POST['id_baduta'];
        $kelurahan = $_POST['kelurahan'];
        $kecamatan = $_POST['kecamatan'];
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $no_register = $_POST['no_register'];
        $nama_anak =  $_POST['nama_anak'];
        $jk =  $_POST['jk'];
        $tgl_lahir_anak =  $_POST['tgl_lahir_anak'];
        $id_gizi_anak =  $_POST['id_gizi_anak'];
        $umur =  $_POST['umur'];
        $id_hasil = $_POST['id_hasil'];
        $sql = "UPDATE `tb_baduta` SET `kelurahan` = ?, `kecamatan` = ?, `bulan` = ?, `tahun` = ?, `no_register` = ?, `nama_anak` = ?, `jk` = ?, `tgl_lahir_anak` = ?, `id_gizi_anak` = ?, `umur` = ?, `id_hasil` = ? WHERE `tb_baduta`.`id_baduta` = ?";

        $database = new Database();
        $connection = $database->getConnection();
        $statement = $connection->prepare($sql);
        $statement->bindParam(1, $kelurahan);
        $statement->bindParam(2, $kecamatan);
        $statement->bindParam(3, $bulan);
        $statement->bindParam(4, $tahun);
        $statement->bindParam(5, $no_register);
        $statement->bindParam(6, $nama_anak);
        $statement->bindParam(7, $jk);
        $statement->bindParam(8, $tgl_lahir_anak);
        $statement->bindParam(9, $id_gizi_anak);
        $statement->bindParam(10, $umur);
        $statement->bindParam(11, $id_hasil);
        $statement->bindParam(12, $id_baduta);
        $statement->execute();
        echo "<script>alert('Data Berhasil Diubah');</script>";
        echo '<meta http-equiv="refresh" content="1;url=data_batita.php">';
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

    <title>Data Anak 0-2 Tahun - Edit Data</title>

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
                                <h6 class="m-0 font-weight-bold">Edit Data Anak 0-2 Tahun</h6>
                            </div>
                            <div class="card-body">
                                    <br>
                                    <form action="" method="POST">
                                        <input type="hidden" id="id_baduta" name="id_baduta" value="<?php echo $data['id_baduta']; ?>" readonly>
                                        <div class="row">
                                            <div class="col">
                                                <!-- kelurahan -->
                                                <div class="form-group row">
                                                    <label for="kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select select2" name="kelurahan" id="kelurahan" style="width: 250px;">
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
                                                        <select class="form-select select2" name="kecamatan" id="kecamatan" style="width: 250px;">
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
                                                        <select class="form-select select2" name="bulan" id="bulan" style="width: 250px;">
                                                            <option value="--Pilih Bulan--"></option>
                                                            <option value="1" <?php echo ($data['bulan'] == 1) ? " selected" : "" ?>>Januari</option>
                                                            <option value="2" <?php echo ($data['bulan'] == 2) ? " selected" : "" ?>>Februari</option>
                                                            <option value="3" <?php echo ($data['bulan'] == 3) ? " selected" : "" ?>>Maret</option>
                                                            <option value="4" <?php echo ($data['bulan'] == 4) ? " selected" : "" ?>>April</option>
                                                            <option value="5" <?php echo ($data['bulan'] == 5) ? " selected" : "" ?>>Mei</option>
                                                            <option value="6" <?php echo ($data['bulan'] == 6) ? " selected" : "" ?>>Juni</option>
                                                            <option value="7" <?php echo ($data['bulan'] == 7) ? " selected" : "" ?>>Juli</option>
                                                            <option value="8" <?php echo ($data['bulan'] == 8) ? " selected" : "" ?>>Agustus</option>
                                                            <option value="9" <?php echo ($data['bulan'] == 9) ? " selected" : "" ?>>September</option>
                                                            <option value="10" <?php echo ($data['bulan'] == 10) ? " selected" : "" ?>>Oktober</option>
                                                            <option value="11" <?php echo ($data['bulan'] == 11) ? " selected" : "" ?>>November</option>
                                                            <option value="12" <?php echo ($data['bulan'] == 12) ? " selected" : "" ?>>Desember</option>
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
                                                        <select class="form-select select2" name="tahun" id="tahun" style="width: 250px;">
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
                                                <!-- no register -->
                                                <div class="form-group row">
                                                    <label for="no_register" class="col-sm-2 col-form-label">No Register</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <input type="text" class="form-control" name="no_register" id="no_register" placeholder="No Register" style="width: 250px;" value="<?php echo $data['no_register']; ?>">
                                                    </div>
                                                </div>
                                                <!-- end no register -->
                                            </div>
                                            <div class="col">
                                                <!-- nama anak -->
                                                <div class="form-group row">
                                                    <label for="nama_anak" class="col-sm-2 col-form-label">Nama Anak</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <input type="text" class="form-control" name="nama_anak" id="nama_anak" placeholder="Nama Anak" style="width: 250px;" value="<?php echo $data['nama_anak']; ?>">
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
                                                            <input class="form-check-input" type="radio" value="L" name="jk" id="jk" <?php echo ($data['jk'] == 'L') ? " checked" : "" ?> required>
                                                            <label class="form-check-label" for="jk">
                                                                L
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" value="P" name="jk" id="jk2" <?php echo ($data['jk'] == 'P') ? " checked" : "" ?> required>
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
                                                    <label for="tgl_lahir_anak" class="col-sm-2 col-form-label">Tanggal Lahir Anak</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <input type="date" class="form-control" name="tgl_lahir_anak" id="tgl_lahir_anak" placeholder="Tanggal Lahir Anak" style="width: 250px;" value="<?php echo $data['tgl_lahir_anak']; ?>" onchange="hitungUmur()">
                                                    </div>
                                                </div>
                                                <!-- end tanggal lahir anak -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <!-- status_gizi_anak -->
                                                <div class="form-group row">
                                                    <label for="status_gizi_anak" class="col-sm-2 col-form-label">Status Gizi Anak</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <select class="form-select select2" name="id_gizi_anak" id="id_gizi_anak" style="width: 250px;">
                                                        <?php 
                                                        include '../../setting/koneksi.php';
                                                        $result = mysqli_query($konek, "SELECT * FROM tb_gizi_anak");
                                                        while($row = mysqli_fetch_array($result)){?> 
                                                        <option value="<?php echo $row['id_gizi_anak']?>" <?php if($data["id_gizi_anak"] == $row['id_gizi_anak']){echo "SELECTED";} ?>><?php echo $row['status_gizi']?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- end jamkes -->
                                            </div>
                                            <div class="col">
                                                <!-- umur -->
                                                <div class="form-group row">
                                                    <label for="umur" class="col-sm-2 col-form-label">Umur (Bulan)</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="umur" id="umur" placeholder="Umur" style="width: 250px;" value="<?php echo $data['umur']; ?>">
                                                    </div>
                                                </div>
                                                <!-- end umur -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <!-- hasil -->
                                                <div class="form-group row">
                                                    <label for="hasil" class="col-sm-2 col-form-label">Hasil (M/K/H)</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select select2" name="id_hasil" id="id_hasil" style="width: 250px;">
                                                        <?php 
                                                        include '../../setting/koneksi.php';
                                                        $result = mysqli_query($konek, "SELECT * FROM tb_hasil");
                                                        while($row = mysqli_fetch_array($result)){?> 
                                                        <option value="<?php echo $row['id_hasil']?>" <?php if($data["id_hasil"] == $row['id_hasil']){echo "SELECTED";} ?>><?php 
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
                                                        ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- end hasil -->
                                            </div>
                                            <div class="col">
                                                <!-- hasil -->
                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <input type="hidden">
                                                    </div>
                                                </div>
                                                <!-- end hasil -->
                                            </div>
                                        </div>
                                        
                                        <a class="btn btn-secondary btn-sm mb-3" href="data_batita.php"><i class="fa fa fa-arrow-left"></i> Batal</a>
                                        <button type="submit" class="btn btn-success btn-sm mb-3" name="edit"><i class="fa fa fa-save"></i> Simpan</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    </section>

<?php include '../../template/footer.php'; ?>