<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Modifier transaction | Crypto Business</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/modifier_transactions.css">
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

					$admin_email = $userinfo['email'];


					if (isset($_GET['id_transaction']) AND $_GET['id_transaction'] > 0) 
					{
						$getid_transaction = intval($_GET['id_transaction']);

						$transactions = $bdd->prepare('SELECT * from transactions WHERE id_transaction = ?');
						$transactions->execute(array($getid_transaction));
						$resultat = $transactions->fetch();

						$id_tr = $resultat['id_transaction'];
						$name_tr = $resultat['name_tr'];
						$first_name_tr = $resultat['first_name_tr'];
						$email_tr = $resultat['email_tr'];
						$iso_p = $resultat['iso_p'];								
						$phone_tr = $resultat['phone'];
						$type_tr = $resultat['type_tr'];
						$cryptomonnaie = $resultat['cryptomonnaie'];
						$adresse = $resultat['adresse'];
						$prix_fcfa = $resultat['prix_fcfa'];
						$prix_dollars = $resultat['prix_dollars'];
						$statut_feda = $resultat['statut_feda'];
						$statut_envoi = $resultat['statut_envoi'];
						$approbation = $resultat['approved_by'];
						$date_tr = $resultat['date_creation_transaction'];
						$termine_tr = $resultat['termine_tr'];
						$photo_envoi = $resultat['photo_envoi'];
						$date_approbation = $resultat['date_approbation'];
						date_default_timezone_set('Africa/Johannesburg');

						if ($getid_transaction = $id_tr) 
						{

							if (isset($_POST['mettre_ajour'])) 
							{
								

								if (isset($_FILES['new_photo']) AND !empty($_FILES['new_photo']['name'])) 
								{
									
									$tailleMax = 2097151;
									$extensionsValides = array('jpg', 'jpeg', 'png');
									if ($_FILES['new_photo']['size'] <= $tailleMax) 
									{
										$extensionUpload = strtolower(substr(strrchr($_FILES['new_photo']['name'], '.'), 1));
										if (in_array($extensionUpload, $extensionsValides)) 
										{
											$chemin = "captures_transactions/captures/transaction_".$id_tr.".".$extensionUpload;		
											$resultat = move_uploaded_file($_FILES['new_photo']['tmp_name'], $chemin);

											if ($resultat) 
											{

												$new_photo = "transaction_".$id_tr.".".$extensionUpload;
												$new_statut_envoi = "1";
												$new_approved_by = $admin_email;
												$new_termine_tr = "1";

												/*echo $new_photo;
												echo $new_statut_envoi;
												echo $new_approved_by;
												echo $new_termine_tr;*/

												$update_transaction = $bdd->prepare('UPDATE transactions SET statut_envoi = ?, approved_by = ?, termine_tr = ?, photo_envoi = ? , date_approbation =? WHERE id_transaction = ? ');
												$update_transaction->execute(array($new_statut_envoi, $new_approved_by, $new_termine_tr, $new_photo, date('m-d-Y h:i:s a', time()), $id_tr));

												if ($update_transaction) 
												{
													$note = "Informations de transaction modifiées avec succès.";

													/*header('Location: http://crypto.boss-arts.com/admin/transactions_validees.php?id='.$_SESSION['id']);*/



									//Envoyer un email pour dire que la transaction a été appouvée et validée avec la new_photo d'écran


												}else
												{
													$error = "Une erreur s'est produite";
												}

											}else
											{
												// l'importation n'a as marché
												$error = "Erreur durant l'importation de la capture";

											}
										}else
										{
											$error = "La new_photo doit être au format jpeg, jpeg ou png";

										}
									}else
									{
										$error = "La capture ne doit pas dépasser 2Mo";
										

									}

								}else
								{
									$error = "Veuillez choisir une capture";
								}



							} // si le bouton mettre à jour n'a pas été cliqué


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

							<fieldset>
								<legend>Transaction No <?php echo $id_tr; ?> de <?php echo $name_tr; ?> <?php echo $first_name_tr; ?> </legend>

								<form method="POST" class="all-form" enctype="multipart/form-data">

									<span class="info">Type de transaction:</span> 
									<span class="libelle"><?php echo $type_tr; ?></span>
									<br/><br/>

									<span class="info">Statut Fedapay:</span>
									<span class="libelle"><?php echo $statut_feda; ?></span>
									<br/><br/>

									<span class="info">Statut Envoi:</span> 
									<span class="libelle"><?php echo $statut_envoi; ?></span>
									<br/><br/>

									<span class="info">Date de la transaction:</span> 
									<span class="libelle"><?php echo $date_tr; ?></span>
									<br/><br/>

									<span class="info">Iso Pays:</span> 
									<span class="libelle"><?php echo $iso_p; ?></span>
									<br/><br/>

									<span class="info">Email:</span> 
									<span class="libelle"><?php echo $email_tr; ?></span>
									<br/><br/>

									<span class="info">Téléphone/Whatsapp:</span> 
									<span class="libelle"><?php echo $phone_tr; ?></span>
									<br/><br/>

									<span class="info">Capture d'écran:</span>
									<input type="file" class="new_photo" name="new_photo"> <br/><br/>
									<input class="avatar" id="avatar" type="file" name="avatar">



									<button type="submit" name="mettre_ajour">Valider la transaction</button>
								</form>

							</fieldset>

							<?php


						}else
						{
						//else si l'id de la transaction n'est pas dans la base de données
							echo "Cette transaction n'existe pas";
						}


					}else
					{
					// else si l'id de la transaction existe et >0
						header('Location: http://crypto.boss-arts.com/admin/connexion.php');
					}


				}else
				{
				//else si getid est différent de la varible de session
					header('Location: http://crypto.boss-arts.com/admin/connexion.php');
				}


			}else
			{
			//else si la varible de session n'existe pas
				header('Location: http://crypto.boss-arts.com/admin/connexion.php');
			}


		}else
		{
		//else getid différent de id dans la base de données
			echo "Ce administrateur n'existe pas";
		}

	}else
	{

	//else id n'est pas bon
		header('Location: http://crypto.boss-arts.com/admin/connexion.php');

	}


	?>





</body>
</html>