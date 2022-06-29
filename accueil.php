<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Accueil | Crypto Business</title>
	<meta name="description" content="Une plateforme qui vous aide à payer et à vendre facilement vos cryptomonnaies via un paiement mobile intégré sécurisé et fiable. Inscrivez-vous !" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/accueil.css">
	<link rel="stylesheet" href="css_perso/temoignages.css">
	<link rel="stylesheet" href="css_perso/actualites.css">
	<?php include('balises/head-code.php');?>
	<link rel="icon" type="image/x-icon" href="logos/favicon_LOGO_CRYPTO_BUSINESS_SITE_WEB.ico">
</head>
<body>

	<div class="menu">
		<?php

		include('bdd_config.php');

		//inclure le type de menu
		include('menu-home.php');
//Voir le id de session existe et afficher l'url en fonction de ça

if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) 
{
	$urlpost_acheter = "http://crypto.boss-arts.com/acheter.php?id=".$_SESSION['id'];
	$urlpost_vendre = "http://crypto.boss-arts.com/vendre.php?id=".$_SESSION['id'];
}else
{
	$urlpost_acheter ="http://crypto.boss-arts.com/connexion.php";
	$urlpost_vendre ="http://crypto.boss-arts.com/connexion.php";
}

		?>
	</div>


	<div class="all-site">
		<br>
		<div class="titre-du-site">
			<br>
			<!-- <h1>La plateforme d'achat et de vente des cryptomonnaies</h1> <br/><br/> -->

			<!-- <span>Un lieu sûr, fiable et sécurisé pour toutes vos opérations en cryptomonnaies<br/> <br/>
			</span>  --> <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

			<div class="achatvente">
				<a href="<?php echo $urlpost_acheter?>"><button class="acheter btn">Acheter</button></a>
				<a href="<?php echo $urlpost_vendre?>" class=""><button class="vendre btn">Vendre</button></a></button> <br/>
			</div>

		</div><br/><br/><br/><br/>

<div class="actualites">
	<?php include('actualites.php')?>
</div> <br/>

		<div class="atouts">


			<div class="atout1 atout">
				<img src="logos/securite-Crypto-Business-Cryptomonnaie.png" alt="Sécurité Crypto Business Cryptomonnaie" class="image-atout">
				<h2>Sécurité</h2>
				<p>Les transactions sont assujetties à la création d’un compte. Votre compte est non seulement sécurisé mais toute opération liée à cette dernière l’est aussi grâce aux nouvelles méthodes de sécurité. Soyez donc sans crainte</p>				
			</div>

			<div class="atout2 atout">
				<img src="logos/fiabilite-Crypto-Business-Cryptomonnaie.png" alt="Fiabilité Crypto Business Cryptomonnaie" class="image-atout">
				<h2>Fiabilité</h2>
				<p>Nous sommes là pour vous et nous feront vos différentes transactions sans problème. Les gens se fient à nous pour l’achat et la vente de leurs cryptomonnaies. Pourquoi pas vous ? Nous pouvons discuter plus  </p>				
			</div>

			<div class="atout3 atout">
				<img src="logos/rapidite-Crypto-Business-Cryptomonnaie.png" alt="Rapidité Crypto Business Cryptomonnaie" class="image-atout">
				<h2>Rapidité</h2>
				<p>Notre équipe effectue votre transaction en une fraction de seconde et vous recevez automatiquement une notification de transaction via nos différents canaux de communication (email, Whatsapp etc.)</p>				
			</div>


		</div>

		<!-- Affichage de stémoignages -->


		<div class="temoignages">
			<br/>
			<span><h2 style="text-align: center;">Ce que nos clients disent</h2></span>

			<?php

			$temoignagebdd = $bdd->prepare('SELECT * from temoignages WHERE statut_temoin = 1 LIMIT 3');
			$temoignagebdd->execute();

			while ($post_temoin = $temoignagebdd->fetch()) 
			{
				$name_temoin = $post_temoin['name_temoin'];
				$first_name_temoin = $post_temoin['first_name_temoin'];
				$avatar_temoin = $post_temoin['avatar_temoin'];
				$temoignage = $post_temoin['temoignage'];
				$pays_temoin = $post_temoin['pays_temoin'];
				$date_post_temoin = $post_temoin['date_post_temoin'];

				?> 

				
				

				<div class="temoignage1 temoignage">
					<br/>
					<img src="users/avatars/<?php echo $avatar_temoin;?>" alt="Photo de <?php echo $name_temoin;?> <?php echo $firts_name_temoin;?> témoignage Crypto Business" class="image-entete"> <br/> <hr>
					<h2><?php echo $name_temoin;?> <?php echo $first_name_temoin;?></h2> <br/>
					<p><?php echo $temoignage;?></p> <br/>
					<div class="pays">Depuis: <?php echo $pays_temoin;?> | <?php echo $date_post_temoin;?></div> <br/>				
				</div>
				
				<?php


			}

	$temoignagebdd->closeCursor(); // Termine le traitement de la requête

	


	?>
	<div class="plustemoignages">
		<button><a href="http://crypto.boss-arts.com/temoignages.php">Voir plus de témoignages</a></button>
	</div>

	<!-- <img src="images-site/Cryptomonnaie_par_Crypto_Business_Boss_Arts.jpg" alt=""> -->

	<br>

</div>


<div class="actualites">
	<?php include('balises/actualites.php');?>		
</div>





<?php include('balises/foot-code.php');?>
<?php include('footer.php');?>
</body>
</html>