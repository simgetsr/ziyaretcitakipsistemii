<?php 
include 'header.php';
include '../veritabani/baglan.php';

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
                    <h2>Firma Ekle <small>
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

                  <form action="../veritabani/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  
                  <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Mail<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="firma_mail"placeholder="Firma mail adresini giriniz..."class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Şifre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="first-name" required="required" name="firma_pass"placeholder="Şifre giriniz..."class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Firma Ad<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="firma_ad"placeholder="Firma adını giriniz..."class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Alan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="firma_alan"placeholder="Alan kapasitesini belirtin..."class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="firmakaydet" class="btn btn-primary">Kaydet</button>
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
      