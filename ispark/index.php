<?php
ob_start();
session_start();

if (isset($_SESSION['sube_mail'])) {

    header("location:production/login.php");
}else{


    header("location:production/login.php");
}



?>