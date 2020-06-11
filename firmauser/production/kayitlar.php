<?php include 'header.php';
include '../veritabanii/baglan.php'; 

$kulsor=$db->prepare("select * from kullanici where firma_id=?");
  $kulsor->execute(array($_SESSION['firma_id']));

  ?>
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kayitlar</h3>
              </div>

            
                    <div align="right" class="col-md-11">
                    <a href="kayitekle.php"><button style="Width:150px; height:30px; "class="btn btn-success btn-xs"><i class=" fa fa-plus" hidden="true"></i>Yeni Ekle</button></a>
                    </div>


                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Tarih</th>
                  <th>Ziyaretçi Adı ve Soyadı</th>
                  <th>Plaka</th>
                  <th>Gelinen Personel</th>
                  <th>Gelinen Departman</th>
                  <th>Amaç</th>
                  <th>Kart Adı</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
 
              <tbody>
 
                <?php 

                  $kayitsor=$db->prepare("SELECT * from kayit");
                  $kontrol=$kayitsor->execute(

                  );
             
                  $say=1;
 
                while($kayitcek=$kayitsor->fetch(PDO::FETCH_ASSOC)){
                  
                        ?>
 
                <tr>
                  <td width="20"><?php echo $say++ ?></td>
                  <td><?php echo $kayitcek['tarih'] ?></td>
                  <td><?php echo $kayitcek['adsoyad'] ?></td>
                  <td><?php echo $kayitcek['plaka'] ?></td>
                  <td><?php echo $kayitcek['gelpers'] ?></td>
                  <td><?php echo $kayitcek['geldepart'] ?></td>
                  <td><?php echo $kayitcek['amac'] ?></td>
                  <td><?php echo $kayitcek['kart_ad'] ?></td>
                  <td><center><a href="kayitguncelle.php?kayit_id=<?php echo $kayitcek['kayit_id']; ?>"><button class="btn btn-primary btn-xs"><i class=" fa fa-pencil" hidden="true"></i>Güncelle</button></a></center></td>
                  <td><center><a href="kayitkapat.php?kayit_id=<?php echo $kayitcek['kayit_id']; ?>"><button class="btn btn-danger btn-xs"><i class=" fa fa-times" hidden="true"></i>Kaydı Kapat</button></a></center></td>
                  

                
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
      