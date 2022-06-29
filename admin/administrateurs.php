<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Administrateurs | Crypto Business</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/administrateurs.css">
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



					$administrateurs = $bdd->prepare('SELECT * from users_admins');
					$administrateurs->execute(array());
					$useradmin = $administrateurs->fetch();


					$admin_grade = $bdd->prepare('SELECT * from users_admins WHERE id =?');
					$admin_grade->execute(array($_SESSION['id']));
					$useradmin_grade = $admin_grade->fetch();
					$grade = $useradmin_grade['admin_level'];

					echo $grade;




					?>

					<!-- Mettre du html -->
					<!-- En tête du tableau -->
					<div>
						<h2>Les administrateurs</h2>
					</div>
					<br/>
					<table class="table table-striped table-dark table-responsive">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Id</th>
								<th scope="col">Nom</th>
								<th scope="col">Prénoms</th>
								<th scope="col">Email</th>
								<th scope="col">Avatar</th>
								<th scope="col">Pays</th>
								<th scope="col">Téléphone</th>
								<th scope="col">Statut</th>
								<th scope="col">Date création compte</th>
								<th scope="col">Admin level</th>
								<th scope="col">Modification</th>
							</tr>
						</thead>

						<tbody>

							<?php 

							while ($resultat = $administrateurs->fetch()) 
							{	
								$id_admin = $resultat['id'];
								$name_admin = $resultat['name'];
								$first_name_admin = $resultat['first_name'];
								$email_admin = $resultat['email'];
								$avatar_admin = $resultat['avatar'];
								$pays_admin = $resultat['pays'];
								$phone_admin = $resultat['phone'];
								$statut_admin = $resultat['confirme'];
								$date_creation_admin = $resultat['date_creation_compte'];
								$admin_level = $resultat['admin_level'];


								?>


								<tr>
									<th scope="row" class="numero" id="numero"></th> 
									<td scope="row"><?php echo $id_admin ?></td>
									<td scope="row"><?php echo $name_admin ?></td>
									<td scope="row"><?php echo $first_name_admin ?></td>
									<td scope="row"><?php echo $email_admin ?></td>
									<td scope="row"><?php echo $avatar_admin ?></td>
									<td scope="row"><?php echo $pays_admin ?></td>
									<td scope="row"><?php echo $phone_admin ?></td>
									<td scope="row"><?php echo $statut_admin ?></td>
									<td scope="row"><?php echo $date_creation_admin ?></td>
									<td scope="row"><?php echo $admin_level ?></td>

									<td scope="row">

										<?php

										if ($grade == 2) 
										{


											?>

											<a href="http://crypto.boss-arts.com/admin/modifier_administrateur.php?id=<?php echo $_SESSION['id'];?>&id_administrateur=<?php echo $id_admin;?>">Modifier</a>

											<?php

													// code...
										}else
										{


											
											?>

											<?php
										}

										?>




									</td>

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