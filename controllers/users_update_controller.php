<?php

//si utilisateur n'est pas admin ou qu'il n'est pas connecté on lui bloque l'acces
if(($_SESSION['userType']) !== "admin" || !isset($_SESSION['auth'])) {
	exit("Vous n'avez pas de droits");
}

require_once './models/users_manager.php';
require_once './models/registration_manager.php';


// MODIFICATION DU PROGRAMME

if(!empty($_POST))
{
   $updateInitials = htmlspecialchars($_POST ['initials']);
   $updateTel = htmlspecialchars($_POST ['tel']);
   $updateEmail = htmlspecialchars($_POST ['email']);
   $updateCommissionStage = htmlspecialchars($_POST ['commissionStage']);

   $sql =$pdo->prepare('UPDATE `users` SET 
   initials = :initials ,
   tel = :tel ,
   email = :email ,
   commissionStage = :commissionStage 

   WHERE id = :id');
   $sql->execute([

      'initials'=> $updateInitials,
      'tel'=> $updateTel,
      'email'=>$updateEmail,
      'commissionStage'=> $updateCommissionStage,
      'id'=>$usId
  
     ]);

   $succes = "Felicitation! L'utilisateur a bien été mis à jour!";
}

//SUPPRIMER L'UTILISATEUR
if(isset($_POST['delete_users'])) {
    
   $pdo->prepare('DELETE FROM users WHERE id = :id')->execute(['id'=> $usId]);
   header('Location:index.php?page=users');
 }

require './views/users_update.phtml';




