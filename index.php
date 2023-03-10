<?php
session_start();
if(!isset($_SESSION['id_user'])){
    header('Location:login/halaman_login.php');
} else{
    header('Location:dashboard.php');
}
?>