
<?php if(!isset($_SESSION["user"])){ header('location:yonetici-giris.php'); } ?>


 
<!DOCTYPE html>
<html lang="tr">
<head>
   
  <link rel="stylesheet" href="css/bootstrap.min.css">
   <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-3.1.0.min.js"></script>
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
    <title>Staj Otomasyon</title>
	<link rel="stylesheet" type="text/css" href="css/custom.css">
    <style>
    .ust-bosluk {
     margin-top:10px;
    }

    </style>

    <script type="text/javascript">

    $(function () {
    $('.navbar-toggle').click(function () {
        $('.navbar-nav').toggleClass('slide-in');
        $('.side-body').toggleClass('body-slide-in');
        $('#search').removeClass('in').addClass('collapse').slideUp(200);
  
    });
   
   $('#search-trigger').click(function () {
        $('.navbar-nav').removeClass('slide-in');
        $('.side-body').removeClass('body-slide-in');

    });
});

    </script>
</head>
<body>
 
    <!-- Menu -->
    <div class="side-menu">
    
    <nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <div class="brand-wrapper">
          
            <button type="button" class="navbar-toggle" >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Brand -->
            <div class="brand-name-wrapper">
                <a class="navbar-brand" href="#">
                    Staj Otomasyon
                </a>
            </div>

            <!-- Search -->
            <a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger">
                <span class="glyphicon glyphicon-search"></span>
            </a>

            <!-- Search body -->
            <div id="search" class="panel-collapse collapse">
                <div class="panel-body">
                    <form class="navbar-form" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="T.C. Kimlik NO yazınız">
                        </div>
                        <button type="submit" class="btn btn-default "><span class="glyphicon glyphicon-ok"></span></button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- Main Menu -->
    <div class="side-menu-container">
        <ul class="nav navbar-nav">
       

              <!-- Dropdown-->
            <li class="panel panel-default" id="dropdown">
                <a data-toggle="collapse" href="#dropdown-lvl1">
                    <span class="glyphicon glyphicon-user"></span> Stajer <span class="caret"></span>
                </a>

                <!-- Dropdown level 1 -->
                <div id="dropdown-lvl1" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            <li><a href="stajer-ekle.php">Stajer Ekle</a></li>
                             <li><a href="stajer-listele.php">Stajerler</a></li>
                        </ul>
                    </div>
                </div>
            </li>

            <!-- Dropdown-->
            <li class="panel panel-default" id="dropdown">
                <a data-toggle="collapse" href="#dropdown-lvl2">
                    <span class="glyphicon glyphicon-book"></span> Üniversite <span class="caret"></span>
                </a>

                <!-- Dropdown level 1 -->
                <div id="dropdown-lvl2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            <li><a href="universite-ekle.php">Üniversite Ekle</a></li>
                            <li><a href="universite-listele.php">Üniversite Listele</a></li>
                            <li><a href="bolum-listele.php">Bölüm Listele</a></li>
                        </ul>
                    </div>
                </div>
            </li>

            


              <!-- Dropdown-->
            <li class="panel panel-default" id="dropdown">
                <a data-toggle="collapse" href="#dropdown-lvl3">
                    <span class="glyphicon glyphicon-briefcase"></span> Departman <span class="caret"></span>
                </a>

                <!-- Dropdown level 1 -->
                <div id="dropdown-lvl3" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            <li><a href="departman-ekle.php">Departman Ekle</a></li>
                            <li><a href="departman-listele.php">Departman Listele</a></li>
                        </ul>
                    </div>
                </div>
            </li>

            <li><a href="cikis-yap.php"><span class="glyphicon glyphicon-log-out"></span> Çıkış Yap</a></li>

        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
    
    </div>
