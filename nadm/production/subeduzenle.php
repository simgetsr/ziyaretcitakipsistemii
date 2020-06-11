<?php 
include 'header.php';
include '../veritabani/baglan.php';


$subesor=$db->prepare("SELECT * from sube where sube_id=:id");
$subesor->execute(array(
    'id' => $_GET['sube_id']
));
$subecek=$subesor->fetch(PDO::FETCH_ASSOC);

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>şube İşlemleri</h3>
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
                    <a href="subeler.php"><button style="Width:150px; height:30px; " class="btn btn-warning btn-xs"><i class=" fa fa-undo" hidden="true"></i>Geri Dön</button></a>
                    </div>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <form action="../veritabani/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  
                        <input type="hidden" name="sube_id" value="<?php echo $subecek['sube_id']?>">


                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Mail <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="sube_mail" value="<?php echo $subecek['sube_mail']?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Şifre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="first-name" required="required" name="sube_pass" value="<?php echo $subecek['sube_pass']?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Ad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="sube_adi" value="<?php echo $subecek['sube_adi']?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Alan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="sube_adres" value="<?php echo $subecek['sube_adres']?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Alan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="sube_alankap" value="<?php echo $subecek['sube_alankap']?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="subeduzenle" class="btn btn-primary" href="subeler.php">Kaydet</button>
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
      