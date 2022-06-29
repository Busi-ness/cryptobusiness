<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Transactions | Crypto Business</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/transactions.css">
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
				


				?>


			<div class="all_transactions">
				<div class="transactions_validees">
					<a href="http://crypto.boss-arts.com/admin/transactions_validees.php?id=<?php echo $_SESSION['id'];?>"><img src="logos/users_confirme.png" alt=""> <br/>transactions validées</a>
				</div>
				<br/>
				<div class="transactions_en_attente">
					<a href="http://crypto.boss-arts.com/admin/transactions_en_attente.php?id=<?php echo $_SESSION['id'];?>"><img src="logos/users_non_confirme.png" alt=""> <br/>Transactions en attente</a>
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
				echo "Ce administrateur n'existe pas";
			}

		}else
		{
			header('Location: http://crypto.boss-arts.com/admin/connexion.php');

		}

?>


	</body>
	</html>