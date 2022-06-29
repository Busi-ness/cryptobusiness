
<?php

session_start();

setcookie('email','',time()-3600);
setcookie('password','',time()-3600);

$_SESSION = array();

session_destroy();

header("Location: http://crypto.boss-arts.com/admin/connexion.php");


?>