<!DOCTYPE html>
<html lang="en">
<head>
	<title>Transactions | Crypto Business</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css" />
	<link rel="stylesheet" href="css_perso/transactions.css" />
	<link rel="stylesheet" href="css_perso/details-transaction.css" />
	<?php include('balises/head-code.php');?>
	<link rel="icon" type="image/x-icon" href="logos/favicon_LOGO_CRYPTO_BUSINESS_SITE_WEB.ico">
</head>
<body>

	<?php

	for ( $n = 0; $n <= 10; $n++) 
		{ echo $n;}

	include('bdd_config.php');

	include('menu-home.php');

	include_once('cookieconnect.php');

	if (isset($_GET['user_id']) AND $_GET['user_id'] > 0) 
	{
		$getid = intval($_GET['user_id']);

		$userbdd = $bdd->prepare('SELECT * from users WHERE id = ?');
		$userbdd->execute(array($getid));
		$userinfo = $userbdd->fetch();		
		$_SESSION['id'] = $userinfo['id'];

		if ($getid = $_SESSION['id']) 
		{

    	//on se connecte à la base de données pour récuprer les transactions en rapport avec cet utilisateur
			$id_user = $userinfo['id'];
			$name = $userinfo['name'];
			$first_name = $userinfo['first_name'];
			$email = $userinfo['email'];


			$trbdd = $bdd->prepare('SELECT * from transactions WHERE id_user_tr = ?');
			$trbdd->execute(array($id_user));

			?>

			<!-- En tête du tableau -->
			<div>
				<h2>Vos transactions</h2>
			</div>
			<br/>
			<table class="table table-striped table-dark table-responsive">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Id transaction</th>
						<th scope="col">Type</th>
						<th scope="col">Status Paiement</th>
						<th scope="col">Status Confirmation</th>
					</tr>
				</thead>
				<tbody>
			
					<?php




					while ($trinfo = $trbdd->fetch()) 
					{	
						$id_tr = $trinfo['id_transaction'];
						$name_tr = $trinfo['name_tr'];
						$first_name_tr = $trinfo['first_name_tr'];
						$email_tr = $trinfo['email_tr'];
						$type_tr = $trinfo['type_tr'];
						$cryptomonnaie = $trinfo['cryptomonnaie'];
						$prix_dollars = $trinfo['prix_fcfa'];
						$statut = $trinfo['statut_feda'];
						$statut_envoi = $trinfo['statut_envoi'];



						?>

						<tr>
							<th scope="row" class="numero" id="numero"></th> 
							<!-- <td><a href="">Hi</a></td> -->
							<td scope="row"><a href="http://crypto.boss-arts.com/details-transaction.php?user_id=<?php echo $_SESSION['id'];?>&id_transaction=<?php echo $id_tr;?>"><?php echo $id_tr;?></a></td>
							<td scope="row"><?php echo $type_tr;?></td>
							<td>

								<?php if ($statut == "approved")
{
?>
<span class="status-approved"><?php echo $statut ?></span>
<?php
}else
{
?>
<span class="status-pending"><?php echo $statut ?></span>
<?php
	
}


 ?>
								


							</td>

<td>

								<?php if ($statut_envoi == "approved")
{
?>
<span class="status-approved"><?php echo $statut_envoi ?></span>
<?php
}else
{
?>
<span class="status-pending"><?php echo $statut_envoi ?></span>
<?php
	
}


 ?>
								


							</td>
						</tr>
						




						<!-- Mettre les infos -->
						<?php
					}

				?>
				</a>
			</tbody>


			</table>
			<?php
			


		}else
		{
				//else si l'id est différent de l'id de session
			header('Location: http://crypto.boss-arts.com/connexion.php');
		}



	}else
	{
			//else si l'id n'est pas dans la base de données
		header('Location: http://crypto.boss-arts.com/connexion.php');
	}


	?>


</body>
</html>