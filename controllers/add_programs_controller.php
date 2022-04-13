<?php
declare(strict_types=1);
//si utilisateur n'est pas admin ou qu'il n'est pas connecté on lui bloque l'acces
if(($_SESSION['userType']) !== "admin" || !isset($_SESSION['auth'])) {
	exit("Vous n'avez pas de droits");
}
require_once './models/program_manager.php';
//*********************************************************CONDITIONS DU FORMULAIRE*************************************************
if(!empty($_POST)){
	
	if(checkProgramName() === false)
	{
		$errors = "*Nom du programme est déjà utilisé*";
	}
	elseif(isProgramFormValid() && isProgramFormSubmitted() && empty($errors))//s'il n'ya pas d'erreurs on insére cela a sql
	{
		registerValidatePrograms();	
		$succes = "Nouveau programme ajouté!";
	}
	else {
		$errors = "*Saisi incorrect*";
	}
}	


require './views/add_programs.phtml';