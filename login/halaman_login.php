<?php 
session_start();
if(isset($_SESSION['id_user'])){
    header('Location:../dashboard.php');
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
    <link rel="icon" type="image/png" href="../img/logo_pemko_bjm2.png">

    <title>Login - SIMPELPRES</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container" style="margin-top: 70px;">
    <?php 
	if(isset($_GET['error'])){
		if($_GET['error']=="salah"){
			echo "<div class='alert alert-danger'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <p align="center">
                    <image src="../img/logo_pemko_bjm2.png" style="height:200px;">
                </p>
                <h2 align="center" class="text-white">Login <b>SIMPELPRES</b><b></b></h2>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    </div>
                                    <form class="user" action="aksi_login.php" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="username" aria-describedby="username" name="username"
                                                placeholder="Masukan Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Masukan Password">
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Ingat Saya</label>
                                            </div>
                                        </div> -->
                                        <button class="btn btn-success btn-lg btn-block rounded-pill" type="submit" name="login">Masuk</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>