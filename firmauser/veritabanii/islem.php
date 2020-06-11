<?php 
ob_start();
session_start();
include 'baglan.php';

if(isset($_POST['logiin'])){

     $kul_mail=$_POST['kul_mail'];
     $kul_pass=md5($_POST['kul_pass']);

    if ($kul_mail && $kul_pass) {

        $kulsor=$db->prepare("SELECT * FROM kullanici where kul_mail=:mail
        and kul_pass=:password");
        $kulsor->execute(array(
          'mail' => $kul_mail,
          'password' => $kul_pass
        ));
      $say=$kulsor->rowCount();
      $say2=$kulsor->fetch();
      $_SESSION['firma_id']=$say2['firma_id'];

      if ($say>0) {
        
        $_SESSION['kul_mail']=$kul_mail;
        

        header('location:../production/index.php');

      }else{
        header('location:../production/login.php?durum=no');
      }

        
    }
}

if(isset($_POST['kayitolustur'])) 
{

$kaydet=$db->prepare("INSERT INTO kayit SET



adsoyad=:adsoyad,
plaka=:plaka,
gelpers=:gelpers,
geldepart=:geldepart,
amac=:amac



");
$insert=$kaydet->execute(array(

   
     'adsoyad'=>$_POST['adsoyad'],
     'plaka'=>$_POST['plaka'],
     'gelpers'=>$_POST['gelpers'],
     'geldepart'=>$_POST['geldepart'],
     'amac'=>$_POST['amac']
     
    
     ));
if ($insert){
     Header("Location:../production/kayitlar.php?durum=ok");
}else{
    Header("Location:../../kayitekle.php?durum=no");
    }
}

if(isset($_POST['kayitguncelle'])) 
{
$duzenle=$db->prepare("UPDATE kayit SET

adsoyad=:adsoyad,
plaka=:plaka,
gelpers=:gelpers,
geldepart=:geldepart,
amac=:amac,
kart_ad=:kartad


WHERE kayit_id={$_POST['kayit_id']}");
$update=$duzenle->execute(array(
     
     
     'adsoyad'=>$_POST['adsoyad'],
     'plaka'=>$_POST['plaka'],
     'gelpers'=>$_POST['gelpers'],
     'geldepart'=>$_POST['geldepart'],
     'amac'=>$_POST['amac'],
     'kartad'=>$_POST['kart_ad']
     
 ));
 
     $kayit_id=$_POST['kayit_id'];
if ($update){
     Header("Location:../production/kayitlar.php?durum=ok");
}else{
    Header("Location:../../guncelle.php?durum=no");
    }
}


if(isset($_POST['kayitkapat'])) 
{
$duzenle=$db->prepare("UPDATE kayit SET

adsoyad=:adsoyad,
plaka=:plaka,
gelpers=:gelpers,
geldepart=:geldepart,
amac=:amac,
kart_ad=:kartad


WHERE kayit_id={$_POST['kayit_id']}");
$update=$duzenle->execute(array(
     
   
     'adsoyad'=>$_POST['adsoyad'],
     'plaka'=>$_POST['plaka'],
     'gelpers'=>$_POST['gelpers'],
     'geldepart'=>$_POST['geldepart'],
     'amac'=>$_POST['amac'],
     'kartad'=>$_POST['kart_ad']
     
 ));
 
     $kayit_id=$_POST['kayit_id'];
if ($update){
     Header("Location:../production/raporlar.php?durum=ok");
}else{
    Header("Location:../production/kayitkapat.php?durum=no");
    }
}


if(isset($_POST['mesajolustur'])) 
{

$kaydet=$db->prepare("INSERT INTO mesaj SET



ad=:ad,
soyadi=:soyadi,
departman=:departman,
mesaj=:mesaj




");
$insert=$kaydet->execute(array(

     'ad'=>$_POST['ad'],
     'soyadi'=>$_POST['soyadi'],
     'departman'=>$_POST['departman'],
     'mesaj'=>$_POST['mesaj']
     
     
    
     ));
if ($insert){
     Header("Mesajınız Alınmıştır. ?durum=ok");
}else{
    Header("Location:../kayitlar.php?durum=no");
    }
}

if ($_GET['mesajsil']=="ok") {
     $sil=$db->prepare("DELETE from mesaj where mesaj_id=:mesaj_id");
     $kontrol=$sil->execute(array(
         'mesaj_id' => $_GET['mesaj_id']
     ));
     if ($kontrol){
         Header("Location:../production/index.php?durum=ok");
    }else{
        Header("Location:../production/person.php?durum=no");
        }
    }
?>





