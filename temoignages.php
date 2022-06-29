<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Témoignages | Crypto Business</title>
	<meta name="description" content="Ceux qui ont déjà utilisé la plateforme sécurisée, fiable et facile pour acheter et vendre des cryptomonnaies témoignent" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/temoignages.css">
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

<div class="tout-temoignages">
		<span><h1 style="text-align: center;">TEMOIGNGAGES CRYPTO BUSINESS</h1></span>
		<span><p style="text-align: center;">Ce que nos clients disent par rapport à nos services</p></span>


<div class="temoignages">

	<?php

//Voir le id de session existe et afficher l'url en fonction de ça

if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) 
{
	$urlpost = "http://crypto.boss-arts.com/poster-temoignage.php?id=".$_SESSION['id'];
}else
{
	$urlpost ="http://crypto.boss-arts.com/connexion.php";
}
	
	$temoignagebdd = $bdd->prepare('SELECT * from temoignages WHERE statut_temoin = 1');
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
				<img src="users/avatars/<?php echo $avatar_temoin;?>" alt="Photo de <?php echo $name_temoin;?> <?php echo $firts_name_temoin;?> témoignage Crypto Business" class="image-entete"> <hr>
				<h2><?php echo $name_temoin;?> <?php echo $first_name_temoin;?></h2> <br/>
				<p><?php echo $temoignage;?></p> <br/>
				<div class="pays">Depuis: <?php echo $pays_temoin;?> | <?php echo $date_post_temoin;?></div>				
			</div>
			
		<?php


	}

	$temoignagebdd->closeCursor(); // Termine le traitement de la requête

	


	?>

</div>
<br/>
	<div class="poster-temoignage">
		<button><a href="<?php echo $urlpost?>">Poster un témoignage</a></button>
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