<!DOCTYPE html>
<html lang="fr">
<head>
  <?php include('code-entete.php') ?>
  <link rel="stylesheet" href="css_perso/modifier_mot_de_passe_admin.css" />
  <link rel="stylesheet" href="css_perso/style.css">
  <?php include('balises/head-code.php');?>
  <title>Modification mot de passe | Crypto Business</title>
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

    if ($getid = $_SESSION['id']) 
    {
$id = $userinfo['id'];

        if ($getid = $id) 
        {

      if (isset($_POST['changer'])) 
      {


        if (!empty($_POST['input_a_mdp']) AND !empty($_POST['password1']) AND !empty($_POST['password2']))
        {

    //Transformer les input en valeurs sécurisées

          $input_a_mdp = sha1($_POST['input_a_mdp']);
          $password1 = sha1($_POST['password1']);
          $password2 = sha1($_POST['password2']);

          if ($input_a_mdp == $_SESSION['password']) 
          {

            if ($password1 == $password2) 
            {
              $updatepassword = $bdd->prepare("UPDATE users_admins SET password = ?  WHERE id = ?");
              $updatepassword->execute(array($password1, $_SESSION['id']));


              $note = "Votre mot de passe a été modifié avec succès !";


            }else
            {
              //else mot de passes non identiques
              $error = "Les mots de passe ne sont pas identiques";
            }


          }else
          {
            //est ce que l'ancien mot de passe est correct
            $error = "L'ancien mot de passe est incorrect";
          }

        }else
        {
      //else de l'utilisateur n'existe pas
          $error = "Veuillez remplir les champs";

        }
      }else
      {
      //else dle bouton submit n'a pas été cliqué

      }

    }else
  {
     //else si l'id n'est pas dans la base de données
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

  <br/>
  <div class="formgroup">
    <br/>
    <div class="connexion">
      <h2>Modifier mot de passe</h2>
      <hr/>
    </div>
    <form action="" method="POST">

      <br/>
      <label for="input_a_mdp" class="ancienmdp">Ancien mot de passe</label> <br>
      <input type="password" placeholder="Votre ancien mot de passe" name="input_a_mdp" required class="input_a_mdp" id="input_a_mdp">

      <br> <br>

      <label for="password" class="input_mdp">Nouveau mot de passe</label> <br>
      <input type="password" placeholder="Votre nouveau mot de passe" name="password1" required class="password" id="password1"> <br/>

      <label for="password" class="input_mdp">Confirmer mot de passe</label> <br>
      <input type="password" placeholder="Confirmer le nouveau mot de passe" name="password2" required class="password" id="password1"> <br/>


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

      <div class="note">
        <?php
        if (isset($note)) 
        {
          ?>
          <img src="logos/ok.png" alt="Note" class="img-note"><br>
          <?php
          echo $note;
          ?>
          <a href="http://crypto.boss-arts.com/admin/profil.php?id=<?php echo $_SESSION['id'];?>">Retour</a><br/>
          <?php
        }
        ?>
      </div>


    <br/>
    <button type="submit" name="changer" class="connecter">Changer mot de passe</button> <br/>

    <div class="bas">
      <a href="http://crypto.boss-arts.com/mot-de-passe-oublie.php" class="mdp">Mot de passe oublié ?</a>
    </div> <br/>

  </form>
</div>


<?php include('balises/foot-code.php');?>
<?php include('footer.php');?>
</body>
</html>