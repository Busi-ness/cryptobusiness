<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inscription | Crypto Business</title>
  <meta name="description" content="Payez désormais vos cryptomonnaies en vous inscrivant sur cette plateforme fiable, sécurisé et facile à utiliser. Prêt ! Inscrivez-vous" />
  <link rel="stylesheet" href="css_perso/style.css">
  <link rel="stylesheet" href="css_perso/inscription.css">
  <link rel="icon" type="image/x-icon" href="logos/favicon_LOGO_CRYPTO_BUSINESS_SITE_WEB.ico">
  <?php include('balises/head-code.php');?>
</head>
<body>

  <div class="menu">
    <?php

    include('bdd_config.php');

    include('fonctions/fonctions.php');

    //inclure le type de menu
    include('menu-home.php');

    ?>
  </div>

  
  <?php


  if (isset($_POST['subscribe'])) 
  {

  //Transformer les input en valeurs sécurisées


    $name = preg_replace("/\s+/", "", htmlentities($_POST['name']));
    $first_name = preg_replace("/\s+/", "",  htmlentities($_POST['first_name']));
    $email = preg_replace("/\s+/", "", htmlentities($_POST['email']));
    $pays = htmlentities($_POST['pays']);
    $password = preg_replace("/\s+/", "", sha1($_POST['password']));
    date_default_timezone_set('Africa/Johannesburg');


    if (!empty($_POST['name']) AND !empty($_POST['first_name']) AND !empty($_POST['email']) AND !empty($_POST['password']))
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
          //Vérifier si l'email existe déjà
            $reqmail = $bdd->prepare("SELECT * FROM users WHERE email = ? ");
            $reqmail->execute(array($email));
            $emailexist = $reqmail->rowcount();

            if ($emailexist == 0) 
            {
            //Insertion de la clé de confirmation et les autres données dans la base de données
              $longeurkey = 15;
              $confirmkey = "";
              for ($i=1; $i <$longeurkey ; $i++) 
              { 

                $confirmkey .= mt_rand(0,9);

              }

              $insertuser = $bdd->prepare("INSERT INTO users (name, first_name, email, pays, password, confirmkey, confirme, date_creation_compte) VALUES(?,?,?,?,?,?,?,?)");
              $insertuser->execute(array($name, $first_name, $email, $pays, $password, $confirmkey,'0', date('m-d-Y h:i:s a', time()),));

//insérer l'utilisateur sur la liste de newsletter
              if ($_POST['newsletter']) 
              {
                $newsletter = htmlentities($_POST['newsletter']);

                if ($newsletter) 
                {
                  $insertnews = $bdd->prepare("INSERT INTO abonnes_newsletters (name, first_name, email, pays) VALUES(?,?,?,?)");
                  $insertnews->execute(array($name, $first_name, $email, $pays));
                }

              }



              // Variables concernant l'email

              $header="MIME-Version: 1.0\r\n";
              $header.='From:"Crypto Business"<crypto@boss-arts.com>'."\n";
              $header.='Content-type:text/html; charset="utf-8"'."\n";
              $header.='Content-Transfert-Encoding: 8bit';

              $message='

              <html>
              <body>

              <div align="center">

              Compte créé <br>
              Salut!

              Merci de vous être inscrit sur Crypto Business. 
              Nous avons juste besoin de confirmer votre adresse e-mail pour terminer la configuration de votre compte. Veuillez cliquer sur le lien ci-dessous pour activer votre compte Crypto Business


              <a href ="http://crypto.boss-arts.com/confirmation.php?email='.urldecode($email).'&confirmkey='.$confirmkey.'">Confirmer votre compte</a>

              </div>
              </body>
              </html>
              
              ';
              
              

              mail($email, "Confirmation de compte", $message, $header);

              $note = "Un e-mail vous a été l'adresse email que vous avez fourni.
              Vous devez cliquer sur le lien d'activation avant de pouvoir vous connecter à votre compte";



            } else
            {
            //erreur email existe
              $error = "Adresse email déjà utilisée";
              


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
      $error = "Aucun champ ne soit rester vide";
    }

  }





  ?>

  <br/> <br/><br/>

  <div class="formgroup"> <br>
    <div class="entete">
      <h2>Inscription</h2>
      <span> Remplissez le formulaire pour vous inscrire</span> <hr>
      
    </div>
    <form action="" method="POST">
      <br>

      <div class="input-user">

        <label for="name" class="input_name">Nom</label> <br>
        <input class="name" type="text" placeholder="Votre nom de famille" name="name" required id="name">

      </div> <br>

      <div class="input-user">

        <label for="first_name" class="input_first_name">Prénom</label> <br>
        <input class="first_name" type="text" placeholder="Votre prénom" name="first_name" required id="first_name">

      </div> <br>

      <div class="input-user">

        <label for="email" class="input_email">Adresse email</label> <br>
        <input class="email" type="text" placeholder="Votre addresse email" name="email" required id="email">

      </div> <br>

      <div class="input-pays">

        <label for="pays" class="input_pays">Votre Pays</label> <br>
        <?php include('liste-pays.html'); ?>

      </div> <br>

      <div class="input-password">

        <label for="password" class="input_mdp">Mot de passe</label> <br>
        <input class="password" type="password" placeholder="Votre mot de passe" name="password" required id="password">

      </div> <br>

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
          <img src="logos/ok.png" alt="Ok" class="img-note"><br>
          <?php
          echo $note;
        }
        ?>
      </div><br>

      <div class="newsletter">
        <input type="checkbox" id="abonne" name="newsletter">
        <label for="abonne" class="news">Je m'abonne à votre Newsletter</label>
      </div>

      <p>En cliquant sur S'inscrire, vous acceptez nos <br/><br/><span><a href="" class="conditions">Conditions d'utilisations</a></span></p>

      <div class="">
        <div class="col-12">
          <button type="submit" class="inscription" name="subscribe">S'inscrire</button>
        </div>
      </div><br>


      <div class="compte">
        Déjà un compte?
        <a href="http://crypto.boss-arts.com/connexion.php" class="connecter">Se connecter</a>
      </div> <br>
    </form>
  </div>

  <div class="bas">
    <div class="balises-foot-code">
      <?php include('balises/foot-code.php');?>
    </div>        

    <div class="footer">
      <?php include('footer.php');?> 
    </div>
  </div>

</body>
</html>