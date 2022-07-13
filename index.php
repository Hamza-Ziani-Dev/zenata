<?php
include './database/connection.php';
include './public/controller/home.php'; //1 Home
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Zenata</title>
<style>
    .flex-container {
          display: flex;
    }
    .flex-container > div {
           background-color: #f1f1f1;
           margin: 10px;
           padding: 20px;
           font-size: 30px;
      }
</style>
<link rel="stylesheet" href="./public/css/vendor.css">

<!-- Fontawesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"/>
<!-- Dosis & Poppins Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;523;600;700;800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="./public/css/index.css">
<link rel="stylesheet" href="./public/css/app.css">

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
<?php 
//include './public/controller/login.php'; //1 Login
?>
	  <!-- Header Nav -->
<div class="navigation-wrapper">
<nav class="navbar navbar-top navbar-expand-md navbar-light bg-white">
	<div class="container-fluid">
			<div class="collapse navbar-collapse" id="navbar-top-collapsible">
				<ul class="navbar-nav navbar-menu-secondary" >
					<li class="nav-item dropdown mega-dropdown" >
						<a onclick="GO_To_LIKS(this)" href="page1" class="nav-link dropdown-toggle dropdown-nocaret " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					      <i class="fas fa-tachometer-alt mr-1"></i>  Home </a>
					</li>
					<li class="nav-item dropdown mega-dropdown" >
					<a onclick="GO_To_LIKS(this)" href="page2" class="nav-link dropdown-toggle dropdown-nocaret" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-calculator mr-1"></i> Calcule </a>
					</li>
        </ul> 
			</div>
	</div>
</nav>
</div>
<div id="page1"><br>
<?php include './src/dashboard.php'; ?> <!--  2 Dashboard -->
<div class="panel panel-light">
    <div class="panel-toolbar">
    <ul class="nav nav-pills btn-group">
			<li class="nav-item btn-group"></li>
<?php include './src/import_lots.php'; ?>
<?php include './src/import_lots_distribues.php'; ?>
</div>
</div>
<div>
<!--//////////////////////////////////////////////////////////////////////////////////// -->
   <form method="POST"><br>
   <button class="btn btn-primary btn-lg btn-block" type="submit" name="sauvegarder_cat">Sauvegarder categories</button>
   <!--<button class="btn btn-success" type="submit" name="sauvegarder_tranche">Sauvegarder les tranches</button>--><br>
   <button class="btn btn-warning btn-lg btn-block" type="submit" name="sauvegarder_effectues">Mise à jour effectues</button>
   <br><br><br>
   </form> 
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="page2" style="display: none;"> 
<?php include './src/calculator.php'; ?> <!-- 3 Calculator -->
</div><br><br><br><br><br><br><br><br>
<?php include './includes/footer.php'; ?>

<script src="./public/js/vendor.js"></script>
<script src="./public/js/app.js"></script>
<script src="./public/js/tabs.js"></script>
<script src="./public/js/index.js"></script><br>
