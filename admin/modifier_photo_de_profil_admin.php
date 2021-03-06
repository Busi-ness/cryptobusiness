<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact | Crypto Business</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/modifier_photo_de_profil_admin.css">
	<?php include('balises/head-code.php');?>
	<link rel="icon" type="image/x-icon" href="logos/favicon_LOGO_CRYPTO_BUSINESS_SITE_WEB.ico">
</head>
<body>


	<div class="menu">
		<?php

		include('bdd_config.php');

		//inclure le type de menu
		include('menu-home.php');

		?>

		<br/><br/>

		<?php

		include_once('cookieconnect.php');


		if (isset($_GET['id']) AND $_GET['id'] > 0) 
		{
			$getid = intval($_GET['id']);

			$userbdd = $bdd->prepare('SELECT * from users_admins WHERE id = ?');
			$userbdd->execute(array($getid));
			$userinfo = $userbdd->fetch();

			if ($getid == $_SESSION['id']) 
			{

				$id = $userinfo['id'];

				if ($getid = $id) 
				{

					if (isset($_POST['valider'])) 
					{


						if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) 
						{
							$tailleMax = 2097151;
							$extensionsValides = array('jpg', 'jpeg', 'png');
							if ($_FILES['avatar']['size'] <= $tailleMax) 
							{
								$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
								if (in_array($extensionUpload, $extensionsValides)) 
								{
									$chemin = "users_admins/avatars/".$_SESSION['id'].".".$extensionUpload;		
									$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);

									if ($resultat) 
									{
										$updateavatar = $bdd->prepare('UPDATE users_admins SET avatar = :avatar WHERE id = :id');
										$updateavatar->execute(array(
											'avatar' => $_SESSION['id'].".".$extensionUpload,
											'id' => $_SESSION['id']

										));

										header('Location: http://crypto.boss-arts/admin/profil_admin.php?id='.$_SESSION['id']);
									}else
									{
										$error = "Erreur durant l'importation de votre profil";

									}
								}else
								{
									$error = "Votre photo de profil doit ??tre au format jpeg, jpeg ou png";

								}
							}else
							{
								$error = "Votre photo de profil ne doit pas d??passer 2Mo";

							}

						}else
						{
							$error = "Veuillez choisir une photo";
						}
					}


				}else
				{
			//else $_SESSION['id'] n'existe pas
					header('Location: http://crypto.boss-arts.com/admin/connexion.php');
				}


			}else
			{
			//else $_SESSION['id'] n'existe pas
				header('Location: http://crypto.boss-arts.com/admin/connexion.php');
			}



		}else
		{
		//else id n'existe pas
			header('Location: http://crypto.boss-arts.com/admin/connexion.php');
		}



		?>



		<div class="formgroup">
			<div class="entete"><br/>
				<h2>Changer photo de profil</h2>
				<hr><br/>

			</div>
			<form action="" method="POST" enctype="multipart/form-data">

				<label for="avatar" class="photo">Photo de profil</label> <br>
				<input class="avatar" id="avatar" type="file" name="avatar">

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

				<div class="form-row text-center">
					<div class="col-12"><br/>
						<button type="submit" class="btn btn-primary" name="valider">Mettre ?? jour</button>
					</div>
				</div><br/>
			</div>




			<?php include('balises/foot-code.php');?>
			<?php include('footer.php');?>
		</body>
		</html>