<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Modifier utilisateurs| Crypto Business</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/modifier_utilisateurs.css">
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


					if (isset($_GET['id_utilisateur']) AND $_GET['id_utilisateur'] > 0) 
					{
						$getid_utilisateur = intval($_GET['id_utilisateur']);

						$users = $bdd->prepare('SELECT * from users WHERE id = ?');
						$users->execute(array($getid_utilisateur));
						$user_mod = $users->fetch();

						$id_utilisateur = $user_mod['id'];
						$user_name = $user_mod['name'];
						$user_first_name = $user_mod['first_name'];
						$user_email = $user_mod['email'];
						$user_pays = $user_mod['pays'];
						$user_phone = $user_mod['phone'];
						$user_avatar = $user_mod['avatar'];
						$user_confirme = $user_mod['confirme'];

						if ($getid_utilisateur = 1) 
						{

							if (isset($_POST['mettre_ajour'])) 
							{
								$new_name = htmlentities($_POST['name']);
								$new_first_name = htmlentities($_POST['first_name']);
								$new_email = htmlentities($_POST['email']);
								$new_pays = htmlentities($_POST['pays']);
								$new_phone = htmlentities($_POST['phone']);
								$new_confirme = htmlentities($_POST['confirme']);


								$update_user = $bdd->prepare('UPDATE users SET name = ?, first_name = ?, email = ?, pays = ?, phone = ?, confirme = ? WHERE id = ?');
								$update_user->execute(array($new_name, $new_first_name, $new_email, $new_pays, $new_phone, $new_confirme, $id_utilisateur));

								if ($update_user) 
								{
									$note = "Information du contact modifié avec succès.";
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
								<legend>Compte de <?php echo $user_name; ?> <?php echo $user_first_name; ?> </legend>

								<form method="POST">

								<span class="info">Nom:</span>
								<input type="text" class="name" name="name" value="<?php echo $user_name; ?>"> <br/><br/>

								<span class="info">Prénom:</span>
								<input type="text" class="name" name="first_name" value="<?php echo $user_first_name; ?>"> <br/><br/>

								<span class="info">Email:</span>
								<input type="text" class="name" name="email" value="<?php echo $user_email; ?>"> <br/><br/>

								<span class="info">Pays:</span>
								<input type="text" class="name" name="pays" value="<?php echo $user_pays; ?>"> <br/><br/>

								<span class="info">Téléphone:</span>
								<input type="text" class="name" name="phone" value="<?php echo $user_phone; ?>"> <br/><br/>

								<span class="info">Confirme:</span>
								<input type="text" class="name" name="confirme" value="<?php echo $user_confirme; ?>"> <br/><br/>

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