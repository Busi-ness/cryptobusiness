<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Connexion | Crypto Business</title>
  <meta name="description" content="Connectez-vous à présent pour acheter facilement et en toute sécurité vos différentes cryptomonnaies. C’est possible avec Crypto Business" />
  <?php include('code-entete.php') ?>
  <link rel="stylesheet" href="css_perso/connexion.css" />
  <link rel="stylesheet" href="css_perso/style.css">
  <?php include('balises/head-code.php');?>
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
 <?php

 if (isset($_POST['connexion'])) 
 {


  if (!empty($_POST['email']) AND !empty($_POST['password']))
  {


    //Transformer les input en valeurs sécurisées

    $email = htmlentities($_POST['email']);
    $password = sha1($_POST['password']);

    include('bdd_config.php');

    include_once('cookieconnect.php');

    //Accéder à la table users pour voir si les données existent déjà
    $usersbdd = $bdd->prepare("SELECT * from users WHERE email= ? and password= ?");
    $usersbdd->execute(array($email, $password));
    $userexist = $usersbdd->rowcount();

    if ($userexist == 1) 
    {
      if (isset($_POST['souvenir'])) 
      {
        setcookie('email', $email,time()+365*24*3600,null,null,false,true);
        setcookie('password', $password,time()+365*24*3600,null,null,false,true);
      }
      $userinfo = $usersbdd->fetch();
      $_SESSION['id'] = $userinfo['id'];
      $_SESSION['email'] = $userinfo['email'];
      $_SESSION['password'] = $userinfo['password'];
      $_SESSION['confirme'] = $userinfo['confirme'];

      if ($_SESSION['confirme'] == 1) 
      {
        header('Location: http://crypto.boss-arts.com/accueil.php?id='.$_SESSION['id']);

        // code...
      }else
      {
        //Voir si l'utilisateur a confirmé son email
        $error = "Vous n'avez pas encore confirmé votre adresse email. Vérifiez votre boîte de réception ou les spams";

      }






    }else
    {
      //else de l'utilisateur n'existe pas
      $error = "Email ou mot de passe incorrect";

    }
  }else
  {
      //else de email et password vide
    $error = "Tout les champs doivent être remplis";
  }
}


?>


<br/> <br/><br/>
<div class="formgroup">
  <div class="connexion">
    <h2>Connexion</h2>
    <span>Remplissez le formulaire pour vous connecter</span>
    <hr/>
  </div>
  <form action="" method="POST" class="form-style">

    <br/>
    <label for="email" class="input_email">Adresse email</label><span class="required">*</span> <br>
    <input type="text" placeholder="Votre addresse email" name="email" required class="email" id="email">

    <br> <br>

    <label for="password" class="input_mdp">Mot de passe</label><span class="required">*</span> <br>
    <input type="password" placeholder="Votre mot de passe" name="password" required class="password" id="password"> <br/>

    <div class="error">
      <?php
      if (isset($error)) 
      {
        ?>
        <img src="logos/error.png" alt="Error" class="img-error"><br>
        <?php
       echo $error;
     }
     ?>
   </div>

   <input type="checkbox" name="souvenir" id="souvenir" class="checkbox"><label for="souvenir" class="souvenir">Se souvenir de moi</label>
   <br><br>



   <button type="submit" name="connexion" class="connecter">Se connecter</button>

   <br> <br>

   <div class="bas">
    Pas encore de compte?
    <a href="http://crypto.boss-arts.com/inscription.php" class="inscrire">S'inscrire</a> | <a href="http://crypto.boss-arts.com/mot-de-passe-oublie.php" class="mdp">Mot de passe oublié</a>
  </div>




</form>
<br/>
</div>

<div class="bas">
<div class="balises-foot-code">
  <?php include('balises/foot-code.php');?>
</div>

<div class="footer">
  <!-- <?php include('/footer.php');?>   -->  
</div>
</div>

</body>
</html>