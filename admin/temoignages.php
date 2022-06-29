<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Témoignages| Crypto Business</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/temoignages.css">
	<link rel="icon" type="image/x-icon" href="logos/favicon_LOGO_CRYPTO_BUSINESS_SITE_WEB.ico">
</head>
<body>


	<div class="menu">
		<?php

		include('bdd_config.php');

		//inclure le type de menu
		include('menu-home.php');
		?>
	</div>

	<br/>

	<?php

	if (isset($_GET['id']) AND $_GET['id'] > 0) 
	{

		$getid = intval($_GET['id']);

		$userbdd = $bdd->prepare('SELECT * from users_admins WHERE id = ?');
		$userbdd->execute(array($getid));
		$userinfo = $userbdd->fetch();

		if ($getid = $userinfo['id']) 
		{
			if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) 
			{

				if ($getid == $_SESSION['id']) 
				{
				
				$grade = $userinfo['admin_level'];
	if ($grade != 0) 
			{

				?>


			<div class="all_tem">
				<div class="temoignages_valides">
					<a href="http://crypto.boss-arts.com/admin/temoignages_valides.php?id=<?php echo $_SESSION['id'];?>"><img src="logos/temoignages_valides.png" alt=""> <br/>Témoignages validés</a>
				</div>
				<br/>
				<div class="temoignages_en_attente">
					<a href="http://crypto.boss-arts.com/admin/temoignages_en_attente.php?id=<?php echo $_SESSION['id'];?>"><img src="logos/temoignages_en_attente.png" alt=""> <br/>Témoignages en attente</a>
				</div>
				<br/>

				<div class="temoignages_supprimes">
					<a href="http://crypto.boss-arts.com/admin/temoignages_supprimes.php?id=<?php echo $_SESSION['id'];?>"><img src="logos/temoignages_supprimes.png" alt=""> <br/>Témoignages supprimés</a>
				</div>
	
			</div>

			<?php 
}else
			{
				header('Location: http://crypto.boss-arts.com/admin/connexion.php');
			}
		}else
			{
				header('Location: http://crypto.boss-arts.com/admin/connexion.php');
			}
		}else
		{
			header('Location: http://crypto.boss-arts.com/admin/connexion.php');
		}


			}else
			{
				echo "Ce administrateur n'existe pas";
			}

		}else
		{
			header('Location: http://crypto.boss-arts.com/admin/connexion.php');

		}

?>


	</body>
	</html>