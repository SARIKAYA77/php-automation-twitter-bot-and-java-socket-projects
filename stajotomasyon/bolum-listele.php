
<?php include("islemler.php") ?>

<?php
	$bolum=new Universite();
	$baslangic=0;
	$sayfa_sayisi=10;
	$toplam_kayit=$bolum->bolumKayitSayisiGetir($baglan);
	$sayfalar=ceil($toplam_kayit/$sayfa_sayisi);
	if (isset($_GET["sayfa"])) {

		if (is_numeric($_GET["sayfa"]) && $_GET["sayfa"]<$sayfalar) {

			$baslangic=$_GET["sayfa"]*$sayfa_sayisi;	
		}

		else {

			header('Location:bolum-listele.php');
		}
	}

	$bolumListele=$bolum->bolumGetir($baslangic,$sayfa_sayisi,$baglan);
?>



<?php 
  
  if (isset($_POST['id'])) {

    $bolumSil=$_POST['id'];
    $bolumSilBoyut=count($bolumSil);
    for ($i=0;$i<$bolumSilBoyut;$i++) {
    $bolum->bolumSil($bolumSil[$i],$baglan);
    }
    unset($bolumSil);
    sleep(3);
    header('location:bolum-listele.php');
  }

  


?>


	







<?php include ("header.php") ?>

 <!-- Main Content -->
    <div class="container-fluid">

        <div class="side-body">
           <h1> Kayıtlı Bölümler </h1>
           <pre> Soldaki menüden işlemler yapabilirsiniz. </pre>
           <form action="bolum-listele.php" method="post" onsubmit="return sil()">
           <div class="row">



               <div class="col-md-12" style="margin-bottom:10px;"> <a href="javascript:void(0)" type="text" onclick="sec()" id="secim" class="btn btn-info">Tümünü Seç</a>
                <input type="submit" value="Seçilenleri Sil" class="btn btn-danger" /> </div>
           </div>
           <div class="row">
               <div class="col-md-12">
                   
                    <table class="table table-bordered table-vcenter" style="width:100%">
                <thead>
                  <tr>
                    <th class="text-center" style="width:1%" >Seç</th>
                    <th class="text-center">Bölüm Adı</th>
                    <th class="text-center">Bölüm Açıklama</th>
                    <th class="text-center">Üniversite Adı</th>
                    
                   
                  </tr>
                </thead>
                <tbody>
                <?php for ($i=0;$i<count($bolumListele);$i++) { ?>	
                  <tr class="text-center">
                    <td><input type="checkbox" name="id[]" value="<?php echo $bolumListele[$i]['ID'];?>"></td>
                    <td><?php echo $bolumListele[$i]['bolum_ad'];	?></td>
                    <td><?php echo $bolumListele[$i]['bolum_aciklama'];	?></td>
                    <td><?php echo $bolumListele[$i]['universite_ad'];  ?></td>
                  </tr>
              	<?php } ?>
                </tbody>
            </table>


               </div>
           </div>
            </form>

                <div class="col-md-12" style="margin-top:-25px;">
                     <ul class="pagination">
                     	<?php if(isset($_GET["sayfa"]) && $_GET["sayfa"]!=0) { ?>		
                          <li><a href="?sayfa=<?php echo $_GET["sayfa"]-1; ?>">Geri</a></li>
                       	  <li><a><?php echo $_GET["sayfa"]+1; ?>/<?php echo $sayfalar;	?></a></li>
                          <li><a href="?sayfa=<?php echo $_GET["sayfa"]+1; ?>">İleri</a></li>
                         <?php } else { ?>
                          <li><a>1/<?php echo $sayfalar;?></a></li>
                          <li><a href="?sayfa=1">İleri</a></li>
                          <?php } ?>
                         
                    </ul>
                </div>
           
        </div>
 

</div>
       
<script type="text/javascript">
  
  var kutu=document.getElementsByName('id[]');
  var k_sayac=kutu.length;
  var kontrol=true;
  function sec() {
    
    for (var i=0;i<=k_sayac-1;i++) {
        if (kontrol) kutu[i].checked=true;
        else kutu[i].checked=false;
        
    }

     if (kontrol) {

        kontrol=false;
        document.getElementById("secim").innerHTML="Tümünü Kaldır";
    }   
     else {
          kontrol=true;
          document.getElementById("secim").innerHTML="Tümünü Seç";
     }
      
  }

  function sil() {
    var sayac=0;
    for (var i=0;i<=k_sayac-1;i++) {

        if (kutu[i].checked) sayac++;
    }

    if (sayac>0) {

        var secim_kontrol=confirm(sayac+" tane içerik silinsin mi ?");

        if (secim_kontrol) return true;
        else return false;



    }

    else {
        alert("Seçim Yapılmadı!")
        return false;
    }



  }

</script>

	
	
	<script src="js/jquery-2.2.3.js"</script>
	<script src="js/bootstrap.js"</script>
</body>
</html>


<?php unset($bolumListele); $baglan->close(); ?>