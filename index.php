<?php
	session_start();
	include "db.php";
?>

<html>
  <head>
  	<meta charset="UTF-8">
  	<link rel="stylesheet" href="css.css" type="text/css">
    <title>Cat Websites</title>
  </head>

  	<body>
		<div id="celek">
			<div id="hlavicka">
					Cat Websites
			</div>
			<div id="telo">
				<div id="menu">
					<menu>
						<li><a href="?p=about">About</a></li>
						<li><a href="?p=information">Informations</a></li>
						<li><a href="?p=photos">Photos</a></li>	
						<?php if(isset($_SESSION["logged"])){ ?>
							<li><a href="?p=logout">Log out</a></li>	
						<?php }else{ ?>		
							<li><a href="?p=login">Login</a></li>	
							<li><a href="?p=registrace">Registration</a></li>
						<?php } ?>					
					</menu>
				</div>
					<div id="obsah">
						<?php

							if(isset($_GET["p"]) and preg_replace("/[^a-z\d_-]+/i", "", $_GET["p"])){
					            $cesta = "pages/".$_GET["p"].".php";
					            $cesta = strtr($cesta, './', '');
					            if(file_exists($cesta)){
					                include $cesta;
					            }
					        }else{
					        	include "pages/about.php";
					        }
			            ?>
					</div>
				<div id="clear"></div>
			</div>
		</div>
		<div id="spodek">
			Belongs to property of Miroslav Nakládal
		</div>

	</body>
</html>