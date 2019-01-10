<?php
	
    if (isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

	include("islemler.php");
	$stajer=new Stajer();
    $id=$_POST["id"];
	$stajer->stajerSil($id,$baglan);
    $baglan->close();
    echo "ok";
   

    }
    


?>