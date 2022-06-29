<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Modifier Témoignage | Crypto Business</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/modifier_temoignages.css">
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


					if (isset($_GET['id_temoignage']) AND $_GET['id_temoignage'] > 0) 
					{
						$getid_temoignage = intval($_GET['id_temoignage']);

						$temoignages = $bdd->prepare('SELECT * from temoignages WHERE id_t = ?');
						$temoignages->execute(array($getid_temoignage));
						$temoignage_mod = $temoignages->fetch();

						$id_temoignage = $temoignage_mod['id_t'];
						$t_name = $temoignage_mod['name_temoin'];
						$t_first_name = $temoignage_mod['first_name_temoin'];
						$t_pays = $temoignage_mod['pays_temoin'];
						$temoignage = $temoignage_mod['temoignage'];
						$t_statut = $temoignage_mod['statut_temoin'];


						if ($getid_temoignage = $id_temoignage) 
						{

							if (isset($_POST['mettre_ajour'])) 
							{
								$new_t_name = htmlentities($_POST['name']);
								$new_t_first_name = htmlentities($_POST['first_name']);
								$new_t_pays = htmlentities($_POST['pays']);
								$new_temoignage = htmlentities($_POST['temoignage']);
								$new_t_statut = htmlentities($_POST['statut']);


								$update_temoignage = $bdd->prepare('UPDATE temoignages SET name_temoin = ?, first_name_temoin = ?, pays_temoin = ?, temoignage = ?, statut_temoin = ? WHERE id_t = ?');
								$update_temoignage->execute(array($new_t_name, $new_t_first_name, $new_t_pays, $new_temoignage, $new_t_statut, $id_temoignage));

								if ($update_temoignage) 
								{
									$note = "Information de témoignages modifié avec succès.";
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
								<legend>Témoignage de <?php echo $t_name; ?> <?php echo $t_first_name; ?> </legend>

								<form method="POST">

								<span class="info">Nom:</span>
								<input type="text" class="name" name="name" value="<?php echo $t_name; ?>"> <br/><br/>

								<span class="info">Prénom:</span>
								<input type="text" class="name" name="first_name" value="<?php echo $t_first_name; ?>"> <br/><br/>

						
								<span class="info">Pays:</span>
								<input type="text" class="name" name="pays" value="<?php echo $t_pays; ?>"> <br/><br/>

								<span class="info">Témoignage:</span>
								<textarea type ="text" rows="5" cols="25" class="name" name="temoignage"><?php echo $temoignage; ?></textarea> <br/><br/>

								<span class="info">Statut:</span>
								<input type="text" class="name" name="statut" value="<?php echo $t_statut; ?>"> <br/><br/>

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