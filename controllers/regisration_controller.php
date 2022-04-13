<?php
declare(strict_types=1);

//si utilisateur n'est pas admin ou qu'il n'est pas connecté on lui bloque l'acces
if(($_SESSION['userType']) !== "admin" || !isset($_SESSION['auth'])) {
	exit("Vous n'avez pas de droits");
}
require_once './models/registration_manager.php';

//*********************************************************CONDITIONS DU FORMULAIRE*************************************************

if(!empty($_POST)){

	if(checkUser() === false)
    {
        $errors = "*Email déjà utilisé*";

    }
    elseif(passwordValidate() === false)
    {
        $errors = "*Les mots de passe ne matchent pas*";
    }
    elseif(emailValidate() === false)
    {
        $errors = "*Email non valide*";
    }
	elseif(isUserFormValid() && isUserFormSubmitted() && empty($errors))//s'il n'ya pas d'erreurs on insére cela a sql
	{
		registerUserValidate();
        $succes = "Un nouveau membre est ajouté!";
	}
	else {
		$errors = "*Saisi incorrect*";
	}
    $_SESSION['commissionStage'] = $_POST['commissionStage'];
    $name = $_SESSION['commissionStage']; 

    
    
	
}



require './views/registration.phtml';