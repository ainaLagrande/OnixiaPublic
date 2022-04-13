<?php
//*************** */ RECUPERER LES USERS BY ID 
if(isset($_GET['id']) AND !empty($_GET['id'])) {
	$get_users_id = htmlspecialchars($_GET['id']);
	$us = $pdo->prepare('SELECT * FROM users WHERE id = ?');
	$us->execute(array($get_users_id));
	if($us->rowCount() == 1) {
	   $us = $us->fetch();
	   $usId= $us['id'];
		$usInitials = $us['initials'];
		$usTel = $us["tel"];
		$usEmail = $us["email"];
		$usPassword = $us["password"];
		$usCommissionStage = $us["commissionStage"];
	} 
 }
 
//Tutes les infos d'une session
 $userId = $_SESSION['id'];
 $req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
 $req->execute([$userId]);
 $userUnique = $req->fetch();

if($userUnique) {
	$_SESSION['all'] = $userUnique;//represente la somme des informations sur le User
}
