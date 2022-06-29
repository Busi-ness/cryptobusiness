<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Message envoyé | Crypto Business</title>
	<meta name="description" content="Crypto Business est une plateforme rapide, fiable et sécurisé qui permet de payer des cryptomonnaies via les paiements mobiles ainsi que de les vendre" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/message-envoye.css">
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

	<br/><br/>



	<div class="note">
		<img src="logos/ok.png" alt="Ok" class="img-note"><br>
		Merci beaucoup <b style="color: #ffa60c" ><?php echo htmlentities($_POST['name']);?></b> Votre message a été reçu. Nous vous repondrons sous peu!
	</div>




	<div class="bas">

		<?php include('balises/foot-code.php');?>
		<?php include('footer.php');?>

	</div>
</body>
</html>