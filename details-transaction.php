<!DOCTYPE html>
<html lang="en">
<head>
	<title>Détails transactions | Crypto Business</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css" />
	<link rel="stylesheet" href="css_perso/details-transaction.css" />
	<?php include('balises/head-code.php');?>
	<link rel="icon" type="image/x-icon" href="logos/favicon_LOGO_CRYPTO_BUSINESS_SITE_WEB.ico">
</head>
<body>

	<?php

	include('bdd_config.php');

	include('menu-home.php');

	include_once('cookieconnect.php');

	if (isset($_GET['user_id']) AND $_GET['user_id'] > 0) 
	{
		$getid = intval($_GET['user_id']);

		if (isset($_GET['id_transaction']) AND $_GET['id_transaction'] > 0) 
		{
			$getid_tr = intval($_GET['id_transaction']);


			$userbdd = $bdd->prepare('SELECT * from users WHERE id = ?');
			$userbdd->execute(array($getid));
			$userinfo = $userbdd->fetch();

			$trbdd = $bdd->prepare('SELECT * from transactions WHERE id_transaction = ?');
			$trbdd->execute(array($getid_tr));
			$trinfo = $trbdd->fetch();


			if ($getid = $userinfo['id'] AND $getid_tr = $trinfo['id_transaction']) 
			{

				$id_tr = $trinfo['id_transaction'];
				$name_tr = $trinfo['name_tr'];
				$first_name_tr = $trinfo['first_name_tr'];
				$email_tr = $trinfo['email_tr'];
				$type_tr = $trinfo['type_tr'];
				$cryptomonnaie = $trinfo['cryptomonnaie'];
				$adresse = $trinfo['adresse'];
				$prix_dollars = $trinfo['prix_fcfa'];
				$statut = $trinfo['statut_feda'];
				$statut_envoi = $trinfo['statut_envoi'];
				$prix_dollars = $trinfo['prix_dollars'];


				?>
<br/>
				<fieldset>
					<legend>Détails de la transaction <span><?php echo $id_tr?></span></legend>
					<ul>
						<li>
							<span class="details-tr">Id de transaction:</span> <span class="donnes-tr"><?php echo $id_tr; ?></span>
						</li><br/>

						<li>
							<span class="details-tr">Type de transaction:</span> <span class="donnes-tr"><?php echo $type_tr; ?></span>
						</li><br/>

						<li>
							<span class="details-tr">Cryptomonnaie:</span> <span class="donnes-tr"><?php echo $cryptomonnaie; ?></span>
						</li><br/>

						<li>
							<span class="details-tr">Adresse de réception:</span> <span class="donnes-tr"><?php echo $adresse; ?></span>
						</li><br/>

						<li>
							<span class="details-tr">Prix en fcfa:</span> <span class="donnes-tr"><?php echo $cryptomonnaie; ?></span>
						</li><br/>

						<li>
							<span class="details-tr">Prix en dollars:</span> <span class="donnes-tr"><?php echo $prix_dollars; ?></span>
						</li><br/>

						<li>
							<span class="details-tr">Status de la transaction:</span> 

							<span class="donnes-tr"><?php if ($statut == "approved")
							{
								?>
								<span class="status-approved"><?php echo $statut ?></span>
								<?php
							}else
							{
								?>
								<span class="status-pending"><?php echo $statut ?></span>
								<?php

							}


							?>

						</span>
					</li><br/>

					<li>
							<span class="details-tr">Confirmation de la transaction:</span> 

							<span class="donnes-tr"><?php if ($statut_envoi == "approved")
							{
								?>
								<span class="status-approved"><?php echo $statut_envoi ?></span>
								<?php
							}else
							{
								?>
								<span class="status-pending"><?php echo $statut_envoi ?></span>
								<?php

							}


							?>

						</span>
					</li><br/>
					</ul>
					</fieldset>


					<!-- Mettre les infos -->
					<?php


				}else
				{
				//else si l'id est différent de l'id de session
					header('Location: http://localhost/crypto/connexion.php');
				}

			}
			else
			{
			//else si l'id n'est pas dans la base de données
				header('Location: http://localhost/crypto/connexion.php');
			}

		}else
		{
			//else si l'id n'est pas dans la base de données
			header('Location: http://localhost/crypto/connexion.php');
		}


		?>


	</body>
	</html>