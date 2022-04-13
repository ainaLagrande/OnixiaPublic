<?php
declare(strict_types=1);
require_once './models/lot_manager.php';
//si personne n'est connecté
if(!isset($_SESSION['auth'])) {
	exit("Vous n'avez pas de droits");
}
require './views/lots.phtml';