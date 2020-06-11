<?php include 'header.php';
 include '../veritabani2/baglan.php';

?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kart İşlemleri</h3>
              </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <div align="left" class="col-md-6">
                    <h2>Kartlar<small>
                    <?php 
                 
                    

if (@$_GET['durum']=='ok') {?>


<b style="color:green"> İşlem Başarılı...</b>

<?php }elseif (@$_GET['durum']=='no'){?>

  <b style="color:red"> İşlem Yapılamadı...</b>


<?php } ?> </small>
                    </h2>
                    </div>
                    <div align="right" class="col-md-6">
                    <a href="kartekle.php"><button style="Width:150px; height:30px; " class="btn btn-success btn-xs"><i class=" fa fa-plus" hidden="true"></i>Yeni Ekle</button></a>
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
                            <th class="column-title""text-center">Kart No</th>
                            <th class="column-title""text-center">Kart Adı</th>
                           
                            <th width="80" class="column-title"> </th>
                            <th width="80" class="column-title"> </th>
                           
                          </tr>
                        </thead>

                        <tbody>
                        <?php 

              $kartsor=$db->prepare("SELECT * from kart");
              $kontrol=$kartsor->execute(

                            );

                   

            while($kartcek=$kartsor->fetch(PDO::FETCH_ASSOC)){

            ?>

           <tr>
              <td width="20"><?php ?></td>
              <td><?php echo $kartcek['kart_no'] ?></td>
              <td><?php echo $kartcek['kart_ad'] ?></td>

              <td class="text-center"><a href="kartduzenle.php?kart_id=<?php echo $kartcek['kart_id']?>"><button style="width:80px;" class="btn btn-primary btn-xs"> <i class=" fa fa-pencil" hidden="true"></i>Düzenle</button></td>

              <td class="text-center"><a href="../veritabani2/islem.php?kartsil=ok&kart_id=<?php echo $kartcek['kart_id']?>"><button style="width:80px;" class="btn btn-danger btn-xs"><i class=" fa fa-trash" hidden="true"></i>Sil</button></a> </td>

      </tr>
            <?php  }
                     ?>
                        
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
      