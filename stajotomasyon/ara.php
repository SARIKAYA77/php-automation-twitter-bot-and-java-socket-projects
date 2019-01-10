<?php if(!isset($_SESSION["user"])){ header('location:yonetici-giris.php'); } ?>
<?php
 
if(isset($_POST["tc"])) {


	include ("islemler.php");
	$stajer=new Stajer();

	$kontrol=$stajer->stajerIDGetir($_POST["tc"],$baglan);
	$baglan->close();

	if ($kontrol["ID"]!="0") {
		$url="stajer-detay.php?id=".$kontrol["ID"];
		unset($kontrol);
		header("Location:$url");
	}

	else {
		header("Location:stajer-listele.php");
	}




	






}




?>