<?php

    require_once('vendor/autoload.php');

//S'authentifier avec la clé secrète

/* Remplacez VOTRE_CLE_API par votre véritable clé API */
  \FedaPay\FedaPay::setApiKey("sk_sandbox_CeUiXQhz4bqJ9Y_591MzZPag");

  /* Précisez si vous souhaitez exécuter votre requête en mode test ou live */
  \FedaPay\FedaPay::setEnvironment('sandbox'); //ou setEnvironment('live');

?>