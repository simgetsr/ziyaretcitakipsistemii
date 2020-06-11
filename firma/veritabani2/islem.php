<?php
ob_start();
session_start();
include 'baglan.php';

if(isset($_POST['login'])){

     $firma_mail=$_POST['firma_mail'];
     $firma_pass=md5($_POST['firma_pass']);

    if ($firma_mail && $firma_pass) {

        $kulsor=$db->prepare("SELECT * FROM firma where firma_mail=:mail
        and firma_pass=:password");
        $kulsor->execute(array(
          'mail' => $firma_mail,
          'password' => $firma_pass
        ));
      $say=$kulsor->rowCount();
      $say2=$kulsor->fetch();
      $_SESSION['firma_id']=$say2['firma_id'];

      if ($say>0) {
        
        $_SESSION['firma_mail']=$firma_mail;
        

        header('location:../production/index.php');

      }else{
        header('location:../production/login.php?durum=no');
      }

        
    }
}

if(isset($_POST['prsnkaydet'])) 

{
$kaydet=$db->prepare("INSERT INTO personel SET
prsn_adsoyad=:ad,
prsn_depart=:depart,
prsn_dahili=:dahili,
prsn_email=:email,
prsn_pass=:prsn_pass,
firma_id=:firma_id

");
$insert=$kaydet->execute(array(

     'ad'=>$_POST['prsn_adsoyad'],
     'depart'=>$_POST['prsn_depart'],
     'dahili'=>$_POST['prsn_dahili'],
     'email'=>$_POST['prsn_email'],
     'prsn_pass'=>$_POST['prsn_pass'],

     'firma_id'=>$_SESSION['firma_id']
     
     ));
if ($insert){
     Header("Location:../production/personel.php?durum=ok");
}else{
    Header("Location:../production/personel.php?durum=no");
    }
}

if ($_GET['prsnsil']=="ok") {
    $sil=$db->prepare("DELETE from personel where personel_id=:personel_id");
    $kontrol=$sil->execute(array(
        'personel_id' => $_GET['personel_id']
    ));
    if ($kontrol){
        Header("Location:../production/personel.php?durum=ok");
   }else{
       Header("Location:../production/personel.php?durum=no");
       }
   }

   if(isset($_POST['prsnduzenle'])) 
 
{
  $personel_id=$_POST['personel_id'];

           $duzenle=$db->prepare("UPDATE personel SET
            prsn_adsoyad=:ad,
            prsn_depart=:depart,
            prsn_dahili=:dahili,
            prsn_email=:email,
            prsn_pass=:prsn_pass


            WHERE personel_id={$_POST['personel_id']}");
            $update=$duzenle->execute(array(
            
                 'ad'=>$_POST['prsn_adsoyad'],
                 'depart'=>$_POST['prsn_depart'],
                 'dahili'=>$_POST['prsn_dahili'],
                 'email'=>$_POST['prsn_email'],
                 'prsn_pass'=>$_POST['prsn_pass']
             ));
            
          
            if ($update){
                 Header("Location:../production/personel.php?personel_id=$personel_id&durum=ok");
            }else{
                Header("Location:../production/persn-duzenle.php?durum=no");
    }
  }

if(isset($_POST['kartkaydet'])) 
{
$kaydet=$db->prepare("INSERT INTO kart SET
    kart_no=:no,
    kart_ad=:ad

");
$insert=$kaydet->execute(array(

    'no'=>$_POST['kart_no'],
    'ad'=>$_POST['kart_ad']
     ));

if ($insert){
     Header("Location:../production/kartlar.php?durum=ok");
}else{
    Header("Location:../production/kartlar.php?durum=no");
    }
}


if(isset($_POST['kartduzenle'])) 
{

            $duzenle=$db->prepare("UPDATE kart SET
            kart_no=:no,
            kart_ad=:ad
           
            WHERE kart_id={$_POST['kart_id']}");
            $update=$duzenle->execute(array(
            
                 'no'=>$_POST['kart_no'],
                 'ad'=>$_POST['kart_ad']
              
             ));
            
             $firma_id=$_POST['firma_id'];
            if ($update){
                 Header("Location:../production/kartlar.php?kart_id=$kart_id&durum=ok");
            }else{
                Header("Location:../production/kartlar.php?durum=no");
           }
}

if ($_GET['kartsil']=="ok") {
     $sil=$db->prepare("DELETE from kart where kart_id=:kart_id");
     $kontrol=$sil->execute(array(
         'kart_id' => $_GET['kart_id']
     ));
     if ($kontrol){
         Header("Location:../production/kartlar.php?durum=ok");
    }else{
        Header("Location:../production/kartlar.php?durum=no");
        }
    }

if(isset($_POST['departkaydet'])) 
    {
    $kaydet=$db->prepare("INSERT INTO departman SET
        depart_ad=:ad
    
    ");
    $insert=$kaydet->execute(array(
    
       
        'ad'=>$_POST['depart_ad']
         ));
    
    if ($insert){
         Header("Location:../production/departmanlar.php?durum=ok");
    }else{
        Header("Location:../production/departmanlar.php?durum=no");
        }
    }
    
     
if ($_GET['departsil']=="ok") {
        $sil=$db->prepare("DELETE from departman where departman_id=:departman_id");
        $kontrol=$sil->execute(array(
            'departman_id' => $_GET['departman_id']
        ));
        if ($kontrol){
            Header("Location:../production/departmanlar.php?durum=ok");
       }else{
           Header("Location:../production/departmanlar.php?durum=no");
           }
       }
   
 


?>











?>