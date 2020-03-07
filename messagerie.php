<?php
session_start();
if(!isset($_SESSION["user"])){
    $_SESSION["erreur"] = "vous devez etre connecté";
    $_SESSION["type_erreur"] = "danger";
    header("location:connexion.php");
}

require_once("fonction.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        <?php
        include_once("header.php");
        ?>

        <div class="row">
            <?php
         include_once("left.php");
        
        ?>


            <div class="col-md-9">
                <?php
                if(sizeof(getAllMessagesRecusNonLu($_SESSION["iduser"]))>0){
                
                ?>
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <h4> Vous avez <?= sizeof( getAllMessagesRecusNonLu($_SESSION["iduser"])) ?> nouveaux messages</h4>
                    </div>
                </div>
                <?php
                }
                ?>

               <?php
               include_once("messg.php");
               ?>



            </div>

        </div>

    </div>


</body>

</html>