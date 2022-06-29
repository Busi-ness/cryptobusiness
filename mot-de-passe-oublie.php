<!DOCTYPE html>
<html lang="en">
<head>
	<title>Mot de passe oublié | Crypto Business</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/mot-de-passe-oublie.css">
	<link rel="stylesheet" href="css_perso/style.css">
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

	<?php



	if (isset($_POST['envoyer'])) 
	{
		if (isset($_POST['email']) AND !empty($_POST['email'])) 
		{
			$email = htmlentities($_POST['email']);

				 //Accéder à la table users pour voir si l'email
			$usersbdd = $bdd->prepare("SELECT * from users WHERE email = ?");
			$usersbdd->execute(array($email));
			$userexist = $usersbdd->rowcount();

			if ($userexist == 1) 

			{
				$token = uniqid();
				$url = "http://crypto.boss-arts.com/nouveau-mot-de-passe.php?email=$email&token=$token";




			// Variables concernant l'email

				$header="MIME-Version: 1.0\r\n";
				$header.='From:"Crypto Business"<crypto@boss-arts.com>'."\n";
				$header.='Content-type:text/html; charset=utf-8'."\n";
				$header.='Content-Transfert-Encoding: 8bit';

				$html = file_get_contents('scripts_emails/mail_reinitialiser_mot_de_passe.html');
				$link = "<a href=".$url.">Réinitialiser mot de passe</a>";
				$html = str_replace("{{link}}", $link, $html);




				$mail = mail($email, "Changer mot de passe", $html, $header);

				if ($mail) 
				{
					$inserttoken = $bdd->prepare("UPDATE users SET token = ? WHERE email = ?");
					$inserttoken->execute(array($token, $email));


					$note = "Un mail avec un lien de réinitialisation de votre mot de passe vous a été envoyé";

				}


			}else
			{
				$error = "L'email n'existe pas";
				
			}



		}else
		{
				//else email vide
			echo "L'adresse email est vide";
		}
	}



	?>	
	<br/> <br/><br/>
	<div class="all">
		<h2>Récupérez votre compte</h2>
		<form action="" method="POST">
			<p><span>Votre adresse email</span></p> <br>
			<input type="email" placeholder="Entrez votre adresse email" name="email" class="email"> <br> <br>

			<div class="error">
				<?php
				if (isset($error)) 
				{
					?>
					<img src="logos/error.png" alt="Error"><br>
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
					<img src="logos/ok.png" alt="Error"><br>
					<?php
					echo $note;
				}
				?>

				<br/><br/>
			</div>
			<button type="submit" name="envoyer" class="recevoir_token">Recevoir un token</button>
		</form><br/>
	</div>

</body>
</html>


<!-- <html>
<body>

	<div align="center">

		<a href ="'.$url.'">Réinitialiser mot de passe</a>

	</div>
</body>
</html> -->