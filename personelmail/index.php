<?php
ob_start();
session_start();

if (isset($_SESSION['prsn_email'])) {

    header("location:production");
}else{


    header("location:production/login.php");
}







?>