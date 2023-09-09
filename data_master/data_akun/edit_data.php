<?php
    session_start();
    include '../../setting/koneksi.php';

    // cek apakah yang mengakses halaman ini sudah login
    if(!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false){
        header("location:../../login/halaman_login.php");
    } 

    $id = $_GET['id'];
    $findSQL = "SELECT * FROM tb_user WHERE id_user = '$id'";
    $result = mysqli_query($konek,$findSQL);
    $data = mysqli_fetch_array($result);

    if(isset($_POST['edit'])){
        $id_user = $_POST['id_user'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "UPDATE tb_user SET username = '$username', password = '$password' WHERE id_user = '$id_user'";
        mysqli_query($konek,$sql);
        

        echo "<script>alert('Data Berhasil Diubah');</script>";
        echo '<meta http-equiv="refresh" content="1;url=data_akun.php">';
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

    <title>Data Hasil- Edit Data</title>

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
                                <h6 class="m-0 font-weight-bold">Edit Data Akun</h6>
                            </div>
                            <div class="card-body">
                                    <br>
                                    <form action="" method="POST">
                                        <input type="hidden" id="id_user" name="id_user" value="<?php echo $data['id_user']; ?>" readonly>
                                        <div class="row">
                                            <div class="col">
                                                <!-- no register -->
                                                <div class="form-group row">
                                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username" style="width: 250px;" value="<?php echo $data['username']; ?>">
                                                    </div>
                                                </div>
                                                <!-- end no register -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <!-- no register -->
                                                <div class="form-group row">
                                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <input type="text" class="form-control" name="password" id="password" placeholder="Masukkan Password" style="width: 250px;" value="<?php echo $data['password']; ?>">
                                                    </div>
                                                </div>
                                                <!-- end no register -->
                                            </div>
                                        </div>
                                        <a class="btn btn-secondary btn-sm mb-3" href="data_akun.php"><i class="fa fa fa-arrow-left"></i> Batal</a>
                                        <button type="submit" class="btn btn-success btn-sm mb-3" name="edit"><i class="fa fa fa-save"></i> Simpan</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    </section>

<?php include '../../template/footer.php'; ?>