<?php
declare(strict_types=1);
//si personne n'est connecté
if(!isset($_SESSION['auth'])) {
	exit("Vous n'avez pas de droits");
}
require './views/home_user_page.phtml';