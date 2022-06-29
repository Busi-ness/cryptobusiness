<?php
//Connexion à la base de donné de upao
$dbhost = 'localhost';
$dbname = 'crypto_12022';//nom de la base de donnée
$dbuser = 'root';
$dbpswd = '';

/*$dbhost = "localhost";
$dbname = "upao";//nom de la base de donnée
$dbuser = "root";
$dbpswd = "";

mysql_connect($dbhost,$dbuser,$dbpswd);
mysql_select_db(dbpswd);
*/
	//A partir d'ici, rien modifier
	try{
		$bdd= new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	}catch(PDOexception $e){
		die('<div style="color: red; background-color: white; text-align: center; font-size: 30px"> <br/>Une erreur est survenue lors de la connexion à la base de données<br/><br/></div>');
	}
	
	?>

