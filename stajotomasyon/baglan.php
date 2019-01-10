
<?php

	include("ayar.php");
	$baglan=new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_DB);
	$baglan->set_charset("utf8");
	if ($baglan->connect_error) {
		die ("$baglan->connect_error");
	}
?>


