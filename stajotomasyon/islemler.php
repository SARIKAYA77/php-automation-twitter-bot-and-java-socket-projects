<?php
	
	
	include("baglan.php");

	class Yonetici {
		public function giris ($user,$pass,$baglan) {
			$pass=md5($pass);
			$sql="SELECT yonetici_user,yonetici_pass FROM stj_yonetici WHERE yonetici_user='{$user}' AND yonetici_pass='{$pass}'";
			$sonuc=$baglan->query($sql);
			if ($sonuc->num_rows<1) {
				$sonuc->close();
				
				return false;

			}
			else {
				
				$sonuc->close();
				 return true;
			}
		}
	}


	class Universite {

		public function uniEkle ($adi,$detay,$baglan) {

			$sql="INSERT INTO stj_universite (universite_ad, universite_detay) VALUES (?,?)";
			$sonuc=$baglan->prepare($sql);
			if ($sonuc) {
			$sonuc->bind_param("ss",$uniAdi,$uniDetay);
			$uniAdi=$adi;
			$uniDetay=$detay;
			$sonuc->execute();
			$kayit_sayisi=$sonuc->affected_rows;
			$sonuc->close();
			
			return $kayit_sayisi;
			}

			else return 0;
		}

		public function uniAdGetir ($baglan) {

			$sonuc=$baglan->query("SELECT ID,universite_ad FROM stj_universite");
			$i=0;
			$universite=array( array("ID"=>"0","universite_ad"=>"0"));
			while ($dizi=$sonuc->fetch_array(MYSQLI_ASSOC)) {

				$universite[$i]["ID"]=$dizi["ID"];
				$universite[$i]["universite_ad"]=$dizi["universite_ad"];
				$i++;
			}
			$sonuc->close();
			return $universite;
		}


		public function uniIDGetir ($universite_id,$baglan) {
			$id=0;
			$sql="SELECT ID FROM stj_universite WHERE ID='{$universite_id}'";
			$sonuc=$baglan->query($sql);
			if ($sonuc->num_rows<1)
				{return id;}
			else {

				while ($icerik=$sonuc->fetch_assoc()) {$id=$icerik["ID"];}
				return $id;
			}

		}


		public function bolumEkle ($bolumAd,$bolumDetay,$unID,$baglan) {

			$sql="INSERT INTO stj_bolum (bolum_ad, bolum_aciklama, universite_id) VALUES (?,?,?)";
			$sonuc=$baglan->prepare($sql);
			if ($sonuc) {

				$sonuc->bind_param("ssi",$bolum_ad,$bolum_detay,$universite_id);
				$bolum_ad=$bolumAd;
				$bolum_detay=$bolumDetay;
				$universite_id=$unID;
				$sonuc->execute();
				$kayit_sayisi=$sonuc->affected_rows;
				return $kayit_sayisi;

			}

			else {

				return 0;
			}

		}

		public function universiteGetir ($baslangic,$icerikSayisi,$baglan) {

			$sql="SELECT * FROM stj_universite ORDER BY universite_ad ASC LIMIT $baslangic,$icerikSayisi";
			$sonuc=$baglan->query($sql);
			$i=0;
			$universite=array(array());
			while ($dizi=$sonuc->fetch_array(MYSQLI_ASSOC)) {

				$universite[$i]["ID"]=$dizi["ID"];
				$universite[$i]["universite_ad"]=$dizi["universite_ad"];
				$universite[$i]["universite_detay"]=$dizi["universite_detay"];
				$i++;
			}
			$sonuc->close();
			return $universite;	
		}

		public function uniKayitSayisiGetir ($baglan) {

			$sql="SELECT COUNT(*) FROM stj_universite";
			$sonuc=$baglan->query($sql);
			while ($dizi=$sonuc->fetch_array(MYSQLI_NUM)) {
				$kayit_sayisi=$dizi["0"];
			}

			return $kayit_sayisi;
		}

		public function universiteSil ($silinecek_id,$baglan) {

			$sql="DELETE FROM stj_universite WHERE id='{$silinecek_id}'";
			$sonuc=$baglan->prepare($sql);
			$sonuc->execute();

		}



		public function tumKayitlarUniversite ($baglan) {

			$sql="SELECT ID,universite_ad FROM stj_universite ORDER BY universite_ad";
			$sonuc=$baglan->query($sql);
			$i=0;
			$universite=array(array());
			while ($dizi=$sonuc->fetch_array(MYSQLI_ASSOC)) {

				$universite[$i]["ID"]=$dizi["ID"];
				$universite[$i]["universite_ad"]=$dizi["universite_ad"];
				$i++;
			}
			$sonuc->close();
			return $universite;	

		}


		public function bolumGetir($baslangic,$icerikSayisi,$baglan) {


			$sql="SELECT u.universite_ad, b.ID, b.bolum_ad, b.bolum_aciklama FROM stj_bolum AS b JOIN stj_universite AS u  ON b.universite_id=u.ID ORDER BY bolum_ad ASC LIMIT $baslangic,$icerikSayisi";
			$sonuc=$baglan->query($sql);
			$i=0;
			$bolum=array(array());
			while ($dizi=$sonuc->fetch_array(MYSQLI_ASSOC)) {

				$bolum[$i]["ID"]=$dizi["ID"];
				$bolum[$i]["bolum_ad"]=$dizi["bolum_ad"];
				$bolum[$i]["bolum_aciklama"]=$dizi["bolum_aciklama"];
				$bolum[$i]["universite_ad"]=$dizi["universite_ad"];
				$i++;
			}
			$sonuc->close();
			return $bolum;	


		}

		public function tumBolumlerGetir ($universite_id,$baglan) {


			$sql="SELECT ID,bolum_ad FROM stj_bolum WHERE universite_id='{$universite_id}' ORDER BY bolum_ad";
			$sonuc=$baglan->query($sql);
			$i=0;
			$bolum=array(array("ID"=>"0","bolum_ad"=>"Bölüm Ekleyin"));
			while ($dizi=$sonuc->fetch_array(MYSQLI_ASSOC)) {

				$bolum[$i]["ID"]=$dizi["ID"];
				$bolum[$i]["bolum_ad"]=$dizi["bolum_ad"];
				
				$i++;
			}
			$sonuc->close();
			return $bolum;	


		}

		


		public function bolumKayitSayisiGetir ($baglan) {


			$sql="SELECT COUNT(*) FROM stj_bolum";
			$sonuc=$baglan->query($sql);
			while ($dizi=$sonuc->fetch_array(MYSQLI_NUM)) {
				$kayit_sayisi=$dizi["0"];
			}

			return $kayit_sayisi;

		}


			public function bolumSil ($silinecek_id,$baglan) {

			$sql="DELETE FROM stj_bolum WHERE id='{$silinecek_id}'";
			$sonuc=$baglan->prepare($sql);
			$sonuc->execute();


		}

	}	


	class Departman {

			public function departmanEkle ($adi,$detay,$baglan) {

			$sql="INSERT INTO stj_departman (departman_ad, departman_detay) VALUES (?,?)";
			$sonuc=$baglan->prepare($sql);
			
			if ($sonuc) {
			$sonuc->bind_param("ss",$departman_ad,$departman_detay);
			$departman_ad=$adi;
			$departman_detay=$detay;
			$sonuc->execute();
			$kayit_sayisi=$sonuc->affected_rows;
			$sonuc->close();
			return $kayit_sayisi;

			}

			else return 0;
		}


		public function departmanGetir ($baslangic,$icerikSayisi,$baglan) {

			$sql="SELECT * FROM stj_departman ORDER BY departman_ad ASC LIMIT $baslangic,$icerikSayisi";
			$sonuc=$baglan->query($sql);
			$i=0;
			$departman=array(array());
			while ($dizi=$sonuc->fetch_array(MYSQLI_ASSOC)) {

				$departman[$i]["departman_id"]=$dizi["departman_id"];
				$departman[$i]["departman_ad"]=$dizi["departman_ad"];
				$departman[$i]["departman_detay"]=$dizi["departman_detay"];
				$i++;
			}
			$sonuc->close();
			return $departman;	

		}

			public function tumKayitlarDepartmanGetir ($baglan) {

			$sql="SELECT departman_id,departman_ad FROM stj_departman ORDER BY departman_ad";
			$sonuc=$baglan->query($sql);
			$i=0;
			$departman=array(array());
			while ($dizi=$sonuc->fetch_array(MYSQLI_ASSOC)) {

				$departman[$i]["departman_id"]=$dizi["departman_id"];
				$departman[$i]["departman_ad"]=$dizi["departman_ad"];
				
				$i++;
			}
			$sonuc->close();
			return $departman;	

		}

		public function departmanKayitSayisiGetir ($baglan) {

			$sql="SELECT COUNT(*) FROM stj_departman";
			$sonuc=$baglan->query($sql);
			while ($dizi=$sonuc->fetch_array(MYSQLI_NUM)) {
				$kayit_sayisi=$dizi["0"];
			}

			return $kayit_sayisi;
		}

		public function departmanSil ($silinecek_id,$baglan) {

			$sql="DELETE FROM stj_departman WHERE departman_id IN ($silinecek_id)";
			$sonuc=$baglan->prepare($sql);
			$sonuc->execute();
			$sonuc->close();


		}



	}


	class Stajer {

	public function stajerEkle (array $icerik,$baglan) {

			$sql="INSERT INTO stj_stajer (stj_foto, stj_ad, stj_soyad, stj_tc, stj_dogum, stj_sehir, stj_cep, stj_email, stj_proje_konu, stj_proje_icerik, stj_baslama, stj_bitis, departman_id, universite_id, bolum_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$sonuc=$baglan->prepare($sql);
			
			if ($sonuc) {
			$sonuc->bind_param("ssssssssssssiii",$stj_foto,$stj_ad,$stj_soyad,$stj_tc,$stj_dogum,$stj_sehir,$stj_cep,$stj_email,$stj_proje_konu,$stj_proje_icerik, $stj_baslama, $stj_bitis,$departman_id,$universite_id,$bolum_id);
			$stj_foto=$icerik["stj_foto"];
			$stj_ad=$icerik["stj_ad"];
			$stj_soyad=$icerik["stj_soyad"];
			$stj_tc=$icerik["stj_tc"];
			$stj_dogum=$icerik["stj_dogum"];
			$stj_sehir=$icerik["stj_sehir"];
			$stj_cep=$icerik["stj_cep"];
			$stj_email=$icerik["stj_email"];
			$stj_proje_konu=$icerik["stj_proje_konu"];
			$stj_baslama=$icerik["stj_baslama"];
			$stj_bitis=$icerik["stj_bitis"];
			$stj_proje_icerik=$icerik["stj_proje_icerik"];
			$departman_id=$icerik["departman_id"];
			$universite_id=$icerik["universite_id"];
			$bolum_id=$icerik["bolum_id"];
			$sonuc->execute();
			$kayit_sayisi=$sonuc->affected_rows;
			$sonuc->close();
			return $kayit_sayisi;
			}

			else return false;


	}

	public function stajerGetir ($stajer_id,$baglan) {

		$sql = "SELECT * FROM stj_stajer s  LEFT OUTER JOIN stj_universite u ON s.universite_id=u.ID LEFT OUTER JOIN stj_bolum b ON s.bolum_id=b.ID LEFT OUTER JOIN stj_departman d ON s.departman_id=d.departman_id WHERE s.ID=$stajer_id";

			$sonuc=$baglan->query($sql);
			$i=0;
			$stajer=array(array("bolum_id"=>"0"));
			while ($dizi=$sonuc->fetch_array(MYSQLI_ASSOC)) {
				$stajer[$i]["ID"]=$stajer_id;
				$stajer[$i]["stj_foto"]=$dizi["stj_foto"];
				$stajer[$i]["stj_ad"]=$dizi["stj_ad"];
				$stajer[$i]["stj_soyad"]=$dizi["stj_soyad"];
				$stajer[$i]["stj_tc"]=$dizi["stj_tc"];
				$stajer[$i]["stj_dogum"]=$dizi["stj_dogum"];
				$stajer[$i]["stj_sehir"]=$dizi["stj_sehir"];
				$stajer[$i]["stj_cep"]=$dizi["stj_cep"];
				$stajer[$i]["stj_email"]=$dizi["stj_email"];
				$stajer[$i]["stj_proje_konu"]=$dizi["stj_proje_konu"];
				$stajer[$i]["stj_proje_icerik"]=$dizi["stj_proje_icerik"];
				$stajer[$i]["stj_baslama"]=$dizi["stj_baslama"];
				$stajer[$i]["stj_bitis"]=$dizi["stj_bitis"];
				$stajer[$i]["departman_id"]=$dizi["departman_id"];
				$stajer[$i]["universite_id"]=$dizi["universite_id"];
				$stajer[$i]["bolum_id"]=$dizi["bolum_id"];
				$stajer[$i]["universite_ad"]=$dizi["universite_ad"];
				$stajer[$i]["bolum_ad"]=$dizi["bolum_ad"];
				$stajer[$i]["departman_ad"]=$dizi["departman_ad"];
				
				$i++;
			}
			$sonuc->close();
			return $stajer;	



	}


	public function stajerDuzenle (array $icerik,$baglan) {


			

			$sql="UPDATE stj_stajer SET stj_ad=?,stj_soyad=?,stj_tc=?,stj_dogum=?,stj_sehir=?,stj_cep=?,stj_email=?,stj_proje_konu=?,stj_proje_icerik=?,stj_baslama=?,stj_bitis=?,departman_id=?,universite_id=?,bolum_id=? WHERE ID='{$icerik["ID"]}'";


			$sonuc=$baglan->prepare($sql);
			
			if ($sonuc) {
			$sonuc->bind_param("sssssssssssiii",$stj_ad,$stj_soyad,$stj_tc,$stj_dogum,$stj_sehir,$stj_cep,$stj_email,$stj_proje_konu,$stj_proje_icerik, $stj_baslama, $stj_bitis,$departman_id,$universite_id,$bolum_id);
			
			$stj_ad=$icerik["stj_ad"];
			$stj_soyad=$icerik["stj_soyad"];
			$stj_tc=$icerik["stj_tc"];
			$stj_dogum=$icerik["stj_dogum"];
			$stj_sehir=$icerik["stj_sehir"];
			$stj_cep=$icerik["stj_cep"];
			$stj_email=$icerik["stj_email"];
			$stj_proje_konu=$icerik["stj_proje_konu"];
			$stj_baslama=$icerik["stj_baslama"];
			$stj_bitis=$icerik["stj_bitis"];
			$stj_proje_icerik=$icerik["stj_proje_icerik"];
			$departman_id=$icerik["departman_id"];
			$universite_id=$icerik["universite_id"];
			$bolum_id=$icerik["bolum_id"];
			$sonuc->execute();
			$kayit_sayisi=$sonuc->affected_rows;
			$sonuc->close();
			return $kayit_sayisi;
			}

			else return false;
	}


		public function stajerKayitSayisiGetir ($baglan) {

			$sql="SELECT COUNT(*) FROM stj_stajer";
			$sonuc=$baglan->query($sql);
			while ($dizi=$sonuc->fetch_array(MYSQLI_NUM)) {
				$kayit_sayisi=$dizi["0"];
			}

			return $kayit_sayisi;
		}


			public function stajerTabloGetir ($baslangic,$icerikSayisi,$baglan) {

			$sql="SELECT ID,stj_foto,stj_ad,stj_soyad,stj_tc,stj_baslama,stj_bitis FROM stj_stajer ORDER BY stj_bitis DESC LIMIT $baslangic,$icerikSayisi";
			$sonuc=$baglan->query($sql);
			$i=0;
			$stajer=array(array());
			while ($dizi=$sonuc->fetch_array(MYSQLI_ASSOC)) {

				$stajer[$i]["ID"]=$dizi["ID"];
				$stajer[$i]["stj_foto"]=$dizi["stj_foto"];
				$stajer[$i]["stj_ad"]=$dizi["stj_ad"];
				$stajer[$i]["stj_soyad"]=$dizi["stj_soyad"];
				$stajer[$i]["stj_tc"]=$dizi["stj_tc"];
				$stajer[$i]["stj_baslama"]=$dizi["stj_baslama"];
				$stajer[$i]["stj_bitis"]=$dizi["stj_bitis"];
				$i++;
			}
			$sonuc->close();
			return $stajer;	

		}



		public function stajerSil ($silinecek_id,$baglan) {

			$sql="DELETE FROM stj_stajer WHERE ID IN ($silinecek_id)";
			$sonuc=$baglan->prepare($sql);
			$sonuc->execute();
			$sonuc->close();
		}





			public function stajerIDGetir ($stajer_tc,$baglan) {

			$sql="SELECT ID FROM stj_stajer WHERE stj_tc=$stajer_tc";
			$sonuc=$baglan->query($sql);
			$stajer=array("ID"=>"0");
			while ($dizi=$sonuc->fetch_array(MYSQLI_ASSOC)) {

				$stajer["ID"]=$dizi["ID"];
			
			
			}
			$sonuc->close();
			return $stajer;	

		}

}


	

	
?>