<?php
session_start();
require_once("fonction.php");
$login = $_POST["email"];
$pass = $_POST["pass"];

$cnx = getConnexion();
$rst = mysqli_query($cnx, "select * from user where emailuser='{$login}'");
$existe = 0;
if(mysqli_num_rows($rst) > 0){
    while($d= mysqli_fetch_array($rst)){
        if(password_verify($pass, $d["passworduser"])){
        $_SESSION["iduser"]=$d["iduser"];
        $_SESSION["user"]= $d["prenomuser"]." ".$d["nameuser"];
        $_SESSION["etat"]= $d["etatuser"];
        $existe = 1;}
    }   
}

if ($existe == 0){
    $_SESSION["erreur"] = "votre login ou password invalid";
    $_SESSION["type_erreur"] = "warning";
    header("location:connexion.php");
}else{
    $date= date("d-m-y h:m:s");
    $rst = mysqli_query($cnx,"update user set dateaccess='{$date}' where iduser='{$_SESSION["iduser"]}'");
    header("location: messagerie.php");
}

?>