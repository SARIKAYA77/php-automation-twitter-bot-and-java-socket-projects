
<?php include("islemler.php") ?>
<?php if(!isset($_SESSION["user"])){ header('location:yonetici-giris.php'); } ?>
<?php
  $universite=new Universite();
  $uniGetir=$universite->uniAdGetir($baglan);

 ?>

<?php 
  if (isset($_POST["uniAd"])) {
    $_POST=array_map("trim",$_POST);
    $_POST=array_map("strip_tags",$_POST);
    if ($_POST['uniDetay']!="" || isset($_POST['uniDetay'])) {$uniDetay=$baglan->real_escape_string($_POST['uniDetay']);}

    else { $uniDetay=null;}
    
    if ($_POST["uniAd"]!="") {

        $UniAd=$baglan->real_escape_string($_POST['uniAd']);
        $kayit_sayisi=$universite->uniEkle($UniAd,$uniDetay,$baglan);

      if ($kayit_sayisi>0)
         echo '<script type="text/javascript">alert("Başarılı Bir Şekilde Eklendi."); </script>';

      else 
        echo '<script type="text/javascript">alert("Hata Oluştu!"); </script>';
    } 

    else {
       echo '<script type="text/javascript">alert("Üniversite Adı Boş!"); </script>';
    }
  }

?>



  <?php if(isset($_POST['bolumAd'])) {
    $_POST=array_map("trim",$_POST);
    $_POST=array_map("strip_tags",$_POST);

    $universiteID=$universite->uniIDGetir($baglan->real_escape_string($_POST['universiteAdlari']),$baglan);

    if ($universiteID!=0 && $_POST['bolumAd']!="") {

      if ($_POST["bolum_detay"]!="") {$bolum_detay=$baglan->real_escape_string($_POST['bolum_detay']);}
      else {$bolum_detay=null;}

      $bolumAd=$baglan->real_escape_string($_POST['bolumAd']);
      $kayit_sayisi=$universite->bolumEkle($bolumAd,$bolum_detay,$universiteID,$baglan);

      if ($kayit_sayisi>0) { echo '<script type="text/javascript">alert("Başarılı Bir Şekilde Eklendi."); </script>';}
      else { echo '<script type="text/javascript">alert("Hata Oluştu!"); </script>';}


    }

  else {

    echo '<script type="text/javascript">alert("Bölüm Adı Boş Bırakılamaz!"); </script>';
  }





  }




  ?>




<?php include("header.php") ?>
    <!-- Main Content -->
    <div class="container-fluid">

       <div class="side-body">
        <h1> Üniversite ve Bölüm Ekleme Sayfası </h1>
            
            <div class="row">
              <div class="col-md-12">
                <div class="well">


                      <div class="panel panel-primary">
                        <div class="panel-heading">Üniversite Ekle</div>
                        <div class="panel-body">
                      
                                  <form action="universite-ekle.php" method="POST">
                                    <div class="form-group">
                                      <label class="control-label col-sm-12">Üniversite Adı:</label>
                                      <div class="col-sm-12">
                                        <input type="text" class="form-control" id="unAd" name="uniAd" placeholder="Örn: Karabük Üniversitesi" required>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label style="margin-top:10px;" class="control-label col-sm-12">Üniversite Hakkında Bilgi:</label>
                                      <div class="col-sm-12">
                                          <textarea name="uniDetay" class="form-control" rows="5" placeholder="Üniversite Hakkında Bilgi Ekleyebilirsiniz veya Boş Bırakabilirsiniz"></textarea>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                     
                                      <div class="col-sm-12">
                                          <input class="col-md-12 btn btn-primary" style="margin-top:10px;" type="submit" value="Ekle" />
                                      </div>
                                    </div>
                                   
                                  </form>
                        </div>
                      </div>
                  
                </div>

                 <div class="well">


                      <div class="panel panel-info">
                        <div class="panel-heading">Bölüm Ekle</div>
                        <div class="panel-body">
                      
                                  <form action="universite-ekle.php" method="POST">

                                       <div class="form-group">
                                            <label>Üniversite Seçiniz:</label>
                                            <select class="form-control" name="universiteAdlari">
                                            <?php foreach ($uniGetir as $key) { ?>
                                      
                                            <option value="<?php echo $key["ID"];?>"><?php echo $key["universite_ad"]; ?></option> 
                                             <?php }?> 
                                            </select>
                                      </div>


                                    <div class="form-group">
                                      <label class="control-label col-sm-12">Bölüm Adı:</label>
                                      <div class="col-sm-12">
                                        <input type="text" class="form-control"  name="bolumAd" placeholder="Örn: Bilgisayar Mühendisliği" required>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label style="margin-top:10px;" class="control-label col-sm-12">Bölüm Hakkında Bilgi:</label>
                                      <div class="col-sm-12">
                                          <textarea name="bolum_detay" class="form-control" rows="5" placeholder="Bölüm Hakkında Bilgi Ekleyebilirsiniz veya Boş Bırakabilirsiniz"></textarea>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                     
                                      <div class="col-sm-12">
                                          <input class="col-md-12 btn btn-info" style="margin-top:10px;" type="submit" value="Ekle" />
                                      </div>
                                    </div>
                                   
                                  </form>
                        </div>
                      </div>
                  
                </div>


              </div>
             
          </div>
       </div>
       
         
 

    </div>
       

	
	

</body>
</html>

<?php unset($uniGetir); $baglan->close(); ?>