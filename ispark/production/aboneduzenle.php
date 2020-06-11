<?php 
include 'header.php';
include '../veritabani3/baglan.php';

$abonesor=$db->prepare("SELECT * from abone where abone_id=:id");
$abonesor->execute(array(
    'id' => $_GET['abone_id']
));
$abonecek=$abonesor->fetch(PDO::FETCH_ASSOC);


?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Abone İşlemleri</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <div align="left" class="col-md-6">
                    <h2>Güncelle
                    <?php 

if (@$_GET['durum']=='ok') {?>


<b style="color:green"> İşlem Başarılı...</b>

<?php }elseif (@$_GET['durum']=='no'){?>

  <b style="color:red"> İşlem Yapılamadı...</b>


<?php } ?> </small>
                    </h2>
                    </div>
                    <div align="right" class="col-md-6">
                    <a href="aboneler.php"><button style="Width:150px; height:30px; " class="btn btn-warning btn-xs"><i class=" fa fa-undo" hidden="true"></i>Geri Dön</button></a>
                    </div>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <form action="../veritabani3/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  
                        <input type="hidden" name="abone_id" value="<?php echo $abonecek['abone_id']?>">
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Abone Adı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="abone_adi" value="<?php echo $abonecek['abone_adi']?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Abone Soyadı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="abone_soyadi" value="<?php echo $abonecek['abone_soyadi']?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Plaka <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="abone_plaka" value="<?php echo $abonecek['abone_plaka']?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Bitiş Tarihi <span class="date">*</span>
						              </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
            				    <input type="date" name="abone_baslamatarih" value="<?php echo $abonecek['abone_baslamatarih']?>" min="2010-01-02"><br>
					                </div>
					              </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Bitiş Tarihi <span class="date">*</span>
						              </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
            				    <input type="date" name="abone_bitistarih" value="<?php echo $abonecek['abone_bitistarih']?>" min="2010-01-02"><br>
					                </div>
					              </div>
                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="aboneguncelle" class="btn btn-primary" href="kayitlar.php">Kaydet</button>
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
      