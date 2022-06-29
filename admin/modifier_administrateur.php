<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Modifier Administrateur | Crypto Business</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/modifier_administrateur.css">
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


					if (isset($_GET['id_administrateur']) AND $_GET['id_administrateur'] > 0) 
					{
						$getid_administrateur = intval($_GET['id_administrateur']);

						$administrateurs = $bdd->prepare('SELECT * from users_admins WHERE id = ?');
						$administrateurs->execute(array($getid_administrateur));
						$administrateur_mod = $administrateurs->fetch();

						$id_administrateur = $administrateur_mod['id'];
						$admin_name = $administrateur_mod['name'];
						$admin_first_name = $administrateur_mod['first_name'];
						$admin_email = $administrateur_mod['email'];
						$admin_avatar = $administrateur_mod['avatar'];
						$admin_pays = $administrateur_mod['pays'];
						$admin_phone = $administrateur_mod['phone'];
						$admin_confirme = $administrateur_mod['confirme'];


						if ($getid_administrateur = $id_administrateur) 
						{

							if (isset($_POST['mettre_ajour'])) 
							{
								$new_name = htmlentities($_POST['name']);
								$new_first_name = htmlentities($_POST['first_name']);
								$new_email = htmlentities($_POST['email']);
								$new_pays = htmlentities($_POST['pays']);
								$new_phone = htmlentities($_POST['phone']);



								$update_administrateur = $bdd->prepare('UPDATE users_admins SET name = ?, first_name = ?, email = ?, pays = ?, phone = ? WHERE id = ?');
								$update_administrateur->execute(array($new_name, $new_first_name, $new_email, $new_pays, $new_phone, $id_administrateur));

								if ($update_administrateur) 
								{
									$note = "Information administrateur modifiée avec succès.";
								}else
								{
									$error = "Une erreur s'est produite";
								}
								


							}


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
								<legend>Administrateur <?php echo $admin_name; ?> <?php echo $admin_first_name; ?> </legend>

								<form method="POST">

								<span class="info">Nom:</span>
								<input type="text" class="name" name="name" value="<?php echo $admin_name; ?>"> <br/><br/>

								<span class="info">Prénom:</span>
								<input type="text" class="name" name="first_name" value="<?php echo $admin_first_name; ?>"> <br/><br/>

								<span class="info">Email:</span>
								<input type="text" class="name" name="email" value="<?php echo $admin_email; ?>"> <br/><br/>

						
								<span class="info">Pays:</span>
								<input type="text" class="name" name="pays" value="<?php echo $admin_pays; ?>"> <br/><br/>

								<span class="info">Téléphone:</span>
								<input type="text" class="name" name="phone" value="<?php echo $admin_phone; ?>"> <br/><br/>


								<button type="submit" name="mettre_ajour">Mettre à jour</button>
								</form>

							</fieldset>

							<?php


						}else
						{
							echo "Cet utilisateur n'existe pas";
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