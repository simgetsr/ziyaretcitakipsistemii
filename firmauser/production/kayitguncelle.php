<?php 
include 'header.php';
include '../veritabanii/baglan.php';

$depsor=$db->prepare("select * from departman");
$depsor->execute();
$kayitsor=$db->prepare("SELECT * from kayit where kayit_id=:id");
$kayitsor->execute(array(
    'id' => $_GET['kayit_id']
));
$kayitcek=$kayitsor->fetch(PDO::FETCH_ASSOC);

$kartsor=$db->prepare("select * from kart");
$kartsor->execute();

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kayıt İşlemleri</h3>
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
                    <a href="kayitlar.php"><button style="Width:150px; height:30px; " class="btn btn-warning btn-xs"><i class=" fa fa-undo" hidden="true"></i>Geri Dön</button></a>
                    </div>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <form action="../veritabanii/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  
                        <input type="hidden" name="kayit_id" value="<?php echo $kayitcek['kayit_id']?>">
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Ziyaretçi Adıve Soyadı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="adsoyad" value="<?php echo $kayitcek['adsoyad']?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Plaka <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="plaka" value="<?php echo $kayitcek['plaka']?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Gelinen Personel <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="gelpers" value="<?php echo $kayitcek['gelpers']?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    
                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12">Departman</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          <select class="form-control" name="geldepart">
                          <option> <?php echo $kayitcek['geldepart']?> </option>
                          <?php 

while($depcek=$depsor->fetch(PDO::FETCH_ASSOC)) {?>
                            
                            <option> <?php echo $depcek['depart_ad']?> </option>
                            <?php  }
 
?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Amaç <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="amac" value="<?php echo $kayitcek['amac']?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12">Kart No</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          <select class="form-control" name="kart_ad">
                          <option>Kart Seçiniz.</option>
                          <?php 

while($kartcek=$kartsor->fetch(PDO::FETCH_ASSOC)) {?>
                            
                            <option><?php echo $kartcek['kart_ad'] ?></option>
                            <?php  }
 
?>
                          </select>
                        </div>
                      </div>
                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="kayitguncelle" class="btn btn-primary" href="kayitlar.php">Kaydet</button>
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
      