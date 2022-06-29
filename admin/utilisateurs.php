<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Utilisateurs | Crypto Business</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/utilisateurs.css">
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


			<div class="all_users">
				<div class="confirme">
					<a href="http://crypto.boss-arts.com/admin/utilisateurs_confirmes.php?id=<?php echo $_SESSION['id'];?>"><img src="logos/users_confirme.png" alt=""> <br/>Utlisateurs confirmés</a>
				</div>
				<br/>
				
				<div class="non_confirme">
					<a href="http://crypto.boss-arts.com/admin/utilisateurs_non_confirmes.php?id=<?php echo $_SESSION['id'];?>"><img src="logos/users_non_confirme.png" alt=""> <br/>Utlisateurs non confirmés</a>
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