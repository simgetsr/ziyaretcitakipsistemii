<?php 
include 'header.php';
include '../veritabani2/baglan.php';

$depsor=$db->prepare("select * from departman");
$depsor->execute();
$personelsor=$db->prepare("SELECT * from personel where personel_id=:id");
$personelsor->execute(array(
    'id' => $_GET['personel_id']
));
$personelcek=$personelsor->fetch(PDO::FETCH_ASSOC);

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Firma İşlemleri</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <div align="left" class="col-md-6">
                    <h2>Düzenle
                    <?php 

if (@$_GET['durum']=='ok') {?>


<b style="color:green"> İşlem Başarılı...</b>

<?php }elseif (@$_GET['durum']=='no'){?>

  <b style="color:red"> İşlem Yapılamadı...</b>


<?php } ?> </small>
                    </h2>
                    </div>
                    <div align="right" class="col-md-6">
                    <a href="personel.php"><button style="Width:150px; height:30px; " class="btn btn-warning btn-xs"><i class=" fa fa-undo" hidden="true"></i>Geri Dön</button></a>
                    </div>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <form action="../veritabani2/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  
                        <input type="hidden" name="personel_id" value="<?php echo $personelcek['personel_id']?>">


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad Soyad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="prsn_adsoyad" value="<?php echo $personelcek['prsn_adsoyad']?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-6 col-xs-12">Departman</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          <select class="form-control" name="prsn_depart">
                          <option> <?php echo $personelcek['prsn_depart']?> </option>
                          <?php 

while($depcek=$depsor->fetch(PDO::FETCH_ASSOC)) {?>
                            
                            <option> <?php echo $depcek['depart_ad']?> </option>
                            <?php  }
 
?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dahili<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="prsn_dahili" value="<?php echo $personelcek['prsn_dahili']?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="prsn_email"value="<?php echo $personelcek['prsn_email']?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Şifre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="first-name" required="required" name="prsn_pass"value="<?php echo $personelcek['prsn_pass']?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="prsnduzenle" class="btn btn-primary">Kaydet</button>
                        </div>
                </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

 <?php include 'footer.php';?>
      