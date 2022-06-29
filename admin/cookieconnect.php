<?php

if (!isset($_SESSION['id']) AND isset($_COOKIE['email'],$_COOKIE['password']) AND !empty($_COOKIE['email']) AND !empty($_COOKIE['password']) )
{
	//Accéder à la table users pour voir si les données existent déjà
	$usersbdd = $bdd->prepare("SELECT * from users WHERE email= ? and password= ?");
	$usersbdd->execute(array($_COOKIE['email'], $_COOKIE['password']));
	$userexist = $usersbdd->rowcount();

	if ($userexist == 1) 
	{
		$userinfo = $usersbdd->fetch();
		$_SESSION['id'] = $userinfo['id'];
		$_SESSION['email'] = $userinfo['email'];
		$_SESSION['password'] = $userinfo['password'];
		$_SESSION['confirme'] = $userinfo['confirme'];
	}
}

?>