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

    $userbdd = $bdd->prepare('SELECT * from users_admins WHERE id = ?');
    $userbdd->execute(array($getid));
    $userinfo = $userbdd->fetch();
    
if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) 
      {

        if ($getid == $_SESSION['id']) 
        {



  ?>
  <br/>
  <div class="profil_complet"> 
    <div class="profil">
      <?php
      if (!empty($userinfo['avatar']))
      {
        ?>
        <img src="users_admins/avatars/<?php echo $userinfo['avatar'];?>" alt="" class="photo_profil" >
        <?php
      }else
      {
        ?>
        <img src="users_admins/avatars/avatar-neutre.png" alt="Photo de profile neutre" class="photo_profil" >
        <?php
      }
      ?>

      <div class="mod_photo">
        <a href="http://crypto.boss-arts.com/admin/modifier_photo_de_profil_admin.php?id=<?php echo $userinfo['id'];?>"><button class="ph" >Modifier la photo</button></a>
      </div> <br/>
      
      <h4 class="infos"><?php echo $userinfo['name'];?> <?php echo $userinfo['first_name'];?></h4>
      <p class="email"><?php echo $userinfo['email'];?></p> <br/> <hr> <br/>

      <a href="http://crypto.boss-arts.com/admin/modifier_profil_admin.php?id=<?php echo $userinfo['id'];?>"><button class="mod_profil">Modifier le profil</button></a> <br> <br>

      <a href="http://crypto.boss-arts.com/admin/modifier_telephone_admin.php?id=<?php echo $userinfo['id'];?>"><button class="mod_profil">Modifier numéro</button></a> <br> <br>

      <a href="http://crypto.boss-arts.com/admin/modifier_mot_de_passe_admin.php?id=<?php echo $userinfo['id'];?>"><button class="mod_profil">Modifier mot de passe</button></a> <br> <br>

      <a href="http://crypto.boss-arts.com/admin/deconnexion.php"><button class="deconnexion">Deconnexion</button></a> <br> <br>     
    </div>    
  </div>

<?php

}else
    {
      //else si l'id est différent de l'id de session
      header('Location: http://crypto.boss-arts.com/admin/connexion.php');
    }
    }else
    {
      //else si l'id est différent de l'id de session
      header('Location: http://crypto.boss-arts.com/admin/connexion.php');
    }



  }else
  {
     //else si l'id n'est pas dans la base de données
    header('Location: http://crypto.boss-arts.com/admin/connexion.php');
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
