<?php 
ob_start();
session_start();
include 'baglan.php';


if(isset($_POST['logiin'])){

     $prsn_email=$_POST['prsn_email'];
     $prsn_pass=md5($_POST['prsn_pass']);

    if ($prsn_email && $prsn_pass) {

        $kulsor=$db->prepare("SELECT * FROM personel where prsn_email=:mail
        and prsn_pass=:password");
        $kulsor->execute(array(
          'mail' => $prsn_email,
          'password' => $prsn_pass
        ));
      $say=$kulsor->rowCount();
      $say2=$kulsor->fetch();
      $_SESSION['personel_id']=$say2['personel_id'];

      if ($say>0) {
        
        $_SESSION['prsn_email']=$prsn_email;
        

        header('location:../production/index.php');

      }else{
        header('location:../production/login.php?durum=no');
      }

        
    }
}
if(isset($_POST['mesajolustur'])) 
{

$kaydet=$db->prepare("INSERT INTO mesaj SET



adsoyad=:adsoyad,
departman=:departman,
aciklama=:aciklama


");
$insert=$kaydet->execute(array(

     
     'adsoyad'=>$_POST['adsoyad'],
     'departman'=>$_POST['departman'],
     'aciklama'=>$_POST['aciklama']
     
     ));
    if ($insert){
         Header("Location:../production/kayitlar.php?durum=ok");
    }else{
        Header("Location:../../kayitlar.php?durum=no");
        }
    }
?>

