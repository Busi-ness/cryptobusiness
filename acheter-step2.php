<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include('balises/head-code.php');?>
	<link rel="icon" type="image/x-icon" href="logos/favicon_LOGO_CRYPTO_BUSINESS_SITE_WEB.ico">
	<title>Payer | Crypto Business</title>
</head>
<body>
	
</body>
</html>


<?php

session_start();

include('bdd_config.php');

if (isset($_POST['crypto']) AND !empty($_POST['crypto'])) 
{
	$crypto = $_POST['crypto'];
	$adresse = $_POST['adresse'];
	$montantfcfa = $_POST['montantfcfa'];


	if (isset($_GET['id']) AND $_GET['id'] > 0)
	{
		$getid = intval($_GET['id']);

		$userbdd = $bdd->prepare('SELECT * from users WHERE id = ?');
		$userbdd->execute(array($getid));
		$userinfo = $userbdd->fetch();
		$_SESSION['id'] = $userinfo['id'];
		$userphone = $userinfo['phone'];
		$userpays = $userinfo['pays'];

		if ($getid == $_SESSION['id']) 
		{
			$id = $userinfo['id'];


			if ($getid = $id) 
			{

		//détailler les données à utiliser
				$description = "Achat ".$crypto;
				$email = $userinfo['email'];
				$name = $userinfo['name'];
				$first_name = $userinfo['first_name'];
				$phone = $userinfo['phone'];
				$montantfcfa = $_POST['montantfcfa'];
				$montantdollars = $_POST['montantdollars'];
				date_default_timezone_set('Africa/Johannesburg');


				include ('codes-iso-pays.php');

//fichier feda

				include ('feda_code.php');

				/* Créer la transaction */
			/*$transaction = \FedaPay\Transaction::create(array(
				"description" => "Transaction: $description",
				"amount" => $montantfcfa,
				"currency" => ["iso" => "XOF"],
				"callback_url" => "http://crypto.boss-arts.com/statut-transaction.php",
				"customer" => [
					"firstname" => "$first_name",
					"lastname" => "$name",
					"email" => "$email",
					"phone_number" => [
						"number" => "$userphone",
						"country" => "bj"
					]
				]
			));*/

			/* Créer la transaction */
			$transaction = \FedaPay\Transaction::create(array(
				"description" => "$description",
				"amount" => $montantfcfa,
				"currency" => ["iso" => "XOF"],
				"callback_url" => "http://crypto.boss-arts.com/statut-transaction.php",
				"customer" => [
					"firstname" => $first_name,
					"lastname" => $name,
					"email" => $email,
					"phone_number" => [
						"number" => $phone,
						"country" => "$isop"
					]
				]
			));



			if ($transaction) 
			{
				$token = $transaction->generateToken();

				$transaction_id = $transaction->id;
				if ($token) 
				{

					include ('bdd_config.php');

					$type_tr = "Achat";
					$status_feda = "pending";
					$approved_by = "none";

					$insertr = $bdd->prepare("INSERT INTO transactions (id_user_tr, id_transaction, name_tr, first_name_tr, email_tr, iso_p phone, type_tr, cryptomonnaie, adresse, prix_fcfa, prix_dollars, status_feda, approved_by, date_creation_transaction) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
					$insertr->execute(array($_SESSION['id'], $transaction_id, $name, $first_name, $email, $isop, $phone, $type_tr, $crypto, $adresse, $montantfcfa, $montantdollars, $status_feda, $approved_by, date('m-d-Y h:i:s a', time())));
					echo "ça marche";
					/*return*/ /*header('Location: ' . $token->url);*/

					
					return header('Location: ' . $token->url);

				}else
				{
					echo "Une erreur est subvenue";
				}
			}

			}else
			{
			//else l'id n'est pas dans la base de donnée
				header('Location: http://crypto.boss-arts.com/connexion.php');
			}


		}
		?>

		<form action="" method="POST">
			<input type="hidden" name="transaction_id" value="<?php echo $transaction_id; ?>">
			<button type="submit" name="payer">Payer maintenant</button>
		</form>

		<?php




	}

}








?>

