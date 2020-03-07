<?php
session_start();
unset($_SESSION["iduser"]);
unset($_SESSION["user"]);
$_SESSION["erreur"]= "merci frr";
$_SESSION["type_erreur"] = "success";

header("location:connexion.php");

?>