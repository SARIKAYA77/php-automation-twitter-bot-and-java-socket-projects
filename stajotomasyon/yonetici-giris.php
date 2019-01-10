<?php @session_start(); ?>
<?php
	   
if (isset($_POST['username']) && isset($_POST['password'])) {
 
	include "islemler.php";
    
	$_POST=array_map("trim",$_POST);
	$_POST=array_map("strip_tags",$_POST);
	$user=$baglan->real_escape_string($_POST['username']);
	$pass=$baglan->real_escape_string($_POST['password']);
	$v=new Yonetici ();
	if ($v->giris($user,$pass,$baglan)) {
        $_SESSION["user"] ="test";
  
		$kontrol=true;
			$hata="";
		sleep(3);
        
		header ("Location:stajer-listele.php");
	}
	else {
		$hata="";
	}
}


?>


<!DOCTYPE html>
<html lang="tr">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>

    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Yönetici Giriş Paneli</div>
                        
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >
                    	<?php if (isset($hata)) {?>
                        <div  id="login-alert" class="alert alert-danger col-sm-12">Kullanıcı Adı veya Şifre Hatalı</div>

                        <?php unset($hata);}?>
                            
                        <form action="yonetici-giris.php" id="loginform" class="form-horizontal" role="form" method="POST">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="kullanıcı adı">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="şifre">
                                    </div>
                                  

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Beni Hatırla
                                        </label>
                                      </div>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <input class="btn btn-success" type="submit" value="Giriş Yap"	/>
                                  
                                     

                                    </div>
                                </div>

                            </form>     



                        </div>                     
                    </div>  
        </div>
       
    </div>
    
	
	
	<script src="js/jquery-2.2.3.js"</script>
	<script src="js/bootstrap.js"</script>
</body>
</html>