<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css_perso/style.css">
  <link rel="stylesheet" href="css_perso/inscription.css">
  <link rel="icon" type="image/x-icon" href="logos/favicon_LOGO_CRYPTO_BUSINESS_SITE_WEB.ico">
  <title>Modifier Téléphone | Crypto Business</title>
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
  />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
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

    if ($getid = $_SESSION['id']) 
    {

$id = $userinfo['id'];

        if ($getid = $id) 
        {

      ?>

      <br/> <br/><br/>
      <div class="formgroup"> <br>
        <div class="entete">
          <h2>Modifier numéro de téléphone ou Whatsapp</h2>
          <hr>      
        </div>
        <form id="login" onsubmit="process(event)" action="" method="POST">
         <p>Entrer le numéro de téléphone</p>
         <input id="phone" type="tel" name="phone" /><br/><br/>
         <button type="submit" class="inscription btn" name="" >Modifier</button>
       </form><br/>
     </div> <br/>
     <div class="alert alert-info" style="display: none;"></div> <br/>




     <?php

     if (isset($_POST['valider'])) 
     {

      $phone = $_POST['phoneNumber'];

      $updatephone = $bdd->prepare("UPDATE users_admins SET phone = ?  WHERE id = ?");
      $updatephone->execute(array($phone, $_SESSION['id']));

       $updatephone_news = $bdd->prepare("UPDATE abonnes_newsletters SET phone = ?  WHERE email = ?");
      $updatephone_news->execute(array($phone,  $userinfo['email']));

      $note = "Numéro modifié avec succès";
      echo $note;


    }else
    {
      //else dle bouton submit n'a pas été cliqué

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

}else
{
     //else si l'id n'est pas dans la base de données
  header('Location: http://crypto.boss-arts.com/connexion.php');
}

if (isset($_POST['modifier']) AND !empty($_POST['modifier'])) 

{

}

?>




<div class="bas">
  <div class="balises-foot-code">
    <?php include('balises/foot-code.php');?>
  </div>

  <div class="footer">
    <?php include('footer.php');?> 
  </div>
</div>
</body>

<script>



  const phoneInputField = document.querySelector("#phone");

  const phoneInput = window.intlTelInput(phoneInputField, {
    preferredCountries: ['bj', 'ci', 'bf','ml','tg','kw','ma'],

    utilsScript:
    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",

  });


  const info = document.querySelector(".alert-info");

  function process(event) {
   event.preventDefault();

   const phoneNumber = phoneInput.getNumber();

   info.style.display = "";
   info.innerHTML = `

<div class="formgroup"> <br>
        <div class="entete">
          <h2>Valider numéro de téléphone ou Whatsapp</h2>
          <hr>      
        </div>
        <form action="" method="POST">

         <p>Numéro de téléphone modifié à:<p> <br/>
   <input type="text" value="${phoneNumber}" name="phoneNumber">
      
         <br/><br/><button type="submit" class=" inscription btn" name="valider" >Valider</button>
       </form><br/>
     </div>

  `;
 }


</script>
</html>
<!-- 
<input type="number" value="">

info.innerHTML = `Numéro de téléphone modifié à: <br/>
   <input type="text" value="${phoneNumber}" name="phoneNumber">`; -->