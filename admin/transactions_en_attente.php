<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Transactions en attente| Crypto Business</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/transactions_en_attente.css">
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


					$transactions = $bdd->prepare('SELECT * from transactions WHERE termine_tr = 0');
					$transactions->execute(array());




					?>

					<!-- Mettre du html -->
					<!-- En tête du tableau -->
					<div>
						<h2>Les transactions en attente</h2>
					</div>
					<br/>
					<table class="table table-striped table-dark table-responsive">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Id transaction</th>
								<th scope="col">Nom</th>
								<th scope="col">Prénoms</th>
								<th scope="col">Email</th>
								<th scope="col">Pays</th>
								<th scope="col">Phone</th>
								<th scope="col">Type transaction</th>
								<th scope="col">Cryptomonnaie</th>
								<th scope="col">Adresse</th>
								<th scope="col">Prix fcfa</th>
								<th scope="col">Prix dollars</th>
								<th scope="col">Statut feda</th>
								<th scope="col">Status envoie</th>
								<th scope="col">Approbation</th>
								<th scope="col">Date transaction</th>
								<th scope="col">Termine</th>
								<th scope="col">Capture</th>
								<th scope="col">Date approbation</th>
								<th scope="col">Modification</th>
							</tr>
						</thead>

						<tbody>

							<?php 

							while ($resultat = $transactions->fetch()) 
							{	
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

								?>


								<tr>
									<th scope="row" class="numero" id="numero"></th> 
									<td scope="row"><?php echo $id_tr ?></td>
									<td scope="row"><?php echo $name_tr ?></td>
									<td scope="row"><?php echo $first_name_tr ?></td>
									<td scope="row"><?php echo $email_tr ?></td>
									<td scope="row"><?php echo $iso_p ?></td>
									<td scope="row"><?php echo $phone_tr ?></td>
									<td scope="row"><?php echo $type_tr ?></td>
									<td scope="row"><?php echo $cryptomonnaie  ?></td>
									<td scope="row"><?php echo $adresse ?></td>
									<td scope="row"><?php echo $prix_fcfa ?></td>
									<td scope="row"><?php echo $prix_dollars ?></td>
									<td scope="row"><?php echo $statut_feda ?></td>
									<td scope="row"><?php echo $statut_envoi ?></td>
									<td scope="row"><?php echo $approbation ?></td>
									<td scope="row"><?php echo $date_tr ?></td>
									<td scope="row"><?php echo $termine_tr ?></td>
									<td scope="row"><?php echo $photo_envoi ?></td>
									<td scope="row"><?php echo $date_approbation ?></td>

																
									<td scope="row"><a href="http://crypto.boss-arts.com/admin/modifier_transaction.php?id=<?php echo $_SESSION['id'];?>&id_transaction=<?php echo $id_tr;?>">Modifier</a></td>

								</tr>




								<?php
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