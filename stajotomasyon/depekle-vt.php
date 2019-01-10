<?php  if (isset($_POST["departman_ad"])) {
	include ("islemler.php");
	$departman= new Departman ();
    $_POST=array_map("trim",$_POST);
    $_POST=array_map("strip_tags",$_POST);

    if ($_POST["departman_detay"]=="") {$departman_detay=null;}
    else {$departman_detay=$baglan->real_escape_string($_POST["departman_detay"]);}

    $departman_ad=$baglan->real_escape_string($_POST["departman_ad"]);

    $kontrol=$departman->departmanEkle( $departman_ad, $departman_detay,$baglan);
    
    if ($kontrol)
    	echo "basarili";
	else
		echo "hata";






  }  ?>