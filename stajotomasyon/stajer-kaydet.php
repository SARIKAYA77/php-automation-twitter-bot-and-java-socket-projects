<?php


if (isset($_POST["gonder"])) {

	$_POST=array_map("trim",$_POST);

	include ("islemler.php");
	$stajer= new Stajer();
	$hedef_dir = "foto/";
	$hedef_dosya = $hedef_dir . basename($_FILES["stj_foto"]["name"]);
	$dosyaUzanti = strtolower(pathinfo($hedef_dosya,PATHINFO_EXTENSION));
	$hedef_isim=$hedef_dir.$_POST["stj_tc"].".".$dosyaUzanti;

	if ($dosyaUzanti=="jpg" || $dosyaUzanti=="png") {
			move_uploaded_file($_FILES["stj_foto"]["tmp_name"], $hedef_isim);
			$icerik=array();
			$icerik["stj_foto"]=$hedef_isim;
			$icerik["stj_ad"]=$_POST["stj_ad"];
			$icerik["stj_soyad"]=$_POST["stj_soyad"];
			$icerik["stj_tc"]=$_POST["stj_tc"];
			$icerik["stj_dogum"]=$_POST["stj_dogum"];
			$icerik["stj_sehir"]=$_POST["stj_sehir"];
			$icerik["stj_cep"]=$_POST["stj_cep"];
			$icerik["stj_email"]=$_POST["stj_email"];
			if ($_POST["stj_proje_konu"]=="")
			$icerik["stj_proje_konu"]=null;	
			else
			$icerik["stj_proje_konu"]=$_POST["stj_proje_konu"];
			if ($_POST["stj_proje_icerik"]=="")
			$icerik["stj_proje_icerik"]=null;		
			else
			$icerik["stj_proje_icerik"]=$_POST["stj_proje_icerik"];	
			$icerik["stj_baslama"]=$_POST["stj_baslama"];
			$icerik["stj_bitis"]=$_POST["stj_bitis"];
			$icerik["departman_id"]=$_POST["departman_id"];
			$icerik["universite_id"]=$_POST["universite_id"];
			$icerik["bolum_id"]=$_POST["bolum_id"];

			$kontrol=$stajer->stajerEkle($icerik,$baglan);

			if ($kontrol) {
				$id=$stajer->stajerIDGetir($icerik["stj_tc"],$baglan);

				header("Location:stajer-detay.php?id=".$id["ID"]);
			}

			else
				echo "hata";
		


	}

	else {

		alert("hata");
	}


}




?>