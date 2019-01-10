<?php
	
    if (isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

	include("islemler.php");
	$departman=new Departman();
    $id=$_POST["id"];
	$departman->departmanSil($id,$baglan);
     $baglan->close();
    echo "ok";
   

    }
    


?>