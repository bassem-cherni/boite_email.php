<?php 

function getConnexion(){
	
	return mysqli_connect("localhost","root","","base_messagerie");
}
function getUsers(){

	$cnx=getConnexion();
	$req=mysqli_query($cnx,"select * from user");
	$tab=[];
	while($d=mysqli_fetch_array($req)){

		$tab []=$d;

	}
	mysqli_free_result($req);
	mysqli_close($cnx);
	return $tab;
}
function getAllMessagesRecus($iduser){

	$cnx=getConnexion();
	$req=mysqli_query($cnx,"select * from message where userreceive={$iduser}");
	$tab=[];
	while($d=mysqli_fetch_array($req)){

		$tab []=$d;

	}
	mysqli_free_result($req);
	mysqli_close($cnx);
	return $tab;
}
function getAllMessagesEnvoyes($iduser){

	$cnx=getConnexion();
	$req=mysqli_query($cnx,"select * from message where usersend={$iduser}");
	$tab=[];
	while($d=mysqli_fetch_array($req)){

		$tab []=$d;

	}
	mysqli_free_result($req);
	mysqli_close($cnx);
	return $tab;
}
function getAllMessagesRecusNonLu($iduser){

	$cnx=getConnexion();
	$req=mysqli_query($cnx,"select * from message where userreceive={$iduser} and receiveread=0");
	$tab=[];
	while($d=mysqli_fetch_array($req)){

		$tab[]=$d;

	}
	mysqli_free_result($req);
	mysqli_close($cnx);
	return $tab;
}
function sendMessage($idsend,$idreceive,$titre,$message){

	$cnx=getConnexion();
	$date=Date("Y-m-d h:m:s");
	$req=mysqli_query($cnx,"insert into message values(null,{$idsend},{$idreceive},'{$titre}','{$message}','{$date}',0,0,0,0)");
	mysqli_free_result($req);
	mysql_close($cnx);

}
function deleteSend($idsend,$idmessage){

	$cnx=getConnexion();
	$req=mysqli_query($cnx,"update message set senddel=1 where idmessage={$idmessage}");
	mysql_close($cnx);

}
function deleteReceive($idsend,$idmessage){

	$cnx=getConnexion();
	$req=mysqli_query($cnx,"update message set receivedel=1 where idmessage={$idmessage}");
	mysql_close($cnx);

}
function getMessageRecu($idmessage){

	$cnx=getConnexion();
	$req=mysqli_query($cnx,"select * from message where idmessage={$idmessage}");
	$message=null;
	while($t=mysqli_fetch_array($req)){

		$message=$d;

	}
		$req2=mysqli_query($cnx,"update message set receiveread=1 where idmessage={$idmessage}");
	mysqli_free_result($req);
	mysqli_close($cnx);
	return $message;
}

function getUserById(){
    
}