<?php

declare(strict_types=1);
//si utilisateur n'est pas admin ou qu'il n'est pas connecté on lui bloque l'acces
if(($_SESSION['userType']) !== "admin" || !isset($_SESSION['auth'])) {
	exit("Vous n'avez pas de droits");
}

require './views/users.phtml';