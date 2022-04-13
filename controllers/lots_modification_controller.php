<?php

//si utilisateur n'est pas admin ou qu'il n'est pas connecté on lui bloque l'acces
if(($_SESSION['userType']) !== "admin" || !isset($_SESSION['auth'])) {
	exit("Vous n'avez pas de droits");
}
require_once './models/lot_manager.php';

//  MODIFIER LE LOT 
if(!empty($_POST))
{
   $sql =$pdo->prepare('UPDATE `lots` SET 
   lotProgramName = :lotProgramName,
   lotNumero = :lotNumero,
   room = :room,
   area = :area,
   price = :price,
   stage = :stage,
   rent = :rent,
   lotsDate = :lotsDate,
   honorary = :honorary,
   available = :available

    WHERE id = :id');

   $updateLotProgramName = htmlspecialchars($_POST ['lotProgramName']);
   $updateLotNumero = htmlspecialchars($_POST ['lotNumero']);
   $updateRoom = htmlspecialchars($_POST ['room']);
   $updateArea = htmlspecialchars($_POST ['area']);
   $updatePrice = htmlspecialchars($_POST ['price']);
   $updateStage = htmlspecialchars($_POST ['stage']);
   $updateRent = htmlspecialchars($_POST ['rent']);
   $updateLotsDate = htmlspecialchars($_POST ['lotsDate']);
   $updateHonorary = htmlspecialchars($_POST ['honorary']);
   $updateAvailable = htmlspecialchars($_POST ['available']);


   $sql->execute([
      'lotProgramName'=> $updateLotProgramName,
      'lotNumero'=> $updateLotNumero,
      'room'=> $updateRoom,
      'area'=> $updateArea,
      'price'=> $updatePrice,
      'stage'=> $updateStage,
      'rent'=> $updateRent,
      'lotsDate'=> $updateLotsDate,
      'honorary'=> $updateHonorary,
      'available'=> $updateAvailable,
      'id'=>$loId
     ]);
     
   $succes = "Felicitation!Le lot a bien été mis à jour!";
}

//SUPPRIMER LE LOT
if(isset($_POST['delete_lot'])) {
    
   $pdo->prepare('DELETE FROM lots WHERE id = :id')->execute(['id'=> $loId]);
   header('Location:index.php?page=lots');
}


require './views/lots_modification.phtml';