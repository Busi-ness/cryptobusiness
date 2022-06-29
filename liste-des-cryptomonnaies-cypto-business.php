<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Liste des cryptomonnaies disponible sur la plateforme | Crypto Business</title>
	<meta name="description" content="Une liste des cryptomonnaies disponible sur la plateforme. Inscrivez-vous et commencez par acheter et vendre" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/liste-des-cryptomonnaies-cypto-business.css">
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
</div> <br/>

<div>


	<div class="all-cryptos">

		<h2 class="titre-liste" style="text-align: center;">LISTE DES CRYPTOMONNAIES DISPONIBLE SUR NOTRE PLATEFORME ET LES PRIX</h2>

					<table class="table table-striped table-dark table-responsive">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Id cryptomonnaie</th>
						<th scope="col">Cryptomonnaie</th>
						<th scope="col">Prix en dollars</th>
					</tr>
				</thead>
				<tbody>

					<?php

$cryptobdd = $bdd->prepare('SELECT * from liste_crypto');
		$cryptobdd->execute(array());

					while ($cryptoinfo = $cryptobdd->fetch()) 
					{	
						$nom_crypto = $cryptoinfo['nom_crypto'];
						$id_crypto = $cryptoinfo['id_crypto'];
						$prix_usd_crypto = $cryptoinfo['prix_usd_crypto'];



						?>

						<tr>
							<th scope="row" class="numero" id="numero"></th> 
							<!-- <td><a href="">Hi</a></td> -->
							<td scope="row"><?php echo $id_crypto;?></td>
							<td scope="row"><?php echo $nom_crypto;?></td>
							<td scope="row"><?php echo $prix_usd_crypto;?></td>
						</tr>
					<?php 
				}
					?>
			</tbody>
			</table>


	<!-- <form action="" method="POST">

		<label for="btc">BTC Bitcoin</label>
		<input type="text" id="btc"> <br/><br/>

		<label for="eth">ETH Ethereum</label>
		<input type="text" id="eth"> <br/><br/>

		<label for="bnb">BNB Binance coin</label>
		<input type="text" id="bnb"> <br/><br/>

		<label for="sol">SOL Solana</label>
		<input type="text" id="sol"> <br/><br/>

		<label for="dot">DOT Polkadot</label>
		<input type="text" id="dot"> <br/><br/>

		<label for="avk">AVAX Avalanche</label>
		<input type="text" id="avk"> <br/><br/>

		<label for="ltc">LTC Litecoin</label>
		<input type="text" id="ltc"> <br/><br/>

		<label for="trx">TRX Tron</label>
		<input type="text" id="trx"> <br/><br/>

		<label for="cake">CAKE Pancakeswap</label>
		<input type="text" id="cake"> <br/><br/>

		<label for="usdt">USDT TetherUSD (TRC20)</label>
		<input type="text" id="usdt"> <br/><br/>

		<label for="usdt">USDT TetherUSD (ERC20)</label>
		<input type="text" id="usdt"> <br/><br/>

		<label for="usdt">USDT TetherUSD (BEP20 BSC)</label>
		<input type="text" id="usdt"> <br/><br/>

		<label for="doge">DOGE Dogecoin</label>
		<input type="text" id="doge"> <br/><br/>

		<label for="bbdoge">BABYDOGE Babydoge coin</label>
		<input type="text" id="bbdoge"> <br/><br/>

		<label for="shib">SHIB Shiba inu (ERC20)</label>
		<input type="text" id="shib"> <br/><br/>

		<label for="shib">SHIB Shiba inu (BEP20)</label>
		<input type="text" id="shib"> <br/><br/>

		<label for="shinja">SHINJA Shibnobi (ERC20)</label>
		<input type="text" id="shinja"> <br/><br/>

		<label for="eth">ETH Ethereum</label>
		<input type="text" id="eth"> <br/><br/>

		<label for="raca">RACA Radio Caca BEP20(BSC)</label>
		<input type="text" id="raca"> <br/><br/>

		<label for="uni">UNI Uniswap</label>
		<input type="text" id="uni"> <br/><br/>

		<label for="ada">ADA Cardano</label>
		<input type="text" id="ada"> <br/><br/>
		
	</form> -->
</div>
</div>


<div class="bas">
		<div class="balises-foot-code">
			<?php include('balises/foot-code.php');?>
		</div>

		<div class="footer">
			<?php include('footer.php');?> 
		</div>
	</div>

</body>
</html>