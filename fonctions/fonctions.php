<?php

function supprimer($var)

{

   $replaced = preg_replace("/\s+/", "", $var);

   echo $replaced;

}



supprimer("baba 	50 		");

$name = "Je suis un con @gmail.com	";

$test = supprimer(htmlentities($name));

echo $test;


 $str = 'Welcom 	to WayToLearnX.';
  $replaced = preg_replace("/\s+/", "", $str);
  echo $replaced;


?>