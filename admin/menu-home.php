<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/menu-home.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato&amp;display=swap'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" href="css_perso/style5-menu.css"> -->
	<title></title>
</head>

<body>
	

	<header>
		<div class="logo-entete"><br/>
			<a href="http://crypto.boss-arts.com/accueil.php"><img src="logos/LOGO_CRYPTO_BUSINESS_SITE_WEB.png" alt="LOGO CRYPTO BUSINESS SITE WEB"></a><br/>
		</div>
	</header>

	<?php

	session_start();

	if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) 
	{
		$getid = intval($_SESSION['id']);

		$userbdd = $bdd->prepare('SELECT * from users_admins WHERE id = ?');
		$userbdd->execute(array($getid));
		$userinfo = $userbdd->fetch();

		if ($getid = $userinfo['id']) 
		{
			$admin_level = $userinfo['admin_level'];

			if ($admin_level != 0) 
			{

//Montrer le menu admin
				?>

				<div class="topnav" id="myTopnav">
					<a href="http://crypto.boss-arts.com/admin/accueil.php" class="">Accueil</a>
					<a href="http://crypto.boss-arts.com/admin/tableau-de-bord.php?id=<?php echo $_SESSION['id'];?>">Tableau de bord</a>
					<a href="http://crypto.boss-arts.com/admin/profil_admin.php?id=<?php echo $_SESSION['id'];?>">Profil</a>
					<a href="http://crypto.boss-arts.com/admin/deconnexion.php?id=<?php echo $_SESSION['id'];?>">Deconnexion</a>
					<a href="javascript:void(0);" class="icon" onclick="myFunction()">
						<i class="fa fa-bars"></i>
					</a>
				</div>

				<?php

			}else
			{
	//else si l'internaute n'est pas connecté
	//Montrer le menu visiteur
				?>

				<div class="topnav" id="myTopnav">
					<a href="http://crypto.boss-arts.com/admin/accueil.php" class="">Accueil</a>
					<a href="http://crypto.boss-arts.com/admin/inscription.php">S'inscrire</a>
					<a href="http://crypto.boss-arts.com/admin/connexion.php">Connexion</a>
					<a href="javascript:void(0);" class="icon" onclick="myFunction()">
						<i class="fa fa-bars"></i>
					</a>
				</div>

				<?php

			}

		}else
		{
	//else si l'internaute n'est pas connecté
	//Montrer le menu visiteur
			?>
			<div class="topnav" id="myTopnav">
				<a href="http://crypto.boss-arts.com/admin/accueil.php" class="">Accueil</a>
				<a href="http://crypto.boss-arts.com/admin/inscription.php">S'inscrire</a>
				<a href="http://crypto.boss-arts.com/admin/connexion.php">Connexion</a>
				<a href="javascript:void(0);" class="icon" onclick="myFunction()">
					<i class="fa fa-bars"></i>
				</a>
			</div>

			<?php

		}

	}
	else
	{
	//else si l'internaute n'est pas connecté
	//Montrer le menu visiteur
		?>
		<div class="topnav" id="myTopnav">
			<a href="http://crypto.boss-arts.com/admin/accueil.php" class="">Accueil</a>
			<a href="http://crypto.boss-arts.com/admin/inscription.php">S'inscrire</a>
			<a href="http://crypto.boss-arts.com/admin/connexion.php">Connexion</a>
			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
				<i class="fa fa-bars"></i>
			</a>
		</div>

		<?php

	}


	?>

	<script>
		function myFunction() {
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") {
				x.className += " responsive";
			} else {
				x.className = "topnav";
			}
		}
	</script>

</body>
</html>