<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Utilisateurs non confirmés| Crypto Business</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/utilisateurs_non_confirmes.css">
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


					$users = $bdd->prepare('SELECT * from users WHERE confirme = 0');
					$users->execute(array());




					?>

					<!-- Mettre du html -->
					<!-- En tête du tableau -->
					<div>
						<h2>Les utilisateurs non confirmés</h2>
					</div>
					<br/>
					<table class="table table-striped table-dark table-responsive">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Id</th>
								<th scope="col">Nom</th>
								<th scope="col">Prénom</th>
								<th scope="col">Email</th>
								<th scope="col">Pays</th>
								<th scope="col">Numéro</th>
								<th scope="col">Avatar</th>
								<th scope="col">Confirme</th>
								<th scope="col">Date création compte</th>
								<th scope="col">Modification</th>
							</tr>
						</thead>

						<tbody>

								<?php 

								while ($resultat = $users->fetch()) 
								{	
									$id_utilisateur = $resultat['id'];
									$name_utilisateur = $resultat['name'];
									$first_name_utilisateur = $resultat['first_name'];
									$email_utilisateur = $resultat['email'];
									$pays_utilisateur = $resultat['pays'];
									$phone_utilisateur = $resultat['phone'];
									$avatar_utilisateur = $resultat['avatar'];
									$confirme_utilisateur = $resultat['confirme'];
									$date_creation_compte_utilisateur = $resultat['date_creation_compte'];
									
								?>


								<tr>
										<th scope="row" class="numero" id="numero"></th> 
										<td scope="row"><?php echo $id_utilisateur ?></td>
										<td scope="row"><?php echo $name_utilisateur ?></td>
										<td scope="row"><?php echo $first_name_utilisateur ?></td>
										<td scope="row"><?php echo $email_utilisateur ?></td>
										<td scope="row"><?php echo $pays_utilisateur ?></td>
										<td scope="row"><?php echo $phone_utilisateur ?></td>
										<td scope="row"><img src=".../users/avatars/<?php echo $avatar_utilisateur ?>" alt="<?php echo $avatar_utilisateur ?>"  class="avatar" ></td>
										<td scope="row"><?php echo $confirme_utilisateur ?></td>
										<td scope="row"><?php echo $date_creation_compte_utilisateur ?></td>
										<td scope="row"><a href="http://crypto.boss-arts.com/admin/modifier_utilisateur.php?id=<?php echo $_SESSION['id'];?>&id_utilisateur=<?php echo $id_utilisateur;?>">Modifier</a></td>

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