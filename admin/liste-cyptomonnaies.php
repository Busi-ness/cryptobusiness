<!DOCTYPE html>
<html lang="en">
<head>
	<title>Liste des cryptomonnaies | Crypto Business</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css" />
	<link rel="stylesheet" href="css_perso/liste-crypotomonnaie.css" />
	<link rel="stylesheet" href="../css_perso/transactions.css" />
	<?php include('balises/head-code.php');?>
	<link rel="icon" type="image/x-icon" href="logos/favicon_LOGO_CRYPTO_BUSINESS_SITE_WEB.ico">
</head>
<body>

<?php

	include('bdd_config.php');

    //inclure le type de menu
    include('menu-home.php');


	$showcrypto = $bdd->prepare("SELECT * FROM liste_crypto");
	$showcrypto->execute();
	$cryptoinfo = $showcrypto->fetch();

	$id_crypto = $cryptoinfo['id'];
?>

<div class="all">
<div>
				<h2>Les cryptomonnaies</h2>
</div>
			<br/>
<form method="POST">
			<table class="table table-striped table-dark table-responsive">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Id cryptomonnaie</th>
						<th scope="col">Nom cryptomonnaie</th>
						<th scope="col">Prix dollars</th>
						<th scope="col">Status cryptomonnaie</th>
					</tr>
				</thead>
				<tbody>
					
					<?php




					while ($cryptoinfo = $showcrypto->fetch()) 
					{	
						$id_crypto = $cryptoinfo['id'];
						$nom_crypto = $cryptoinfo['nom_crypto'];
						$prix_dollars = $cryptoinfo['prix_dollars'];
						$status_crypto = $cryptoinfo['status_crypto'];



						?>

						<tr>
							<td id="numero"></td>
							<td scope="row"><a href="http://crypto.boss-arts.com/details-transaction.php?user_id=<?php echo $_SESSION['id'];?>&id_transaction=<?php echo $id_crypto;?>"><?php echo $id_crypto;?></a></td>
							<td scope="row"><?php echo $nom_crypto;?></td>
							<td scope="row">
								<input type="text" name="miseajour_prix" value="<?php echo $prix_dollars;?>">
							</td>
							<td>

								<?php if ($status_crypto == "1")
{
?>
<span class="status-approuved"><input type="number" name="miseajour_status_crypto" value="<?php echo $status_crypto ?>"></span>
<?php
}else
{
?>
<span class="status-pending"><input type="number" name="miseajour_status_crypto" value="<?php echo $status_crypto ?>"></span>
<?php
	
}


 ?>
								


							</td>
						</tr>
						




						<!-- Mettre les infos -->
						<?php
					}

				?>
			
			</tbody>


			</table>
<div>
	<button type="submit" name="miseajour">Mettre à jour</button>
</div>

</form>
</div>

<?php

if (isset($_POST['miseajour'])) 
{
	echo "Salut";

	$new_prix_dollars = $_POST['miseajour_prix'];
	$new_status_crypto = $_POST['miseajour_status_crypto'];

	echo $new_prix_dollars;
	echo $new_status_crypto;



}

?>
</body>
</html>