	<?php
	if (isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

		include ("islemler.php");
		$universite= new Universite();
		$universiteDizi=$universite->tumKayitlarUniversite($baglan);
		$baglan->close();
		foreach ($universiteDizi as $key) {
			echo '<option value="'.$key["ID"].'">'.$key["universite_ad"].'</option>';
		}

		unset($universiteDizi);
		
	}

	?>