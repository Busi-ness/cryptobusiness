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
		die("Une erreur est survenue lors de la connexion à la base de données");
	}



	//on doit analyser la dmande faite via l'url (GET) afin de déterminer si on souhaite rcuprer les messages ou en écrire un

	$task = "list";

	if (array_key_exists("task", $_GET)) 
	{
		$task = $_GET['task'];
	}
	

	if ($task == "write") 
	{
		postMessage();
		
	}else
	{
		getMessages();
	}

function getMessages(){
	global $bdd;
//si on veut récupérer, il faut envoyer du JSON

	//1. On requête la base de données pour sortir les 20derniers messages

	$resultats = $bdd->query("SELECT * FROM messages ORDER BY created_at DESC LIMIT 20");

	//2. On traite les résultats
$messages = $resultats->fetchAll();

	//3. on affiche les données sous forme de JSON

echo json_encode($messages);

}


//si on veut écrire au contraire, il faut analyser les paramètres envoyés en POST et les sauver dans la base de données

function postMessage(){
global $bdd;
	//1. analyser les paramètres passés en POST

if (!array_key_exists('author', $_POST) || ! array_key_exists('content', $_POST)) 
{
	echo json_encode(["status" => "error", "message" => "One field or many have not been sent"]);
	return;
}
	$author = $_POST['author'];
	$content = $_POST['content'];

	//2. Créer une requête qui permettra d'insérer ces données

$query = $bdd->prepare('INSERT INTO messages SET author = :author, content = :content, created_at = NOW()');

$query->execute(
	[
		"author" => $author,
		"content" => $content
	]);



	//3. Donner un statu de succès ou d'erreur au format JSON

echo json_encode(["status" => "success"]);

}




	?>


Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus, similique doloremque, maiores, cumque sed illum sapiente aliquam exercitationem iusto eaque assumenda molestias eum temporibus dolorum quos voluptatum nam numquam consectetur.