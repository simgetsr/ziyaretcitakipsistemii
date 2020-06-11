<?php include 'header.php';
include '../veritabani/baglan.php'; ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Şubeler</h3>
              </div>

            
                    <div align="right" class="col-md-11">
                    <a href="subeekle.php"><button style="Width:150px; height:30px; " class="btn btn-success btn-xs"><i class=" fa fa-plus" hidden="true"></i>Yeni Ekle</button></a>
                    </div>


                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Şube Mail</th>
                  <th>Şube Şifre</th>
                  <th>Şube Adı</th>
                  <th>Şube Adresi</th>
                  <th>Alan Kapasitesi</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
 
              <tbody>
 
                <?php 

                  $subesor=$db->prepare("SELECT * from sube");
                  $kontrol=$subesor->execute(

                  );
             
                  $say=1;
 
                while($subecek=$subesor->fetch(PDO::FETCH_ASSOC)){
                  
                        ?>
 
                <tr>
                  <td width="20"><?php echo $say++ ?></td>
                  <td><?php echo $subecek['sube_mail'] ?></td>
                  <td><?php echo $subecek['sube_pass'] ?></td>
                  <td><?php echo $subecek['sube_adi'] ?></td>
                  <td><?php echo $subecek['sube_adres'] ?></td>
                  <td><?php echo $subecek['sube_alankap'] ?></td>
                  <td><center><a href="subeduzenle.php?sube_id=<?php echo $subecek['sube_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../veritabani/islem.php?sube_id=<?php echo $subecek['sube_id']; ?>&subesil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                  
                
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
      