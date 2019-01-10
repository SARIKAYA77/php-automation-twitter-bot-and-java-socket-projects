
<?php include("islemler.php") ?>


<?php if(!isset($_SESSION["user"])){ header('location:yonetici-girisi.php'); } ?>

<?php include("header.php") ?>
    <!-- Main Content -->
    <div class="container-fluid">

       <div class="side-body">
        <h1> Departman Ekleme Sayfası </h1>
            
            <div class="row">
              <div class="col-md-12">
                   <div class="well">
                      <div class="panel panel-primary">
                        <div class="panel-heading">Departman Ekle</div>
                        <div id="panel" class="panel-body">
                        
             
                                    <div id="basarili" class="alert alert-success" style="display:none;"><strong>Başarılı!</strong> Departman Başarılı Bir Şekilde Eklendi.</div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-12">Departman Adı:</label>
                                      <div class="col-sm-12">
                                        <input type="text" class="form-control" id="depAdi" name="departmanAd" placeholder="Örn: Network" required>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label style="margin-top:10px;" class="control-label col-sm-12">Departman Hakkında Bilgi:</label>
                                      <div class="col-sm-12">
                                          <textarea id="depDetay" name="departmanAd"  class="form-control" rows="5" placeholder="Departman Hakkında Bilgi Ekleyebilirsiniz veya Boş Bırakabilirsiniz"></textarea>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                     
                                      <div class="col-sm-12">
                                   
                                          <button class="col-md-12 btn btn-primary" style="margin-top:10px;" id="gonder">Ekle</button>
                                      </div>
                                    </div>
   
                              
                        </div>
                      </div>
                  
                </div>

              </div>
             
          </div>
       </div>
       
    </div>
       
<script type="text/javascript">

$(document).ready(function(){
  

    $("#gonder").click(function(){

         var depAd=$.trim($("#depAdi").val());
         var depDetay=$.trim($("#depDetay").val());
         var gonder="departman_ad="+depAd+"&departman_detay="+depDetay;

         $.ajax ({

          type: "POST",
          url: "depekle-vt.php", 
          data: gonder,
          success: function (gelenVeri) {

                if (jQuery.trim(gelenVeri) == "basarili") {
                  $("#depAdi").val("");
                  $("#depDetay").val("");
                  $("#basarili").fadeIn("slow");
                  setTimeout('$("#basarili").fadeOut();',3000);

                }
                else
                  alert ("Hata Oluştu");

            }


         });
         


    });
}); 


 
  </script>
	
	
	<script src="js/jquery-2.2.3.js"</script>
	<script src="js/bootstrap.js"</script>
</body>
</html>
<?php $baglan->close(); ?>