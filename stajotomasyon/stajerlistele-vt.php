<?php
	
	if (isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

		include ("islemler.php");
		$stajer=new Stajer();
		$baslangic=0;
		$sayfa=0;
		$sayfa_sayisi=10;
		$toplam_kayit=$stajer->stajerKayitSayisiGetir($baglan);
		$sayfalar=ceil($toplam_kayit/$sayfa_sayisi);

		if (isset($_POST["sayfa"])) {
			if (is_numeric($_POST["sayfa"]) && $_POST["sayfa"]<$sayfalar) {
					$sayfa=$_POST["sayfa"];
					$baslangic=$sayfa*$sayfa_sayisi;	
			}
		}


		
		$stajerListe=$stajer->stajerTabloGetir($baslangic,$sayfa_sayisi,$baglan);
		$baglan->close(); 
	 
		echo '<div class="row"><div class="col-md-12" style="margin-bottom:10px;"><button id="secim" class="btn btn-info">Tümünü Seç/Kaldır</button> <button id="secimSil" class="btn btn-danger">Seçilenleri Sil</button> </div> </div> <div class="row"> <div class="col-md-12">'; 
		echo '<table class="table table-bordered table-vcenter" style="width:100%">
                <thead>
                  <tr>
                    <th class="text-center" style="width:1%" >Seç</th>
                    <th class="text-center">Resim</th>
                    <th class="text-center">Adı Soyadı</th>
                    <th class="text-center">T.C. Kimlik No</th>
                    <th class="text-center">Staj Başlama Tarihi</th>
                    <th class="text-center">Staj Bitiş Tarihi</th>
                    <th class="text-center">Detay</th>
                  </tr>
                </thead>
                <tbody>';
                for ($i=0;$i<count($stajerListe);$i++) {

                		echo '
                		<tr class="text-center">
                    		<td><input type="checkbox" class="secici" value="'.$stajerListe[$i]['ID'].'"></td>      
                    		<td> <img src="'.$stajerListe[$i]['stj_foto'].'" class="img-circle"  width="64" height="64"></td>
                    		<td>'.$stajerListe[$i]['stj_ad'].' '.$stajerListe[$i]['stj_soyad'].'</td>
                    		<td>'.$stajerListe[$i]['stj_tc'].'</td>
                    		<td>'.$stajerListe[$i]['stj_baslama'].'</td>
                    		<td>'.$stajerListe[$i]['stj_bitis'].'</td>
                    		<td><a href="stajer-detay.php?id='.$stajerListe[$i]['ID'].'" type="button" class="btn btn-info"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a></td>
                  		</tr>';
 

                }
                  
              	
          echo '</tbody> </table> </div> </div> <div class="col-md-12" style="margin-top:-25px;">';
	      echo sayfalama($sayfa,$sayfalar);
	      echo  '</div>';  	

		
	
}


function sayfalama ($sayfa,$sayfalar) {

	if ($sayfa==0) {

		$sayfa_bicimi='<ul class="pagination"><li><a>1/'.$sayfalar.'</a></li>
        		   <li><a href="#" data-page="1">İleri</a></li></ul>';

	}

	else {

		 $sayfa_bicimi='<ul class="pagination"><li><a href="#" date-page="?'.($sayfa-1).'">Geri</a></li>
             <li><a>'.($sayfa+1).'/'.$sayfalar.'</a></li>
             <li><a href="#" data-page="'.($sayfa+1).'">İleri</a></li></ul>';
	}

	return $sayfa_bicimi;

}

unset($stajerListe);

?>

