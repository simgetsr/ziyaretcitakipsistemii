<?php include 'header.php';
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
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <div align="left" class="col-md-6">
                    <h2>Aboneler <small>
                    <?php 
                 
                    

if (@$_GET['durum']=='ok') {?>


<b style="color:green"> İşlem Başarılı...</b>

<?php }elseif (@$_GET['durum']=='no'){?>

  <b style="color:red"> İşlem Yapılamadı...</b>


<?php } ?> </small>
                    </h2>
                    </div>
                    <div align="right" class="col-md-6">
                    <a href="aboneekle.php"><button style="Width:150px; height:30px; " class="btn btn-success btn-xs"><i class=" fa fa-plus" hidden="true"></i>Yeni Ekle</button></a>
                    <a href="aboneler.php"><button style="Width:150px; height:30px; " class="btn btn- btn-xs"><i class=" fa fa-search" hidden="true"></i>Abone Sor</button></a>
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
                            <th class="column-title""text-center">Ad </th>
                            <th class="column-title""text-center">Soyad </th>
                            <th class="column-title""text-center">Plaka</th>
                            <th class="column-title""text-center">Baslangıç Tarihi</th>
                            <th class="column-title""text-center">Bitiş Tarihi</th>
                           
                     
                            <th width="80" class="column-title"> </th>
                            <th width="80" class="column-title"> </th>
                           
                          </tr>
                        </thead>

                        <tbody>

                        <?php
                           
                           $abonesor=$db->prepare("SELECT * from abone");
                           $kontrol=$abonesor->execute(

                            );


                        while($abonecek=$abonesor->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                          <tr>
                            <td class="a-center ">
                              
                            </td>
                            
                            <td class="text-center"><b><?php echo $abonecek['abone_adi']?></b></td>
                            <td class="text-center"><b><?php echo $abonecek['abone_soyadi']?></b></td>
                            <td class="text-center"><b><?php echo $abonecek['abone_plaka']?></b></td>
                            <td class="text-center"><b><?php echo $abonecek['abone_baslamatarih']?></b></td>
                            <td class="text-center"><b><?php echo $abonecek['abone_bitistarih']?></b></td>
                          
                           
            
                            <td class="text-center"><a href="aboneduzenle.php?abone_id=<?php echo $abonecek['abone_id']?>"><button style="width:80px;" class="btn btn-primary btn-xs"> <i class=" fa fa-pencil" hidden="true"></i>Düzenle</button></td>

                            <td class="text-center"><a href="../veritabani3/islem.php?abonesil=ok&abone_id=<?php echo $abonecek['abone_id']?>"><button style="width:80px;" class="btn btn-danger btn-xs"><i class=" fa fa-trash" hidden="true"></i>Sil</button></a> </td>
                           
                            </td>
                          </tr>

                        <?php  }  ?>
                        
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
      