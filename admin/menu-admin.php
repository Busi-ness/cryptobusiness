<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css_perso/style.css">
	<link rel="stylesheet" href="css_perso/menu-admin.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato&amp;display=swap'>
	<link rel="stylesheet" href="css_perso/style5-menu.css">
	<title></title>
</head>

<header>
	<div class="logo-entete"><br/>
		<a href="http://crypto.boss-arts.com/accueil.php"><img src="logos/LOGO_CRYPTO_BUSINESS_SITE_WEB.png" alt="LOGO CRYPTO BUSINESS SITE WEB"></a><br/>
	</div>
</header>

<?php

session_start();

if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) 
{

//Montrer le menu membre
	?>


	<div class="MobileNav" data-mobile-nav>
		<div class="MobileNav-overlay" data-mobile-nav-overlay></div>
		<div class="MobileNav-inner">
			<div class="MobileNav-trigger" data-mobile-nav-trigger>
				<div class="MobileNav-trigger-inner"></div>
			</div>
			<ul class="MobileNav-nav" data-mobile-nav-list>
				<li class="MobileNav-item" data-mobile-nav-item="1">
					<div class="MobileNav-item-title">
						<a href="#">Accueil</a>
					</div>
				</li>
				<li class="MobileNav-item" data-mobile-nav-item="2">
					<div class="MobileNav-item-title">
						<a href="#">Products</a>
					</div>
				</li>
				<li class="MobileNav-item" data-mobile-nav-item="3">
					<div class="MobileNav-item-title">
						<a href="#">Services</a>
					</div>
				</li>
				<li class="MobileNav-item" data-mobile-nav-item="4">
					<div class="MobileNav-item-title">
						<a href="#">Work</a>
					</div>
				</li>
				<li class="MobileNav-item" data-mobile-nav-item="5">
					<div class="MobileNav-item-title">
						<a href="#">Contact</a>
					</div>
				</li>
			</ul>
		</div>
	</div>

	<header class="Header" data-header>
		<div class="Header-inner" data-header-nav>
			<div class="logo">
				<a href="http://crypto.boss-arts.com/accueil.php"><img src="logos/LOGO_CRYPTO_BUSINESS_SITE_WEB.png" alt="LOGO CRYPTO BUSINESS SITE WEB"></a>
			</div>
			<nav class="Header-nav" data-nav>
				<div class="Header-nav-item" data-nav-item="1">
					<a href="http://crypto.boss-arts.com/accueil.php">Accueil</a>
				</div>
				<div class="Header-nav-item" data-nav-item="2">
					<a href="http://crypto.boss-arts.com/profile.php?id=<?php echo $_SESSION['id'];?>">Profil</a>
				</div>
				<div class="Header-nav-item" data-nav-item="3">
					<a href="http://crypto.boss-arts.com/transactions.php?id=<?php echo $_SESSION['id'];?>">Transactions</a>
				</div>
				<div class="Header-nav-item" data-nav-item="4">
					<a href="http://crypto.boss-arts.com/temoignages.php">Témoignages</a>
				</div>
				<div class="Header-nav-item" data-nav-item="5">
					<a href="http://crypto.boss-arts.com/contact.php">Contact</a>
				</div>
				<div class="Header-nav-item" data-nav-item="5">
					<a href="http://crypto.boss-arts.com/a-propos.php">A propos">A propos</a>
				</div>
			</nav>
			<button class="MobileNav-trigger" data-mobile-nav-trigger>
				<div class="MobileNav-trigger-inner"></div>
			</button>
		</div>
	</header>


	<?php


	
}else
{
	//else si l'internaute n'est pas connecté
	//Montrer le menu visiteur
	?>

<!-- Menu Phone -->

<div class="menu-pc">

  <ul>
    <li><a href="">Accueil</a></li>
    <li><a href="">S'inscrire</a></li>
    <li><a href="">Se connecter</a></li>
    <li><a href="">Témoignages</a></li>
    <li><a href="">Contact</a></li>
    <li><a href="">A propos</a></li>
  </ul>
  
</div>


<div class="container menu-phone">

    <input id="toggle" type="checkbox">

    
    <label class="toggle-container" for="toggle">
     
      <span class="button button-toggle"></span>
    </label>

    <!-- The Nav Menu -->
    <nav class="nav">
      <a class="nav-item" href="">Accueil</a>
      <a class="nav-item" href="">S'inscrire</a>
      <a class="nav-item" href="">Se connecter</a>
      <a class="nav-item" href="">Témoignages</a>
      <a class="nav-item" href="">Contact</a>
      <a class="nav-item" href="">A propos</a>
    </nav>

</div>

	<?php

}


?>
