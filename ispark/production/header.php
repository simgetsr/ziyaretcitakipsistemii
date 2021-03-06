<?php
ob_start();
session_start();
include '../veritabani3/baglan.php';



$kulsor=$db->prepare("select * from sube where sube_mail=:mail");
$kulsor->execute(array(
  'mail' => $_SESSION['sube_mail']
  ));
  $say=$kulsor->rowCount();

  if ($say==0) {

    header("location:login.php?durum=izinsiz");
    exit;
  }

$kulcek=$kulsor->fetch(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Ziyaretçi Araç Takip Sistemi |</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-taxi"></i> <span>Araç Takip System</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
               
              </div>
              <div class="profile_info">
                <span><center>Hoşgeldin</center></span>
                <h2><center><?php echo $_SESSION['sube_mail']; ?></center></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

           <?php include 'sidebar.php';?>
       

          
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="" alt=""><?php echo $_SESSION['sube_mail']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
              
                    <li><a href="login.php"><i class="fa fa-sign-out pull-right"></i> Çıkış</a></li>
                  </ul>
                </li>

                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                     
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->