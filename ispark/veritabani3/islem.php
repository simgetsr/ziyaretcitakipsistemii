<?php
ob_start();
session_start();
include 'baglan.php';

if(isset($_POST['login'])){

     $sube_mail=$_POST['sube_mail'];
     $sube_pass=md5($_POST['sube_pass']);

    if ($sube_mail && $sube_pass) {

        $kulsor=$db->prepare("SELECT * FROM sube where sube_mail=:mail
        and sube_pass=:password");
        $kulsor->execute(array(
          'mail' => $sube_mail,
          'password' => $sube_pass
        ));
      $say=$kulsor->rowCount();
      $say2=$kulsor->fetch();
      $_SESSION['sube_id']=$say2['sube_id'];

      if ($say>0) {
        
        $_SESSION['sube_mail']=$sube_mail;
        

        header('location:../production/index.php');

      }else{
        header('location:../production/login.php?durum=no');
      }

        
    }
}

if(isset($_POST['abonekaydet'])) 
{
$kaydet=$db->prepare("INSERT INTO abone SET
abone_adi=:ad,
abone_soyadi=:soyad,
abone_plaka=:plaka,
abone_baslamatarih=:bastarih,
abone_bitistarih=:bittarih,
abone_id=:abone_id
");
$insert=$kaydet->execute(array(

     'ad'=>$_POST['abone_adi'],
     'soyad'=>$_POST['abone_soyadi'],
     'plaka'=>$_POST['abone_plaka'],
     'bastarih'=>$_POST['abone_baslamatarih'],
     'bittarih'=>$_POST['abone_bitistarih'],
     'abone_id'=>$_SESSION['abone_id']
     ));
if ($insert){
     Header("Location:../production/aboneler.php?durum=ok");
}else{
    Header("Location:../production/aboneler.php?durum=no");
    }
}

if ($_GET['abonesil']=="ok") {
    $sil=$db->prepare("DELETE from abone where abone_id=:abone_id");
    $kontrol=$sil->execute(array(
        'abone_id' => $_GET['abone_id']
    ));
    if ($kontrol){
        Header("Location:../production/aboneler.php?durum=ok");
   }else{
       Header("Location:../production/aboneler.php?durum=no");
       }
   }

   if(isset($_POST['aboneguncelle'])) 
{


           $duzenle=$db->prepare("UPDATE abone SET
            abone_adi=:ad,
            abone_soyadi=:soyad,
            abone_plaka=:plaka,
            abone_baslamatarih=:bastarih,
            abone_bitistarih=:bittarih
            

            WHERE abone_id={$_POST['abone_id']}");
            $update=$duzenle->execute(array(
            
                'ad'=>$_POST['abone_adi'],
                'soyad'=>$_POST['abone_soyadi'],
                'plaka'=>$_POST['abone_plaka'],
                'bastarih'=>$_POST['abone_baslamatarih'],
                'bittarih'=>$_POST['abone_bitistarih'],
                
             ));
            
          
            if ($update){
                 Header("Location:../production/aboneler.php?abone_id=$abone_id&durum=ok");
            }else{
                Header("Location:../production/aboneduzenle.php?durum=no");
    }
  }


?>











?>