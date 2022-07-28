<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Contact | Crypto Business</title>
	<meta name="description" content="Crypto Business est une plateforme rapide, fiable et sécurisé qui permet de payer des cryptomonnaies via les paiements mobiles ainsi que de les vendre" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/contact.css">
	<?php include('balises/head-code.php');?>
	<link rel="icon" type="image/x-icon" href="logos/favicon_LOGO_CRYPTO_BUSINESS_SITE_WEB.ico">
	<script type="text/javascript" src="js_perso/contact.js"></script>
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


	<?php

	if (isset($_POST['myForm'])) 
	{

		if (!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['objet']) AND !empty($_POST['message'])  )
		{
			$name = preg_replace("/\s+/", "", htmlentities($_POST['name']));		
			$email = preg_replace("/\s+/", "", htmlentities($_POST['email']));
			$objet = htmlentities($_POST['objet']);
			$message = htmlentities($_POST['message']);
			date_default_timezone_set('Africa/Johannesburg');
		
		 //Accéder à la table messages_formulaire_contact pour voir si les données existent déjà
			$insertmessage = $bdd->prepare("INSERT INTO messages_formulaire_contact (name, email, objet, message, date_envoi) VALUES(?,?,?,?,?)");
			$insertmessage->execute(array($name, $email, $objet, $message, date('m-d-Y h:i:s a', time()),));

			if ($insertmessage)
			{


				?>

				<div class="note">
					<img src="logos/ok.png" alt="Ok" class="img-note"><br>
					Merci beaucoup <b style="color: #ffa60c" ><?php echo $name;?></b> Votre message a été reçu. Nous vous repondrons sous peu!
				</div>

				<?php
				
			}else
			{
				?>

				<div class="error">

					<img src="logos/error.png" alt="Error" class="img-error"><br>
					Une erreur est subvenue

				</div>

				<?php
			}


		}

	}


	

	?>


	<br/>
<div class="entete">
	
		<h1>NOUS CONTACTER</h1>
		<P style="text-align: center; font-size: 20px;" >Pour toutes préoccupations, nous restons disponible pour vous répondre</P>
</div>
	<div class="formgroup">

		<div class="haut">
			<h2>Formulaire de contact</h2>
			<span>Remplissez le formulaire pour vous contacter</span>
			<hr/>
		</div>
		<!-- message-envoye.php -->
		<form name="myForm" action="" onsubmit="return validateForm()" method="POST">
			<table class="form-style">
				<tr>
					<td>
						<label>
							Votre nom <span class="required">*</span>
						</label>
					</td>
					<td>
						<input type="text" name="name" class="long" maxlength="254" />
						<span class="error" id="errorname"></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							Votre adresse e-mail <span class="required">*</span>
						</label>
					</td>
					<td>
						<input type="email" name="email" class="long" maxlength="254"/>
						<span class="error" id="erroremail"></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							Objet <span class="required">*</span>
						</label>
					</td>
					<td>
						<input type="text" name="objet" class="long" maxlength="254" /></input>
						<span class="error" id="errorobj"></span>
					</td>
				</tr>

				<tr>
					<td>
						<label>
							Message <span class="required">*</span>
						</label>
					</td>
					<td>
						<textarea name="message" class="long field-textarea"></textarea>
						<span class="error" id="errormsg"></span>
					</td>
				</tr>


				<tr>
					<td></td>
					<td>
						<button type="submit" name="myForm">Envoyer</button> <br/>
						<button type="reset">Réinitialiser</button>      
					</td>
				</tr>
			</table>
		</form>


	</div>

	<div class="bas">

		<?php include('balises/foot-code.php');?>
		<?php include('footer.php');?>

	</div>
</body>
</html>