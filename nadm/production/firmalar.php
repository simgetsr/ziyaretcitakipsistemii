<?php include 'header.php';
include '../veritabani/baglan.php'; ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Firmalar</h3>
              </div>

            
                    <div align="right" class="col-md-11">
                    <a href="firmaekle.php"><button style="Width:150px; height:30px; " class="btn btn-success btn-xs"><i class=" fa fa-plus" hidden="true"></i>Yeni Ekle</button></a>
                    </div>


                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Mail adresi</th>
                  <th>Şifre </th>
                  <th>Ad</th>
                  <th>Alan Kapasitesi</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
 
              <tbody>
 
                <?php 

                  $kasor=$db->prepare("SELECT * from firma");
                  $kontrol=$kasor->execute(

                  );
             
                  $say=1;
 
                while($kacek=$kasor->fetch(PDO::FETCH_ASSOC)){
                  
                        ?>
 
                <tr>
                  <td width="20"><?php echo $say++ ?></td>
                  <td><?php echo $kacek['firma_mail'] ?></td>
                  <td><?php echo $kacek['firma_pass'] ?></td>
                  <td><?php echo $kacek['firma_ad'] ?></td>
                  <td><?php echo $kacek['firma_alan'] ?></td>
                  <td><center><a href="firmaduzenle.php?firma_id=<?php echo $kacek['firma_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../veritabani/islem.php?firma_id=<?php echo $kacek['firma_id']; ?>&firmasil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                  
                
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
          </div>
        </div>
        <!-- /page content -->

       <?php include 'footer.php'; ?>
      