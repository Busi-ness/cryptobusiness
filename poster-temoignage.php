<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Poster témoignage | Crypto Business</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/poster-temoignage.css">
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


	<?php


	include_once('cookieconnect.php');

	if (isset($_GET['id']) AND $_GET['id'] > 0) 
	{
		$getid = intval($_GET['id']);

		$userbdd = $bdd->prepare('SELECT * from users WHERE id = ?');
		$userbdd->execute(array($getid));
		$userinfo = $userbdd->fetch();

		if ($getid = $_SESSION['id']) 
		{

			$id = $userinfo['id'];

			if ($getid = $id) 
			{
				$id_temoin = $_SESSION['id'];
				$name_temoin = $userinfo['name'];
				$first_name_temoin = $userinfo['first_name'];
				$avatar_temoin = $userinfo['avatar'];
				$pays = $userinfo['pays'];
				date_default_timezone_set('Africa/Johannesburg');


				if (isset($_POST['poster']))
				{
					if (isset($_POST['temoignage']) AND !empty($_POST['temoignage'])) 
					{

						$temoignage = htmlentities($_POST['temoignage']);

						$lenghtemoignage = strlen($temoignage);

						if ($lenghtemoignage <= 255) 
						{
						//insérer le témoignage dans la base de donnée
							$temoignagebdd = $bdd->prepare("INSERT INTO temoignages (id_temoin, temoignage, name_temoin, first_name_temoin, avatar_temoin, pays_temoin, date_post_temoin, statut_temoin) VALUES(?,?,?,?,?,?,?,?)");
							$temoignagebdd->execute(array($id_temoin, $temoignage, $name_temoin, $first_name_temoin, $avatar_temoin, $pays, date('m-d-Y h:i:s a', time()), '0'));
							$note = "Merci beaucoup $name_temoin $first_name_temoin pour votre témoignage";

						}else
						{
		 	//else3 le temoignage est trop long
							$error = "Votre témoignage ne doit pas dépasser 255 caractères";
						}


					}else
					{
		//else2 textarea vide
						$error = "Veuillez écrire quelque chose dans la case de témoignage";
					}



				}else
				{
	//else1
				}

				?>
				<br/><br/>
				<div class="bloc-comment">
					<div class="formgroup"> <br/>
						<h2 class="titre">Poster un temoignage</h2> <br/>
						<form action="" method="POST">
							<p><span>Mettez votre commentaire ici</span></p> 
							<label for="temoignage">
								<textarea name="temoignage" cols="30" rows="10" class="temoignage" id="temoignage" placeholder="Commencez par écrire quelque chose" autofocus maxlength="255"></textarea> <br/>
							</label>

							<div class="error">
								<?php
								if (isset($error)) 
								{
									?>
									<img src="logos/error.png" alt="Error"><br>
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
									<img src="logos/ok.png" alt="Note"><br>
									<?php
									echo $note;
								}
								?>
							</div><br/>

							<button type="submit" name="poster" class="poster">Poster témoignage</button> <br/>

						</form>
					</div>



				</div>

				<?php


			}else
			{
      //else si l'id est différent de l'id de session
				header('Location: http://crypto.boss-arts.com/connexion.php');
			}


		}else
		{
      //else si l'id est différent de l'id de session
			header('Location: http://crypto.boss-arts.com/connexion.php');
		}



	}else
	{
     //else si l'id n'existe pas
		header('Location: http://crypto.boss-arts.com/connexion.php');
	}


	?>


	

	<script type="text/javascript">
		const textarea = document.querySelector('textarea');
		const counter = document.querySelector('label span');
		const maxLength = textarea.getAttribute('maxlength');

		textarea.addEventListener('textarea', event => {
			const valueLength = event.target.value.length;

			const leftChartLength = maxLength - valueLength;

			if (leftCharLength < 0) return;

			counter.innerText = leftCharLength;
		});



		
	</script>
	
</body>
</html>
