<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profil | Crypto Business</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css_perso/style.css">
  <link rel="stylesheet" href="css_perso/profile.css">
  <?php include('balises/head-code.php');?>
  <link rel="icon" type="image/x-icon" href="logos/favicon_LOGO_CRYPTO_BUSINESS_SITE_WEB.ico">
</head>
<body>

  <?php

  include('bdd_config.php');

  include('menu-home.php');

  include_once('cookieconnect.php');

  if (isset($_GET['id']) AND $_GET['id'] > 0) 
  {
    $getid = intval($_GET['id']);

    $userbdd = $bdd->prepare('SELECT * from users WHERE id = ?');
    $userbdd->execute(array($getid));
    $userinfo = $userbdd->fetch();
    
    if ($getid = $userinfo['id']) 
    {

  ?>
  <br/>
  <div class="profil_complet"> 
    <div class="profil">
      <?php
      if (!empty($userinfo['avatar']))
      {
        ?>
        <img src="users/avatars/<?php echo $userinfo['avatar'];?>" alt="" class="photo_profil" >
        <?php
      }else
      {
        ?>
        <img src="users/avatars/avatar-neutre.png" alt="Photo de profile neutre" class="photo_profil" >
        <?php
      }
      ?>

      <div class="mod_photo">
        <a href="http://crypto.boss-arts.com/modifier-photo-de-profil.php?id=<?php echo $userinfo['id'];?>"><button class="ph" >Modifier la photo</button></a>
      </div> <br/>
      
      <h4 class="infos"><?php echo $userinfo['name'];?> <?php echo $userinfo['first_name'];?></h4>
      <p class="email"><?php echo $userinfo['email'];?></p> <br/> <hr> <br/>

      <a href="http://crypto.boss-arts.com/modifier-profil.php?id=<?php echo $userinfo['id'];?>"><button class="mod_profil">Modifier le profil</button></a> <br> <br>

      <a href="http://crypto.boss-arts.com/modifier-telephone.php?id=<?php echo $userinfo['id'];?>"><button class="mod_profil">Modifier numéro</button></a> <br> <br>

      <a href="http://crypto.boss-arts.com/modifier-mot-de-passe.php?id=<?php echo $userinfo['id'];?>"><button class="mod_profil">Modifier mot de passe</button></a> <br> <br>

      <a href="http://crypto.boss-arts.com/transactions.php?user_id=<?php echo $userinfo['id'];?>"> <button class="transactions">Transactions</button></a> <br> <br>

      <a href="http://crypto.boss-arts.com/deconnexion.php"><button class="deconnexion">Deconnexion</button></a> <br> <br>     
    </div>    
  </div>

<?php
    }else
    {
      //else si l'id est différent de l'id de session
      header('Location: http://crypto.boss-arts.com/connexion.php');
    }



  }else
  {
     //else si l'id n'est pas dans la base de données
    header('Location: http://crypto.boss-arts.com/connexion.php');
  }

  ?>


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
