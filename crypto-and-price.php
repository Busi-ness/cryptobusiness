<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/crypto-and-price.css">
	<title>Liste des cryptomonnaies</title>
</head>
<body>
	
<div class="menu">
		<?php

		include('bdd_config.php');

		//inclure le type de menu
		include('menu-home.php');
	?>
</div> <br/>

	<div class="all-cryptos">

		<?php

		if (isset($_POST['mise-ajour'])) 
		{

			$crypto_btc = $_POST['btc'];
			$crypto_eth = $_POST['eth'];
			$crypto_bnb = $_POST['bnb'];
			$crypto_sol = $_POST['sol'];
			$crypto_dot = $_POST['dot'];
			$crypto_avk = $_POST['avk'];
			$crypto_ltc = $_POST['ltc'];
			$crypto_trx = $_POST['trx'];
			$crypto_cake = $_POST['cake'];
			$crypto_usdt_trc20 = $_POST['usdt_trc20'];
			$crypto_usdt_erc20 = $_POST['usdt_erc20'];
			$crypto_usdt_bep20 = $_POST['usdt_bep20'];
			$crypto_doge = $_POST['doge'];
			$crypto_bbdoge = $_POST['bbdoge'];
			$crypto_shib_erc20 = $_POST['shib_erc20'];
			$crypto_shib_bep20 = $_POST['shib_bep20'];
			$crypto_shinja = $_POST['shinja'];
			$crypto_raca_bep20 = $_POST['raca_bep20'];
			$crypto_uni = $_POST['uni'];
			$crypto_ada = $_POST['ada'];

			$cryptobdd = $bdd->prepare('SELECT * from liste_crypto');
			$cryptobdd->execute(array());
			/*$cryptoinfo = $cryptobdd->fetch()*/

			while ($cryptoinfo = $cryptobdd->fetch()) 
					{	
						$id_crypto = $cryptoinfo['id_crypto'];
						$prix_usd_crypto = $crypto_btc;

						echo "$id_crypto";



			$updatecrypto = $bdd->prepare("UPDATE liste_crypto SET prix_usd_crypto = ? WHERE id_crypto = ?");
                $updatecrypto->execute(array($prix_usd_crypto, $id_crypto));

                echo "Mise  jour des prix effectuée avec succès";
}

		}


		?>


		<div class="all-cryptos">

			<form action="" method="POST">

				<label for="btc">BTC Bitcoin</label>
				<input type="text" id="btc" name="btc" value="<?php echo $cryptoinfo['prix_usd_crypto'] ?>"> <br/><br/>

				<label for="eth">ETH Ethereum</label>
				<input type="text" id="eth" name="eth" > <br/><br/>

				<label for="bnb">BNB Binance coin</label>
				<input type="text" id="bnb" name="bnb" > <br/><br/>

				<label for="sol">SOL Solana</label>
				<input type="text" id="sol" name="sol" > <br/><br/>

				<label for="dot">DOT Polkadot</label>
				<input type="text" id="dot" name="dot"> <br/><br/>

				<label for="avk">AVAX Avalanche</label>
				<input type="text" id="avk" name="avk"> <br/><br/>

				<label for="ltc">LTC Litecoin</label>
				<input type="text" id="ltc" name="ltc"> <br/><br/>

				<label for="trx">TRX Tron</label>
				<input type="text" id="trx" name="trx"> <br/><br/>

				<label for="cake">CAKE Pancakeswap</label>
				<input type="text" id="cake" name="cake"> <br/><br/>

				<label for="usdt_trc20">USDT TetherUSD (TRC20)</label>
				<input type="text" id="usdt_trc20" name="usdt_trc20"> <br/><br/>

				<label for="usdt_erc20">USDT TetherUSD (ERC20)</label>
				<input type="text" id="usdt_erc20" name="usdt_erc20"> <br/><br/>

				<label for="usdt_bep20">USDT TetherUSD (BEP20 BSC)</label>
				<input type="text" id="usdt_bep20" name="usdt_bep20"> <br/><br/>

				<label for="doge">DOGE Dogecoin</label>
				<input type="text" id="doge" name="doge"> <br/><br/>

				<label for="bbdoge">BABYDOGE Babydoge coin</label>
				<input type="text" id="bbdoge" name="bbdoge"> <br/><br/>

				<label for="shib_erc20">SHIB Shiba inu (ERC20)</label>
				<input type="text" id="shib_erc20" name="shib_erc20"> <br/><br/>

				<label for="shib_bep20">SHIB Shiba inu (BEP20)</label>
				<input type="text" id="shib_bep20" name="shib_bep20"> <br/><br/>

				<label for="shinja">SHINJA Shibnobi (ERC20)</label>
				<input type="text" id="shinja" name="shinja"> <br/><br/>

				<label for="raca_bep20">RACA Radio Caca BEP20(BSC)</label>
				<input type="text" id="raca_bep20" name="raca_bep20"> <br/><br/>

				<label for="uni">UNI Uniswap</label>
				<input type="text" id="uni" name="uni"> <br/><br/>

				<label for="ada">ADA Cardano</label>
				<input type="text" id="ada" name="ada"> <br/><br/>

				<button type="submit" name="mise-ajour">Mettre à jour</button>



			</form>
		</div>

		BTC Bitcoin
		ETH Ethereum
		BNB Binance coin
		SOL Solana
		DOT Polkadot
		AVAX Avalanche
		LTC Litecoin
		TRX Tron
		CAKE Pancakeswap
		USDT TetherUSD (TRC20)
		USDT TetherUSD (ERC20)
		USDT TetherUSD (BEP20 BSC)
		DOGE Dogecoin
		BABYDOGE Babydoge coin
		SHIB Shiba inu (ERC20)
		SHIB Shiba inu (BEP20)
		SHINJA Shibnobi (ERC20)
		RACA Radio Caca BEP20(BSC)
		UNI Uniswap
		ADA Cardano



		Crypto-monnaies principales

		<iframe src="https://fr.widgets.investing.com/top-cryptocurrencies?theme=darkTheme&hideTitle=false&roundedCorners=true" width="100%" height="600" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0"></iframe><div class="poweredBy" style="font-family: Arial, Helvetica, sans-serif;">Promu par <a href="https://fr.investing.com?utm_source=WMT&amp;utm_medium=referral&amp;utm_campaign=TOP_CRYPTOCURRENCIES&amp;utm_content=Footer%20Link" target="_blank" rel="nofollow">Investing.com</a></div>


		Convertisseur de devises

		<iframe height="375" width="197" src="https://ssltools.investing.com/currency-converter/index.php?from=17&to=12&force_lang=5"></iframe><br /><table width="197"><tr><td><span style="font-size: 11px;color: #333333;text-decoration: none;">Convertisseur de devises fourni par <a href="https://fr.investing.com/" rel="nofollow" target="_blank" style="font-size: 11px;color: #06529D; font-weight: bold;" class="underline_link">Investing.com France</a>.</span></td></tr></table>

		Widget pour les taux en direct des cryptomonnaies 

		<iframe src="https://fr.widgets.investing.com/crypto-currency-rates?theme=darkTheme&roundedCorners=true&pairs=945629,997650,1001803,1010773,1010776,1031068,1058450,1070733,1141246,1141240,1141244,1062274" width="100%" height="100%" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0"></iframe><div class="poweredBy" style="font-family: Arial, Helvetica, sans-serif;">Promu par <a href="https://fr.investing.com?utm_source=WMT&amp;utm_medium=referral&amp;utm_campaign=CRYPTO_CURRENCY_RATES&amp;utm_content=Footer%20Link" target="_blank" rel="nofollow">Investing.com</a></div>

	</body>
	</html>
