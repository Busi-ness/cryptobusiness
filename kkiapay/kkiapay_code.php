<?php
namespace Kkiapay;

require_once 'vendor/autoload.php';

include_once('src/Kkiapay.php');

$public_key = "09f003b0011c11eda56ad905c440058f";
$private_key = "tpk_09f02ac1011c11eda56ad905c440058f";
$secret = "tsk_09f02ac2011c11eda56ad905c440058f";

$kkiapay = new \Kkiapay\Kkiapay($public_key,
                                $private_key, 
                                $secret, 
                                $sandbox = true);

$verify = $kkiapay->verifyTransaction("rylZLk8z4");



//$refund = $kkiapay->refundTransaction("oldnbsc");

// $payout = $kkiapay->setupPayout(array( "algorithm" => "rate", "send_notification" => true, "destination_type" => "MOBILE_MONEY", "rate_frequency" => "1m", "destination" => "22997000000" ));

var_dump($verify);



?>