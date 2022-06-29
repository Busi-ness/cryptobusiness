<?php

include('bdd_config.php');

if (isset($_POST['inserer'])) 
{
	echo $_POST['status_crypto'];
	echo "ok";
	$nom_crypto = htmlentities($_POST['nom_crypto']);
	$prix_dollars = htmlentities($_POST['prix_dollars']);

	if ($_POST['status_crypto']) 
	{
		$status_crypto = "1";
	}
	else
	{
		$status_crypto = "0";
	}


	//Mettre la cryptomonnaie dans la base de données

	$insertcrypto = $bdd->prepare("INSERT INTO liste_crypto (nom_crypto, prix_dollars, status_crypto) VALUES(?,?,?)");
              $insertcrypto->execute(array($nom_crypto, $prix_dollars, $status_crypto));

              echo "La cryptomonnaie a été ajouté avec succès";


}else
{
	echo "no";
}
?>

<div class="groupform">
	<h2>Insérer une cryptomonnaie</h2>
<form action="" method="POST">
	<input type="text" name="nom_crypto" placeholder="Nom de la cryptomonnaie" required> <br/><br/>
	<input type="text" name="prix_dollars" placeholder="Prix actuel" required><br/><br/>
	<input type="checkbox" id="status_crypto" name="status_crypto" placeholder="">
	<label for="status_crypto">Cocher pour signifier que la cryptomonnaie est disponible</label> <br/><br/>
	<button type="submit" class="btn" name="inserer">INSERER CRYTPOMMONNAIE</button>
</form>
</div>
