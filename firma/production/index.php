<?php 
include 'header.php';
include '../veritabani2/baglan.php';
?>
      <!-- page content -->
      <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3></h3>
              </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <div align="left" class="col-md-6">
                    <h2>Tüm Kayıtlar<small>
                    <?php 
            
                    

if (@$_GET['durum']=='ok') {?>


<b style="color:green"> İşlem Başarılı...</b>

<?php }elseif (@$_GET['durum']=='no'){?>

  <b style="color:red"> İşlem Yapılamadı...</b>


<?php } ?> </small>
                    </h2>
                    </div>
                    <div align="right" class="col-md-6">
                 
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
                            <th class="column-title""text-center">Tarih</th>
                            <th class="column-title""text-center">Ad ve Soyad</th>
                            <th class="column-title""text-center">Plaka</th> 
                            <th class="column-title""text-center">Gelinen Personel</th>
                            <th class="column-title""text-center">Gelinen Departman</th>
                            <th class="column-title""text-center">Amaç</th>

                          
                           
                          </tr>
                        </thead>

                        <tbody>
                        <?php 

              $kasor=$db->prepare("SELECT * from kayit");
              $kontrol=$kasor->execute(

                            );

                   

            while($kacek=$kasor->fetch(PDO::FETCH_ASSOC)){

            ?>

           <tr>
                  <td width="20"><?php ?></td>
                  <td><?php echo $kacek['tarih'] ?></td>
                  <td><?php echo $kacek['adsoyad'] ?></td>
                  <td><?php echo $kacek['plaka'] ?></td>
                  <td><?php echo $kacek['gelpers'] ?></td>
                  <td><?php echo $kacek['geldepart'] ?></td>
                  <td><?php echo $kacek['amac'] ?></td>

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
      