<?php if(!isset($_SESSION["user"])){ header('location:yonetici-giris.php'); } ?>
<?php

    if (isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

	include ("islemler.php");

		$bolum= new Universite();
		$bolumDizi=$bolum->tumBolumlerGetir($_POST["id"],$baglan);
		$baglan->close();
		foreach ($bolumDizi as $key) {
			echo '<option value="'.$key["ID"].'">'.$key["bolum_ad"].'</option>';
		}

    }
?>