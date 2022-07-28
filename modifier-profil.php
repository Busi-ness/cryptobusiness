<!DOCTYPE html>
<html lang="en">
<head>
  <title>Modifier profil | Crypto Business</title>
  <link rel="stylesheet" href="css_perso/inscription.css">
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

    $name = $userinfo['name'];
    $first_name = $userinfo['first_name'];
    $email = $userinfo['email'];

    if ($getid = $_SESSION['id']) 
    {

      $id = $userinfo['id'];


      if ($getid = $id) 
      {
        if (isset($_POST['modifier'])) 
        {

  //Transformer les input en valeurs sécurisées

          $name = preg_replace("/\s+/", "", htmlentities($_POST['name']));
          $first_name = preg_replace("/\s+/", "",  htmlentities($_POST['first_name']));
          $email = preg_replace("/\s+/", "", htmlentities($_POST['email']));

          if (!empty($_POST['name']) AND !empty($_POST['first_name']) AND !empty($_POST['email']))
          {
    //Vérifier la longeur du nom de famille
            $namelength = strlen($name);
            if ($namelength <=  50) 
            {
      //Vérifier la longeur du prénom
              $first_namelength = strlen($first_name);
              if ($first_namelength <= 50) 
              {
        //Vérifier la validité de l'email
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
                {

            //Mise à jour des données

                  $updateuser = $bdd->prepare("UPDATE users SET name = ?, first_name = ?, email = ? WHERE id = ?");
                  $updateuser->execute(array($name, $first_name, $email, $_SESSION['id']));

              // Variables concernant l'email

                  $header="MIME-Version: 1.0\r\n";
                  $header.='From:"Crypto Business"<crypto@boss-arts.com>'."\n";
                  $header.='Content-type:text/html; charset="utf-8"'."\n";
                  $header.='Content-Transfert-Encoding: 8bit';

                  $message='

                  <html>
                  <body>

                  <div align="center">

                  Salut! </br>
                  Vos informations de profil ont été modifiées. Si ce n\'est pas vous qui l\'avez fait veuillez contacter l\'assisance. Merci

                  </div>
                  </body>
                  </html>

                  ';



                  mail($email, "Modification profil", $message, $header);

                  $note = "Vos informations de profil ont été modifiées avec succès";

                  
                }else
                {
                  $error = "Erreur inconnue, veuillez réssayer plus tard";
                }

              }else
              {
          //erreur validité de l'email
                $error = "Votre adresse email n'est pas valide";
              }

            }else
            {
        //erreur liée au prénom
              $error = "Votre prénom ne doit pas dépasser 50 caractères";
            }


          }else
          {
      //erreur liée au nom de famille
            $error = "Votre nom ne doit pas dépasser 50 caractères";
          }

        }else
        {
          /*$error = "Aucun champ ne soit rester vide";*/
        }

      }else
      {
      //else si l'id n'est pas dans la base de données
        header('Location: http://crypto.boss-arts.com/connexion.php');
      }

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


  <br>
  <div class="formgroup"> <br>
    <div class="entete">
      <h2>Modification profil</h2>
      <span>Modifier vos informations de profile</span> <hr>

    </div>
    <form action="" method="POST">
      <br>

      <div class="input-user">

        <label for="name" class="input_name">Nom</label> <br>
        <input class="name" type="text" placeholder="Votre nom de famille" name="name" required id="name" value="<?php echo $name ?>">

      </div> <br>

      <div class="input-user">

        <label for="first_name" class="input_first_name">Prénom</label> <br>
        <input class="first_name" type="text" placeholder="Votre prénom" name="first_name" required id="first_name"value="<?php echo $first_name ?>">

      </div> <br>

      <div class="input-user">

        <label for="email" class="input_email">Adresse email</label> <br>
        <input class="email" type="text" placeholder="Votre addresse email" name="email" required id="email" value="<?php echo $email ?>">

      </div> <br>

      <div class="error">
        <?php
        if (isset($error)) 
        {
          ?>
          <img src="logos/error.png" alt="Error"><br>
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
          <img src="logos/ok.png" alt="Ok"><br>
          <?php
          echo $note;
        }
        ?>
      </div>
      <br>

      <div class="">
        <div class="col-12">
          <button type="submit" class="inscription" name="modifier">Modifier</button>
        </div>
      </div><br>

    </body>
    </html>