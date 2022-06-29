<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Nouveau mot de passe | Crypto Business</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/nouveau-mot-de-passe.css">
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
	</div>

	<br/>


	<?php


	if (isset($_GET['email']) AND !empty($_GET['email']) AND isset($_GET['token']) AND !empty($_GET['token']) ) 
	{
		$email = htmlentities($_GET['email']);
		$token = ($_GET['token']);

		 //Accéder à la table users pour voir si l'email et le token existent
		$usersbdd1= $bdd->prepare("SELECT * from users WHERE email = ?");
		$usersbdd1->execute(array($email));
		$userexist1 = $usersbdd1->rowcount();

		if ($userexist1 == 1) 
		{
			$usersbdd2 = $bdd->prepare("SELECT * from users WHERE token = ?");
			$usersbdd2->execute(array($token));
			$userexist2 = $usersbdd2->rowcount();

			if ( $token = $userexist2) 
			{

				?>

				<br/><br/>

				<div class="formgroup">
					<div class="haut">
						<h2>Mettre à jour votre mot de passe</h2>
						<p><span for="password">Créer un nouveau mot de passe</span></p>
					</div>
					
					<form action="" method="POST">
						<input type="password" name="password" class="password" id="password" placeholder="Mettez votre nouveau mot de passe"> <br/><br/>


						<button class="confirmer" name="confirmer">Confirmer</button>

					</form> <br/>
				</div>

			</body>
			</html>



			<?php



		}else
		{
		//else token n'eiste pas
			$error = "Le token n'existe pas ou a expiré";
		}
	}else
	{
		//else email n'eiste pas
		$error = "L'email n'a pas demandé une réinitialisation";
		echo $error;
	}





} else
{
		//1 else de email et token n'existe pas
	echo "L'email ou le token de réinitialisation n'existe pas ou le lien sur lequel vous avez cliqué a expiré";

}

?>

<!-- Les erreurs et messages à afficher avant le bouton submit -->
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


<?php

include('bdd_config.php');

if (isset($_POST['confirmer'])) 
{

	if (isset($_POST['password']) AND !empty($_POST['password'])) 
	{
		$password = sha1($_POST['password']);
		 //Accéder à la table users pour réinitialiser le token
		$tokenbdd= $bdd->prepare("UPDATE users SET password = ?, token = NULL");
		$tokenbdd->execute(array($password));

		if ($tokenbdd) 
		{
			$note = "Votre mot de passe a été bien modifié";
					// Variables concernant l'email

			$header="MIME-Version: 1.0\r\n";
			$header.='From:"Crypto Business"<crypto@boss-arts.com>'."\n";
			$header.='Content-type:text/html; charset="utf-8"'."\n";
			$header.='Content-Transfert-Encoding: 8bit';

			$message='

			<html>
			<body>

			<div align="center">

			<span>Votre mot de passe a été modifié</span>

			</div>
			</body>
			</html>

			';

			$mail = mail($email, "Mot de passe modifie", $message, $header);

			if ($mail) 
			{
				$note = "Mot de passe modifié avec succès";

			}else
			{
							//else mot de passe modifié
				$error = "Une erreur est subvenu";
			}
		}


	}else
	{
		$error = "le mot de passe est vide";
	}
}

?>

<div class="note">
	<?php
	if (isset($note)) 
	{
		?>
		<br/><img src="logos/ok.png" alt="logo-ok" class="img-note"><br>
		<?php
		echo $note;
		?>
		<a href="http://crypto.boss-arts.com/connexion.php"><button>Connectez-vous ici</button></a>	
	<?php
}
?>
</div>


<?php include('balises/foot-code.php');?>
<?php include('footer.php');?>
</body>
</html>