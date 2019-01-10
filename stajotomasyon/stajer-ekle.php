
<?php include("islemler.php") ?>


<?php include("header.php") ?>
    <!-- Main Content -->
    <div class="container-fluid">

       <div class="side-body">
        <h1> Stajer Ekleme Sayfası </h1>
            
            <div class="row">
              <div class="col-md-12">
                <div class="well">


                      <div class="panel panel-primary">
                        <div class="panel-heading">Stajer Ekle</div>
                        <div class="panel-body">
                      
                                  
                                    <form action="stajer-kaydet.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                      <label class="control-label col-sm-12">Adı:</label>
                                      <div class="col-sm-12">
                                        <input type="text" class="form-control" name="stj_ad" required>
                                      </div>
                                    </div>

                                     <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Soyadı:</label>
                                      <div class="col-sm-12">
                                        <input type="text" class="form-control" name="stj_soyad" required>
                                      </div>
                                    </div>

                                     <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">TC Kimlik No:</label>
                                      <div class="col-sm-12">
                                        <input type="text" class="form-control" name="stj_tc" required>
                                      </div>
                                    </div>

                                        <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Doğum Tarihi:</label>
                                      <div class="col-sm-12">
                                        <input type="date" class="form-control" name="stj_dogum" required>
                                      </div>
                                    </div>

                                        <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Yaşadığı Şehir:</label>
                                      <div class="col-sm-12">
                                        <input type="text" class="form-control" name="stj_sehir" required>
                                      </div>
                                    </div>


                                        <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Cep Tel No:</label>
                                      <div class="col-sm-12">
                                        <input type="text" class="form-control" name="stj_cep" required>
                                      </div>
                                    </div>


                                       <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Email:</label>
                                      <div class="col-sm-12">
                                        <input type="email" class="form-control" name="stj_email" required>
                                      </div>
                                    </div>

                                       <div class="form-group">
                                      <label style="margin-top:15px;" class="control-label col-sm-12 ust-bosluk">Üniversite:</label>
                                      <div class="col-sm-12">
                                        <select class="form-control" id="universite_ID" name="universite_id" >
                                         
                                        </select>
                                      </div>
                                    </div>

                                     <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Bölüm:</label>
                                      <div class="col-sm-12">
                                        <select class="form-control" id="bolum_ID" name="bolum_id">
                                       
                                        </select>
                                      </div>
                                    </div>

                                        <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Departman:</label>
                                      <div class="col-sm-12">
                                        <select class="form-control" id="departman_ID" name="departman_id">
                                          
                                        </select>
                                      </div>
                                    </div>

                                       <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Staj Başlama Tarihi:</label>
                                      <div class="col-sm-12">
                                        <input type="date" class="form-control" name="stj_baslama" required>
                                      </div>
                                    </div>


                                       <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Staj Bitiş Tarihi:</label>
                                      <div class="col-sm-12">
                                        <input type="date" class="form-control" name="stj_bitis" required>
                                      </div>
                                    </div>





                                             <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Proje Konusu:</label>
                                      <div class="col-sm-12">
                                        <input type="text" class="form-control" name="stj_proje_konu" placeholder="Proje Konusu Yazabilir ya da Boş Bırakabilirsiniz.">
                                      </div>
                                    </div>

                                

                                    <div class="form-group">
                                      <label style="margin-top:10px;" class="control-label col-sm-12">Proje Açıklama:</label>
                                      <div class="col-sm-12">
                                          <textarea name="stj_proje_icerik" class="form-control" rows="5" placeholder="Proje Hakkında Bilgi Ekleyebilirsiniz veya Boş Bırakabilirsiniz"></textarea>
                                      </div>
                                    </div>




                                      <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Profil Fotoğrafı Yükle:</label>
                                      <div class="col-sm-12">
                                        <input type="file"  name="stj_foto" >
                                      </div>
                                    </div>


                                    <div class="form-group">
                                     
                                      <div class="col-sm-12">
                                          <input class="col-md-12 btn btn-primary" style="margin-top:10px;" type="submit" name="gonder" value="Ekle" />
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

<script type="text/javascript">
  $(document).ready(function(){
    
    $("#departman_ID").load("departman-getir.php");
    $("#universite_ID").load("universite-getir.php");
    var universite_id=$("#universite_ID option:selected").val();
    $("#bolum_ID").load("bolum-getir.php",{"id":universite_id});
  

         $('#universite_ID').on('change', function() {
          var id=$(this).val();

              $("#bolum_ID").load("bolum-getir.php",{"id":id});

        
        });
          
     

  });
</script>

<?php $baglan->close(); ?>