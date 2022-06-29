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

<?php
include('header.php');
?>

	<?php
	 include('bdd_config.php');

	session_start();

	if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) 
	{
		$getid = intval($_SESSION['id']);

		$userbdd = $bdd->prepare('SELECT * from users WHERE id = ?');
		$userbdd->execute(array($getid));
		$userinfo = $userbdd->fetch();

		if ($getid = $userinfo['id']) 
		{

//Montrer le menu membre
			?>

			<div class="topnav" id="myTopnav">
				<a href="http://crypto.boss-arts.com/accueil.php" class="">Accueil</a>
				<a href="http://crypto.boss-arts.com/profil.php?id=<?php echo $_SESSION['id'];?>">Profil</a>
				<a href="http://crypto.boss-arts.com/transactions.php?user_id=<?php echo $_SESSION['id'];?>">Transactions</a>
				<a href="http://crypto.boss-arts.com/temoignages.php">Témoignages</a>
				<a href="http://crypto.boss-arts.com/contact.php">Contact</a>
				<a href="http://crypto.boss-arts.com/a-propos.php">A propos</a>
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
				<a href="http://crypto.boss-arts.com/accueil.php" class="">Accueil</a>
				<a href="http://crypto.boss-arts.com/inscription.php">S'inscrire</a>
				<a href="http://crypto.boss-arts.com/connexion.php">Connexion</a>
				<a href="http://crypto.boss-arts.com/temoignages.php">Témoignages</a>
				<a href="http://crypto.boss-arts.com/contact.php">Contact</a>
				<a href="http://crypto.boss-arts.com/a-propos.php">A propos</a>
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
		<a href="http://crypto.boss-arts.com/accueil.php" class="">Accueil</a>
		<a href="http://crypto.boss-arts.com/inscription.php">S'inscrire</a>
		<a href="http://crypto.boss-arts.com/connexion.php">Connexion</a>
		<a href="http://crypto.boss-arts.com/temoignages.php">Témoignages</a>
		<a href="http://crypto.boss-arts.com/contact.php">Contact</a>
		<a href="http://crypto.boss-arts.com/a-propos.php">A propos</a>
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