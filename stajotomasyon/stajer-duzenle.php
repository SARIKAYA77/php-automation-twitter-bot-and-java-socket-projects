<?php
	if (isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

	include ("islemler.php");

	$stajer=new Stajer();

			$icerik=array();
			$icerik["ID"]=$_POST["ID"];
			$icerik["stj_ad"]=$_POST["stj_ad"];
			$icerik["stj_soyad"]=$_POST["stj_soyad"];
			$icerik["stj_tc"]=$_POST["stj_tc"];
			$icerik["stj_dogum"]=$_POST["stj_dogum"];
			$icerik["stj_sehir"]=$_POST["stj_sehir"];
			$icerik["stj_cep"]=$_POST["stj_cep"];
			$icerik["stj_email"]=$_POST["stj_email"];
			$icerik["stj_proje_konu"]=$_POST["stj_proje_konu"];
			$icerik["stj_proje_icerik"]=$_POST["stj_proje_icerik"];	
			$icerik["stj_baslama"]=$_POST["stj_baslama"];
			$icerik["stj_bitis"]=$_POST["stj_bitis"];
			$icerik["departman_id"]=$_POST["departman_id"];
			$icerik["universite_id"]=$_POST["universite_id"];
			$icerik["bolum_id"]=$_POST["bolum_id"];

	
	$sonuc=$stajer->stajerDuzenle($icerik,$baglan);
	unset($icerik);
	$baglan->close();

	if ($sonuc==0 || $sonuc==1) 

		echo "basarili";

	else
		echo "hata";
		
		
	
	
}
?>