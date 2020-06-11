<?php 
include 'header.php';
include '../veritabani3/baglan.php';

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
                    <h2>Abone Ekle <small>
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

                  <form action="../veritabani3/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  
                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Abone Adı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="abone_adi"placeholder="Abonenin Adını Giriniz..."class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Soyad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="abone_soyadi"placeholder="Abonenin soyadını Giriniz..."class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Plaka <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="abone_plaka"placeholder="Abone aracın plakasını Giriniz..."class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Başlangıç Tarihi <span class="date">*</span>
						              </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
            				    <input type="date" name="abone_baslamatarih" min="2010-01-02"><br>
					                </div>
					              </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bitiş Tarihi <span class="date">*</span>
						              </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
            				    <input type="date" name="abone_bitistarih" min="2010-01-02"><br>
					                </div>
					              </div>
                    
                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="abonekaydet" class="btn btn-primary">Kaydet</button>
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
      