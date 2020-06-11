<?php 
include 'header.php';
include '../veritabanii/baglan.php';

$personelsor=$db->prepare("select * from personel");
$personelsor->execute();
$depsor=$db->prepare("select * from departman");
$depsor->execute();


?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Kayıt İşlemleri</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kayıt Ekle <small>
                    <?php 

                    if (@$_GET['durum']=='ok') {?>


                    <b style="color:green">Güncelleme başarılı...</b>

                    <?php }elseif (@$_GET['durum']=='no'){?>

                      <b style="color:red">Güncelleme yapılamadı...</b>

                   
                    <?php } ?> </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                   
                      </li>
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <form action="../veritabanii/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Ziyaretçi Adı ve Soyadı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="adsoyad"placeholder=" Ziyaretçinin adını ve soyadını giriniz..."class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Araç Plaka<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="plaka"placeholder="Lütfen arac plakasını giriniz..."class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12">Personel</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="gelpers">
                          <option>Personel Seçiniz.</option>
                          <?php 

while($personelcek=$personelsor->fetch(PDO::FETCH_ASSOC)) {?>
                            
                            <option><?php echo $personelcek['prsn_adsoyad'] ?></option>
                            <?php  }
 
?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12">Departman</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          <select class="form-control" name="geldepart">
                          <option>Departman Seçiniz.</option>
                          <?php 

while($depcek=$depsor->fetch(PDO::FETCH_ASSOC)) {?>
                            
                            <option><?php echo $depcek['depart_ad'] ?></option>
                            <?php  }
 
?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Not(Amac)<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="amac"placeholder="Ziyaret sebebini belirtiniz..."class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                     
                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="kayitolustur" class="btn btn-primary">Kaydet</button>
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
      