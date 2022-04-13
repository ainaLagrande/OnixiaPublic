<?php
declare(strict_types=1);

//si utilisateur n'est pas admin ou qu'il n'est pas connecté on lui bloque l'acces
if(($_SESSION['userType']) !== "admin" || !isset($_SESSION['auth'])) {
	exit("Vous n'avez pas de droits");
}
require_once './models/lot_manager.php';
//*********************************************************CONDITIONS DU FORMULAIRE*************************************************
if(!empty($_POST)){

	if(checkLotNumero() === false)
	{
		$errors = "*Numéro de lot est déjà utilisé*";
	}
	elseif(isLotsFormValid() && isLotFormSubmitted() && empty($errors))
    {
        lotsValidate();
		$succes = "Nouveau lot ajouté!";
    }
	else {
		$errors = "*Saisi incorrect*";
	}
}
require './views/add_lots.phtml';