<?php include 'header.php';
 include '../veritabani2/baglan.php';

?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
        
              </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <div align="left" class="col-md-6">
                    <h2>Departmanlar<small>
                    <?php 
             
                    

if (@$_GET['durum']=='ok') {?>


<b style="color:green"> İşlem Başarılı...</b>

<?php }elseif (@$_GET['durum']=='no'){?>

  <b style="color:red"> İşlem Yapılamadı...</b>


<?php } ?> </small>
                    </h2>
                    </div>
                    <div align="right" class="col-md-6">
                    <a href="depart-ekle.php"><button style="Width:150px; height:30px; " class="btn btn-success btn-xs"><i class=" fa fa-plus" hidden="true"></i>Yeni Ekle</button></a>
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
                            <th class="column-title""text-center">Departman Adı</th>
                       

                            <th width="80" class="column-title"> </th>
                            <th width="80" class="column-title"> </th>
                           
                          </tr>
                        </thead>

                        <tbody>
                        <?php 

              $depsor=$db->prepare("SELECT * from departman");
              $kontrol=$depsor->execute(

                            );

                   

            while($depcek=$depsor->fetch(PDO::FETCH_ASSOC)){

            ?>

           <tr>
              <td width="20"><?php ?></td>
              <td><?php echo $depcek['depart_ad'] ?></td>

              <td class="text-center"><a href="../veritabani2/islem.php?departsil=ok&departman_id=<?php echo $depcek['departman_id']?>"><button style="width:80px;" class="btn btn-danger btn-xs"><i class=" fa fa-trash" hidden="true"></i>Sil</button></a> </td>

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
      