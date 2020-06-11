<?php 
include 'header.php';
include '../veritabani2/baglan.php';


$kartsor=$db->prepare("SELECT * from kart where kart_id=:id");
$kartsor->execute(array(
    'id' => $_GET['kart_id']
));
$kartcek=$kartsor->fetch(PDO::FETCH_ASSOC);

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kart İşlemleri</h3>
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
                    <a href="kartlar.php"><button style="Width:150px; height:30px; " class="btn btn-warning btn-xs"><i class=" fa fa-undo" hidden="true"></i>Geri Dön</button></a>
                    </div>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <form action="../veritabani2/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  
                        <input type="hidden" name="kart_id" value="<?php echo $kartcek['kart_id']?>">


                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Kart Numarası <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="kart_no" value="<?php echo $kartcek['kart_no']?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="first-name">Adı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="kart_ad" value="<?php echo $kartcek['kart_ad']?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="kartduzenle" class="btn btn-primary" href="kartlar.php">Kaydet</button>
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
      