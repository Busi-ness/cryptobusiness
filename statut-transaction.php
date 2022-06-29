<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <?php include('balises/head-code.php');?>
    <link rel="icon" type="image/x-icon" href="logos/favicon_LOGO_CRYPTO_BUSINESS_SITE_WEB.ico">
    <title>Statut Transacton | Crypto Business</title>
</head>
<body>

    <?php

//Mettre le fichier autoload pour le chargement de la librairie
    require_once('vendor/autoload.php');

    if (isset($_GET['id']) AND !empty($_GET['id'])) 
    {
        $id_trans = intval($_GET['id']);

        include ('bdd_config.php');

        /*$transaction_id = $_POST['transaction_id'];*/

        $check_tr = $bdd->prepare("SELECT * FROM transactions WHERE id_transaction = ? AND termine_tr = '0' ");
        $check_tr->execute(array($id_trans));
        $id_trans_exist = $check_tr->fetch();

        if ($id_trans_exist) 
        {

            if (isset($_GET['status']) AND !empty($_GET['status'])) 
            {
                $getstatus = $_GET['status']; 
                
                switch($getstatus){
                    case "approved":
                    echo "Merci! la transaction a été approuvé. <a href='http://crypto.boss-arts.com/transactions.php'>Voir les transactions</a>";
                    break;
                    case 'canceled':
                    echo "La transaction a été annulée";
                    break;
                    case 'pending':
                    echo "La transaction est en attente";
                    break;
                    case 'declined':
                    echo "La transaction a été déclinée";
                    break;
                    case 'refunded':
                    echo "La transaction a été remboursée";
                    break;
                    
                    default:
                    header('Location: http://crypto.boss-arts.com/connexion.php');

                }

                if ($getstatus == 'approved') 
                {


                    $status = "approved";
                    $termine_tr = "1";

                    echo $id_trans;

                    $updatstatus = $bdd->prepare('UPDATE transactions SET status_feda = ?, termine_tr = ? WHERE id_transaction = ?');
                    $updatstatus->execute(array($status, $termine_tr, $id_trans
                    ));
                    

                }


            }else
            {
                header('Location: http://crypto.boss-arts.com/connexion.php');
            }
            


        }else
        {
            header('Location: http://crypto.boss-arts.com/connexion.php');
        }

        



    }


    ?>


</body>
</html>


