<?php include 'header.php';
 include '../veritabani2/baglan.php';

if (isset($_POST['arama'])) {


  $personelsor=$db->prepare("select * from personel where firma_id=? and personel_ad");
  $personelsor->execute(array($_SESSION['firma_id']));
  $say=$personelsor->rowCount();
  

} else{
  $personelsor=$db->prepare("select * from personel where firma_id=?");
  $personelsor->execute(array($_SESSION['firma_id']));
  $say=$personelsor->rowCount();
 
}

?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Personel İşlemleri</h3>
              </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <div align="left" class="col-md-6">
                    <h2>Personel Listesi <small>
                    <?php 
                  
                    

if (@$_GET['durum']=='ok') {?>


<b style="color:green"> İşlem Başarılı...</b>

<?php }elseif (@$_GET['durum']=='no'){?>

  <b style="color:red"> İşlem Yapılamadı...</b>


<?php } ?> </small>
                    </h2>
                    </div>
                    <div align="right" class="col-md-6">
                    <a href="prsn-ekle.php"><button style="Width:150px; height:30px; " class="btn btn-success btn-xs"><i class=" fa fa-plus" hidden="true"></i>Yeni Ekle</button></a>
                    </div>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                       <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                             
                            </th>
                            <th>Ad Soyad</th>
                            <th>Departman</th>
                            <th>Dahili</th>
                            <th>Email</th>
                            <th>Şifre</th>
                     
                            <th width="80" class="column-title"> </th>
                            <th width="80" class="column-title"> </th>
                           
                          </tr>
                        </thead>

                        <tbody>

                        <?php
                           
                      

                        while($personelcek=$personelsor->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                          <tr>
                            <td class="a-center ">
                              
                            </td>
                            <td><b><?php echo $personelcek['prsn_adsoyad']?></b></td>
                            <td><b><?php echo $personelcek['prsn_depart']?></b></td>
                            <td><b><?php echo $personelcek['prsn_dahili']?></b></td>
                            <td><b><?php echo $personelcek['prsn_email']?></b></td>
                            <td><b><?php echo $personelcek['prsn_pass']?></b></td>
                            
                           
            
                            <td class="text-center"><a href="persn-duzenle.php?personel_id=<?php echo $personelcek['personel_id']?>"><button style="width:80px;" class="btn btn-primary btn-xs"> <i class=" fa fa-pencil" hidden="true"></i>Düzenle</button></td>

                            <td class="text-center"><a href="../veritabani2/islem.php?prsnsil=ok&personel_id=<?php echo $personelcek['personel_id']?>"><button style="width:80px;" class="btn btn-danger btn-xs"><i class=" fa fa-trash" hidden="true"></i>Sil</button></a> </td>
                           
                            </td>
                          </tr>

                        <?php  }  ?>
                        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

 <?php include 'footer.php';?>
      