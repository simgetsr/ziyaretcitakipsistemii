<?php 
ob_start();
session_start();
include 'baglan.php'; 

if(isset($_POST['loginn'])){

     $user_mail=$_POST['user_mail'];
     $password=md5($_POST['password']);

  if ($user_mail && $password) {

       $kulsor=$db->prepare("SELECT * FROM users where user_mail=:mail
       and password=:pass");
       $kulsor->execute(array(
         'mail' => $user_mail,
         'pass' => $password
       ));
     $say=$kulsor->rowCount();
     if ($say>0) {
       
       $_SESSION['user_mail']=$user_mail;
       

       header('location:../production/index.php');

     }else{
       header('location:../production/login.php?durum=no');
     }

       
   }
}


if(isset($_POST['firmakaydet'])) 
{
$kaydet=$db->prepare("INSERT INTO firma SET
    firma_mail=:mail,
    firma_pass=:sifre,
    firma_ad=:ad,
    firma_alan=:alan
           

");
$insert=$kaydet->execute(array(

    'mail'=>$_POST['firma_mail'],
    'sifre'=>$_POST['firma_pass'],
    'ad'=>$_POST['firma_ad'],
    'alan'=>$_POST['firma_alan']

     ));

if ($insert){
     Header("Location:../production/firmalar.php?durum=ok");
}else{
    Header("Location:../production/firmalar.php?durum=no");
    }
}


if(isset($_POST['firmaduzenle'])) 
{

            $duzenle=$db->prepare("UPDATE firma SET
            firma_mail=:mail,
            firma_pass=:sifre,
            firma_ad=:ad,
            firma_alan=:alan
           
            WHERE firma_id={$_POST['firma_id']}");
            $update=$duzenle->execute(array(
            
                 'mail'=>$_POST['firma_mail'],
                 'sifre'=>$_POST['firma_pass'],
                 'ad'=>$_POST['firma_ad'],
                 'alan'=>$_POST['firma_alan']
             ));
            
             $firma_id=$_POST['firma_id'];
            if ($update){
                 Header("Location:../production/firmalar.php?firma_id=$firma_id&durum=ok");
            }else{
                Header("Location:../production/firmalar.php?durum=no");
           }
}
if ($_GET['firmasil']=="ok") {
     $sil=$db->prepare("DELETE from firma where firma_id=:firma_id");
     $kontrol=$sil->execute(array(
         'firma_id' => $_GET['firma_id']
     ));
     if ($kontrol){
         Header("Location:../production/firmalar.php?durum=ok");
    }else{
        Header("Location:../production/firmalar.php?durum=no");
        }
    }
    
if(isset($_POST['subekaydet'])) 
{
$kaydet=$db->prepare("INSERT INTO sube SET
    sube_mail=:mail,
    sube_pass=:sifre,
    sube_adi=:ad,
    sube_adres=:adres,
    sube_alankap=:alankap
           

");
$insert=$kaydet->execute(array(

    'mail'=>$_POST['sube_mail'],
    'sifre'=>$_POST['sube_pass'],
    'ad'=>$_POST['sube_adi'],
    'adres'=>$_POST['sube_adres'],
    'alankap'=>$_POST['sube_alankap']

     ));

if ($insert){
     Header("Location:../production/subeler.php?durum=ok");
}else{
    Header("Location:../production/subeler.php?durum=no");
    }
}


if(isset($_POST['subeduzenle'])) 
{

            $duzenle=$db->prepare("UPDATE sube SET
            sube_mail=:mail,
            sube_pass=:sifre,
            sube_adi=:ad,
            sube_adres=:adres,
            sube_alankap=:alankap
           
            WHERE sube_id={$_POST['sube_id']}");
            $update=$duzenle->execute(array(
                'mail'=>$_POST['sube_mail'],
                'sifre'=>$_POST['sube_pass'],
                'ad'=>$_POST['sube_adi'],
                'adres'=>$_POST['sube_adres'],
                'alankap'=>$_POST['sube_alankap']
             ));
            
             $sube_id=$_POST['sube_id'];
            if ($update){
                 Header("Location:../production/subeler.php?sube_id=$sube_id&durum=ok");
            }else{
                Header("Location:../production/subeler.php?durum=no");
           }
}
if ($_GET['subesil']=="ok") {
     $sil=$db->prepare("DELETE from sube where sube_id=:sube_id");
     $kontrol=$sil->execute(array(
         'sube_id' => $_GET['sube_id']
     ));
     if ($kontrol){
         Header("Location:../production/subeler.php?durum=ok");
    }else{
        Header("Location:../production/subeler.php?durum=no");
        }
    }
?>

