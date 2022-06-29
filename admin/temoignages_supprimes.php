<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Témoignages validés| Crypto Business</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/temoignages_valides.css">
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


					$temoignages = $bdd->prepare('SELECT * from temoignages WHERE statut_temoin = 2');
					$temoignages->execute(array());




					?>

					<!-- Mettre du html -->
					<!-- En tête du tableau -->
					<div>
						<h2>Les témoignages supprimés</h2>
					</div>
					<br/>
					<table class="table table-striped table-dark table-responsive">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Id</th>
								<th scope="col">Nom</th>
								<th scope="col">Prénoms</th>
								<th scope="col">Pays</th>
								<th scope="col">Témoignages</th>
								<th scope="col">Date</th>
								<th scope="col">Statut</th>
								<th scope="col">Modification</th>
							</tr>
						</thead>

						<tbody>

								<?php 

								while ($resultat = $temoignages->fetch()) 
								{	
									$id_temoignage = $resultat['id_t'];
									$name_temoin = $resultat['name_temoin'];
									$first_name_temoin = $resultat['first_name_temoin'];
									$pays_temoin = $resultat['pays_temoin'];
									$temoignage = $resultat['temoignage'];
									$date_temoignage = $resultat['date_post_temoin'];
									$statut = $resultat['statut_temoin'];
									
								?>


								<tr>
										<th scope="row" class="numero" id="numero"></th> 
										<td scope="row"><?php echo $id_temoignage ?></td>
										<td scope="row"><?php echo $name_temoin ?></td>
										<td scope="row"><?php echo $first_name_temoin ?></td>
										<td scope="row"><?php echo $pays_temoin ?></td>
										<td scope="row"><?php echo $temoignage ?></td>
										<td scope="row"><?php echo $date_temoignage ?></td>
										<td scope="row"><?php echo $statut ?></td>									
										<td scope="row"><a href="http://crypto.boss-arts.com/admin/modifier_temoignage.php?id=<?php echo $_SESSION['id'];?>&id_temoignage=<?php echo $id_temoignage;?>">Modifier</a></td>

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