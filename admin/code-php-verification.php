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
				


				?>
				
				<!-- Mettre du html -->




				<?php 

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