<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Confirmation compte | Crypto Business</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/confirmation.css">
	<?php include('balises/head-code.php');?>
	<link rel="icon" type="image/x-icon" href="logos/favicon_LOGO_CRYPTO_BUSINESS_SITE_WEB.ico">
</head>
<body>

	<div class="menu">
		<?php

		include('bdd_config.php');

		//inclure le type de menu
		include('menu-home.php');

		?>

		<br/><br/>
		<?php


		if (isset($_GET['email'], $_GET['confirmkey']) AND !empty($_GET['email']) AND !empty($_GET['confirmkey'])) 

		{
			$email = htmlspecialchars(urldecode($_GET['email']));
			$confirmkey = htmlspecialchars($_GET['confirmkey']);


			$requser = $bdd->prepare("SELECT * FROM users WHERE email = ? AND confirmkey = ?");
			$requser->execute(array($email, $confirmkey));

			$userexist = $requser->rowCount();

			if ($userexist == 1) 
			{
				$user = $requser->fetch();
				if ($user['confirme'] == 0) 
				{
					$updateuser = $bdd->prepare("UPDATE users SET confirme = 1 WHERE email = ? AND confirmkey = ?");
					$updateuser->execute(array($email, $confirmkey));

					$note = "Je vous remercie pour l'activation de votre compte, vous pouvez maintenant vous connecter <a href='http://crypto.boss-arts.com/connexion.php'>ici</a>";

				}else
				{
			//else de l'utilisateur a déjà confirmé son compte
					$note = "Votre compte a déjà été confirmé ! Connectez vous <a href='http://crypto.boss-arts.com/connexion.php'>ici</a>";
				}

		# code...
			} else
			{
		//else de si l'utilisateur existe
				$error = "L'utilisateur n'existe pas";
			}

		}



		?>

		<div class="error">
			<?php
			if (isset($error)) 
			{
				?>
				<img src="logos/error.png" alt="Error" class="img-error"><br>
				<?php
				echo $error;
			}
			?>
		</div>
		<div class="note">
			<?php
			if (isset($note)) 
			{
				?>
				<img src="logos/ok.png" alt="Ok" class="img-note"><br>
				<?php
				echo $note;
			}
			?>
		</div>


			<?php include('balises/foot-code.php');?>
			<?php include('footer.php');?>
		</body>
		</html>