<?php
declare(strict_types=1);

//si personne n'est connecté
if(!isset($_SESSION['auth'])) {
	exit("Vous n'avez pas de droits");
}
// require_once './controllers/heart_controller.php';
require './models/users_manager.php';
require_once './models/program_manager.php';
require './models/registration_manager.php';
// require './models/users_manager.php';

require './views/program.phtml';