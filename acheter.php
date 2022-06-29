<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/acheter.css">
	<link rel="stylesheet" href="cryptomonnaies/cryptos.css">
	<?php include('balises/head-code.php');?>
	<link rel="icon" type="image/x-icon" href="logos/favicon_LOGO_CRYPTO_BUSINESS_SITE_WEB.ico">
	<title>Acheter | Crypto Business</title>
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

	if (isset($_GET['id']) AND $_GET['id'] > 0) 
	{
		$getid = intval($_GET['id']);

		$userbdd = $bdd->prepare('SELECT * from users WHERE id = ?');
		$userbdd->execute(array($getid));
		$userinfo = $userbdd->fetch();
		$_SESSION['id'] = $userinfo['id'];
		$phone = $userinfo['phone'];

		if ($getid = $_SESSION['id']) 
		{

			$id = $userinfo['id'];


			if ($getid = $id) 
			{

				if (!empty($phone)) 
				{


					?>
					<!-- Afficher le formulaire d'achat -->

					<div class="formgroup">
						<br/>
						<h2>Acheter une cryptomonnaie</h2>
						<fieldset>
							<legend>Remplissage du formulaire</legend>
							<form action="" method="POST">
								<label for="">Je veux acheter:</label> <br><br>
								<?php include('cryptomonnaies/cryptos.php') ?>
								<br><br>
								<label for="adresse">Adresse de réception:</label> <br><br>
								<input type="text" name="adresse" id="adresse" value="" placeholder="Votre adresse de réception"> <br><br>

								<label for="">Veuillez bien vérifier l'adresse de réception</label><span style="color: red;">*</span> <br><br>
								<label for="montant">Pour:</label><br><br>
								<span class="nb">NB: Le montant doit être supérieur ou égal à 5000 FCFA</span><br><br>
								<input type="number" name="montant-fcfa" id="montant" value="<?php if(isset($_POST['montant-fcfa'])) { echo $_POST['montant-fcfa'];} ?>"><span class="fcfa"> FCFA</span> <br><br>





								<button type="submit" name="continuer">Continuer</button>
							</form>
						</fieldset>
					</div> <br><br>

					<?php

//Traitement du formulaire

					if (isset($_POST['continuer'])) 

					{
						if (isset($_POST['crypto']) AND !empty($_POST['crypto'])) 
						{
							if (isset($_POST['adresse']) AND !empty($_POST['adresse'])) 
							{

								$crypto = htmlspecialchars($_POST['crypto']);
								$adresse = htmlspecialchars($_POST['adresse']);
								$rien = 'rien';
								if ($crypto != $rien) 
								{
									if (isset($_POST['montant-fcfa']) AND !empty($_POST['montant-fcfa'])) 
									{

										$montantfcfa = trim(stripslashes(htmlspecialchars($_POST['montant-fcfa'])));


										$montantfixe = "5000";
				//vérifier si le montant est supérieur ou égal à 5000

										if ($montantfcfa >= $montantfixe) 
										{
											

											$montantdollars = $montantfcfa / 550;

											$cryptoarecevoir = $montantfcfa / $c1;




											?>

											<div class="details">
												<fieldset>
													<legend>Détails de l'achat</legend>
													<form action="acheter-step2.php?id=<?php echo $_SESSION['id'] ?>" method="POST">

														<input type="hidden" name="crypto" value="<?php echo $crypto; ?>">
														<input type="hidden" name="adresse" value="<?php echo $adresse; ?>">
														<input type="hidden" name="montantfcfa" value="<?php echo $montantfcfa; ?>">
														<input type="hidden" name="montantdollars" value="<?php echo $montantdollars; ?>">
														<input type="hidden" name="crptoarecevoir" value="<?php echo $cryptoarecevoir; ?>">

														<h2>Les détails de votre transaction</h2>
														<li class="cryptomonnaie">Cryptomonnaie:</li><br><span class="crypto"><?php echo $crypto; ?></span><br><br>

														<li class="cryptomonnaie">Adresse de réception:</li><br><span class="crypto"><?php echo $adresse; ?></span><br><br>

														<li class="text-montant">Montant en FCFA:</li><br><span class="prix"><?php echo $montantfcfa; ?> FCFA</span><br><br>

														<li class="text-montant">Montant en Dollars:</li><br><span class="prix"><?php echo $montantdollars; ?> USD</span><br><br>

														<span class="recevoir">Vous allez recevoir:</span> <span class="montant"><?php echo $cryptoarecevoir; ?></span> <span class="crypto2"><?php echo $crypto; ?></span><br><br>

														<button type="submit" name="payer">Continuer et payer</button>
													</form>
												</fieldset>
											</div>



											<?php


											?>

											<?php



										}else
										{
					//le montant es en dessous de 5000
											$error_montant = "Le montant doit être supérieur ou égal à 5000 FCFA";

										}

									}else
									{
				//else champ montant vide
										$error_montant = "Le champ montant ne doit pas être vide";

									}	
								}else
								{
		//else aucun crypto n'a été choisi
									$error_crypto = "Veuillez choisir une cryptomonnaie";
								}

							}else
							{
						//else adresse vide
								$error_adresse = "L'adresse de reception ne doit pas être vide";
							}
						}else
						{
		//else choisir une cryptomonnaie
							$error_crypto = "Veuillez choisir une cryptomonnaie";
						}

					}

					//Else des premières parties


				}else
		{
			//else pas de numéro de téléphone
			$numero = " <br/><h3>Mettez à jour votre votre numéro de téléphone ou Whatsapp dans Profil avant d'effectuer une transaction</h3>";
			echo $numero;
		}

				}else
				{
			//else l'id dans l'url n'est pas dans la base de données
					header('Location: http://crypto.boss-arts.com/connexion.php');
				}

			}else
			{
			//else l'id de session ne correspond pas à l'idée dans la base de données
				header('Location: http://crypto.boss-arts.com/connexion.php');
			}


	}else
	{
		//else id n'existe pas
		header('Location: http://crypto.boss-arts.com/connexion.php');
	}
	?>

	<div class="error">
		<?php
		if (isset($error_crypto)) 
		{
			?>
			<img src="logos/error.png" alt="Error" class="img-error"><br>
			<?php
			echo $error_crypto;
		}
		if (isset($error_adresse)) 
		{
			?>
			<img src="logos/error.png" alt="Error" class="img-error"><br>
			<?php
			echo $error_adresse;
		}
		?>
	</div>
	<div class="error">
		<?php
		if (isset($error_montant)) 
		{
			?>
			<img src="logos/error.png" alt="Error" class="img-error"><br>
			<?php
			echo $error_montant;
		}
		?>
	</div><br>

	<div class="bas">
		<div class="balises-foot-code">
			<?php include('balises/foot-code.php');?>
		</div>

		<div class="footer">
			<?php include('footer.php');?> 
		</div>
	</div>

</body>
</html>
