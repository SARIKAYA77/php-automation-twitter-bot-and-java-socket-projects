	<?php
	if (isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

		include ("islemler.php");
		$departman=new Departman();
		$departmanDizi=$departman->tumKayitlarDepartmanGetir($baglan);
		$baglan->close();
		foreach ($departmanDizi as $key) {
			echo '<option value="'.$key["departman_id"].'">'.$key["departman_ad"].'</option>';
		}

	}

	?>