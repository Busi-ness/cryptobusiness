//Il nous faut une fonction pour récupérer le JSON
// des messages et les afficher correctement

function getMessages(){
	//1. Elle doit créer une requête AJAX pour se connecter au serveur,
	//et notamment au fichier handler.php

	 const requeteAjax = new XMLHttpRequest();
	 requeteAjax.open("GET", "handler.php"); 

	//2. Quand elle reçoit les données, il faut qu'elle les traite (en eploitant le JSON) et il faut qu'elle affiche ces données au format HTML
	requeteAjax.onload = function()
	{
		const resultat = JSON.parse(requeteAjax.responseText);
		const html = resultat.map(function(message)
		{
			return  '

			<div class="message">
				<span class="date">${message.created_at.substring(11, 16)}</span>	
				<span class="author">${message.author}</span>:
				<span class="content">${message.content}</span>


			'

		})
		console.log(html);
	}
	//3. On envoie la requête
	requeteAjax.send();


}



/*Il nous faut une fonction pour envoyer le nouveau message au serveur et rafraichir les getMessages
*/

function postMessage(){
	//1. Elle doit stoper le submit du formulaire

	//2. Elle doit récupérer les données du formulaire


	//3. Elle doit conditionner les données

	//4. Elle doit confirmer une requête aja en POST et envoyer les données


}