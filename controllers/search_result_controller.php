<?php
declare(strict_types=1);
//si personne n'est connecté
if(!isset($_SESSION['auth'])) {
	exit("Vous n'avez pas de droits");
}
require_once './models/program_manager.php';

	//PAGINATION PHP 
	$programmesParPage = 6;
	$programmesTotalReq = $pdo->query('SELECT id FROM programs');
	$programmesTotal = $programmesTotalReq->rowCount();
	$pagesTotales = ceil($programmesTotal/$programmesParPage);
	if(isset($_GET['pagination']) AND !empty($_GET['pagination']) AND $_GET['pagination'] > 0 AND $_GET['pagination'] <= $pagesTotales){
		
		$_GET['pagination'] = intval($_GET['pagination']);
		$pageCourante = $_GET['pagination'];
	}
	else{
		$pageCourante = 1;
	}
	$depart = ($pageCourante-1) * $programmesParPage;

$searchPrograms = $pdo->query('SELECT *  FROM programs ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
// RECHERCHE PAR PROGRAMME 
if(isset($_POST['q']) AND !empty($_POST['q'])) {
   $q = htmlspecialchars($_POST['q']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programName LIKE "%'.$q.'%" ORDER BY id DESC');
}
// RECHERCHE RAPIDE 
elseif(isset($_POST['searchLocalisation']) AND !empty($_POST['searchLocalisation'])) {
   $searchLocalisation = htmlspecialchars($_POST['searchLocalisation']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programCity LIKE "%'.$searchLocalisation.'%"  OR programPostalCity LIKE "%'.$searchLocalisation.'%" ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
}
// FISCALITE 
elseif(isset($_POST['searchFiscality']) AND !empty($_POST['searchFiscality'])) {
   $searchFiscality = htmlspecialchars($_POST['searchFiscality']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programFiscality   LIKE "%'.$searchFiscality.'%" ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
}
// COMMISSION 
elseif(isset($_POST['searchCommission']) AND !empty($_POST['searchCommission'])) {
   $searchCommission = htmlspecialchars($_POST['searchCommission']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programCommission BETWEEN "'.$searchCommission.'" AND 1000   ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
}

// ZONE FISCLAE 
elseif(isset($_POST['searchZone']) AND !empty($_POST['searchZone'])) {
   $searchZone = htmlspecialchars($_POST['searchZone']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programZoneFiscal   LIKE "%'.$searchZone.'%" ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
}
// PROMOTEUR 
elseif(isset($_POST['searchPromoter']) AND !empty($_POST['searchPromoter'])) {
   $searchPromoter = htmlspecialchars($_POST['searchPromoter']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programPromoter   LIKE "%'.$searchPromoter.'%" ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
}
//  LES 2 
// LOCALISATION 
// LA LOCALISATION ET FISCALITE ENSEMBLE 
if(isset($_POST['searchLocalisation']) AND  isset($_POST['searchFiscality'])  AND !empty($_POST ['searchFiscality']) AND !empty($_POST ['searchLocalisation'])) {
   $searchFiscality = htmlspecialchars($_POST['searchFiscality']);
   $searchLocalisation = htmlspecialchars($_POST['searchLocalisation']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programFiscality   LIKE "%'.$searchFiscality.'%"  AND programCity LIKE "%'.$searchLocalisation.'%" ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
}
// LA LOCALISATION ET COMMISSION ENSEMBLE 
if(isset($_POST['searchLocalisation']) AND  isset($_POST['searchCommission'])  AND !empty($_POST ['searchCommission']) AND !empty($_POST ['searchLocalisation'])) {
   $searchCommission = htmlspecialchars($_POST['searchCommission']);
   $searchLocalisation = htmlspecialchars($_POST['searchLocalisation']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programCommission   BETWEEN "'.$searchCommission.'" AND 1000  AND programCity LIKE "%'.$searchLocalisation.'%" ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
}
// LA LOCALISATION ET ZONE FISCALE ENSEMBLE 
if(isset($_POST['searchLocalisation']) AND  isset($_POST['searchZone'])  AND !empty($_POST ['searchZone']) AND !empty($_POST ['searchLocalisation'])) {
   $searchZone = htmlspecialchars($_POST['searchZone']);
   $searchLocalisation = htmlspecialchars($_POST['searchLocalisation']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programZoneFiscal   LIKE "%'.$searchZone.'%"  AND programCity LIKE "%'.$searchLocalisation.'%" ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
}
// LA LOCALISATION ET PROMOTEUR ENSEMBLE 
if(isset($_POST['searchLocalisation']) AND  isset($_POST['searchPromoter'])  AND !empty($_POST ['searchPromoter']) AND !empty($_POST ['searchLocalisation'])) {
   $searchPromoter = htmlspecialchars($_POST['searchPromoter']);
   $searchLocalisation = htmlspecialchars($_POST['searchLocalisation']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programPromoter   LIKE "%'.$searchPromoter.'%"  AND programCity LIKE "%'.$searchLocalisation.'%" ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
}

// FISCALITE
// LA FISCALITE ET COMMISSION ENSEMBLE 
if(isset($_POST['searchFiscality']) AND  isset($_POST['searchCommission'])  AND !empty($_POST ['searchCommission']) AND !empty($_POST ['searchFiscality'])) {
   $searchCommission = htmlspecialchars($_POST['searchCommission']);
   $searchFiscality = htmlspecialchars($_POST['searchFiscality']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programCommission   BETWEEN "'.$searchCommission.'" AND 1000  AND programFiscality LIKE "%'.$searchFiscality.'%" ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
}
// LA FISCALITE ET ZONE FISCALE ENSEMBLE 
if(isset($_POST['searchFiscality']) AND  isset($_POST['searchZone'])  AND !empty($_POST ['searchZone']) AND !empty($_POST ['searchFiscality'])) {
   $searchZone = htmlspecialchars($_POST['searchZone']);
   $searchFiscality = htmlspecialchars($_POST['searchFiscality']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programZoneFiscal   LIKE "%'.$searchZone.'%"  AND programFiscality LIKE "%'.$searchFiscality.'%" ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
}
// LA FISCALITE ET PROMOTEUR ENSEMBLE 
if(isset($_POST['searchFiscality']) AND  isset($_POST['searchPromoter'])  AND !empty($_POST ['searchPromoter']) AND !empty($_POST ['searchFiscality'])) {
   $searchPromoter = htmlspecialchars($_POST['searchPromoter']);
   $searchFiscality = htmlspecialchars($_POST['searchFiscality']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programPromoter   LIKE "%'.$searchPromoter.'%"  AND programFiscality LIKE "%'.$searchFiscality.'%" ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
}

// COMMISSION
// LA COMMISSION ET ZONE FISCALE ENSEMBLE 
if(isset($_POST['searchCommission']) AND  isset($_POST['searchZone'])  AND !empty($_POST ['searchZone']) AND !empty($_POST ['searchCommission'])) {
   $searchZone = htmlspecialchars($_POST['searchZone']);
   $searchCommission = htmlspecialchars($_POST['searchCommission']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programZoneFiscal   LIKE "%'.$searchZone.'%"  AND programCommission BETWEEN "'.$searchCommission.'" AND 1000 ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
}
// LA COMMISSION ET PROMOTEUR ENSEMBLE 
if(isset($_POST['searchCommission']) AND  isset($_POST['searchPromoter'])  AND !empty($_POST ['searchPromoter']) AND !empty($_POST ['searchCommission'])) {
   $searchPromoter = htmlspecialchars($_POST['searchPromoter']);
   $searchCommission = htmlspecialchars($_POST['searchCommission']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programPromoter   LIKE "%'.$searchPromoter.'%"  AND programCommission BETWEEN "'.$searchCommission.'" AND 1000 ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
}
// LES 3 
// LA LOCALISATION, FISCALITE ET COMMISSION ENSEMBLE 
if(isset($_POST['searchLocalisation']) AND  isset($_POST['searchFiscality']) AND  isset($_POST['searchCommission'])
 AND !empty($_POST ['searchFiscality']) AND !empty($_POST ['searchLocalisation'])AND !empty($_POST ['searchCommission'])) {
   $searchFiscality = htmlspecialchars($_POST['searchFiscality']);
   $searchLocalisation = htmlspecialchars($_POST['searchLocalisation']);
   $searchCommission = htmlspecialchars($_POST['searchCommission']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programFiscality   LIKE "%'.$searchFiscality.'%"  AND programCity LIKE "%'.$searchLocalisation.'%"
   AND programCommission BETWEEN "'.$searchCommission.'" AND 1000 ORDER BY id LIMIT '.$depart.','.$programmesParPage);
}
// LA LOCALISATION, FISCALITE ET ZONE ENSEMBLE 
if(isset($_POST['searchLocalisation']) AND  isset($_POST['searchFiscality']) AND  isset($_POST['searchZone'])
 AND !empty($_POST ['searchFiscality']) AND !empty($_POST ['searchLocalisation'])AND !empty($_POST ['searchZone'])) {
   $searchFiscality = htmlspecialchars($_POST['searchFiscality']);
   $searchLocalisation = htmlspecialchars($_POST['searchLocalisation']);
   $searchZone = htmlspecialchars($_POST['searchZone']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programFiscality   LIKE "%'.$searchFiscality.'%"  AND programCity LIKE "%'.$searchLocalisation.'%"
   AND programZoneFiscal LIKE "%'.$searchZone.'%" ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
}
// LA LOCALISATION, COMMISSION ET ZONE ENSEMBLE 
if(isset($_POST['searchLocalisation']) AND  isset($_POST['searchCommission']) AND  isset($_POST['searchZone'])
AND !empty($_POST ['searchLocalisation'])AND !empty($_POST ['searchCommission']) AND !empty($_POST ['searchZone'])) {
   $searchLocalisation = htmlspecialchars($_POST['searchLocalisation']);
   $searchCommission = htmlspecialchars($_POST['searchCommission']);
   $searchZone = htmlspecialchars($_POST['searchZone']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programCity LIKE "%'.$searchLocalisation.'%"
   AND programCommission BETWEEN "'.$searchCommission.'" AND 1000  AND programZoneFiscal LIKE "%'.$searchZone.'%"
   ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
}
// LA FISCALITE ,COMMISSION ET ZONE ENSEMBLE 
if(isset($_POST['searchFiscality']) AND  isset($_POST['searchCommission']) AND  isset($_POST['searchZone'])
 AND !empty($_POST ['searchFiscality']) AND !empty($_POST ['searchCommission']) AND !empty($_POST ['searchZone'])) {
   $searchFiscality = htmlspecialchars($_POST['searchFiscality']);
   $searchCommission = htmlspecialchars($_POST['searchCommission']);
   $searchZone = htmlspecialchars($_POST['searchZone']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programFiscality   LIKE "%'.$searchFiscality.'%"
   AND programCommission BETWEEN "'.$searchCommission.'" AND 1000  AND programZoneFiscal LIKE "%'.$searchZone.'%"
   ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
}
// LES 4 
if(isset($_POST['searchLocalisation']) AND  isset($_POST['searchFiscality']) AND  isset($_POST['searchCommission']) AND  isset($_POST['searchZone'])
 AND !empty($_POST ['searchFiscality']) AND !empty($_POST ['searchLocalisation'])AND !empty($_POST ['searchCommission']) AND !empty($_POST ['searchZone'])) {
   $searchFiscality = htmlspecialchars($_POST['searchFiscality']);
   $searchLocalisation = htmlspecialchars($_POST['searchLocalisation']);
   $searchCommission = htmlspecialchars($_POST['searchCommission']);
   $searchZone = htmlspecialchars($_POST['searchZone']);
   $searchPrograms = $pdo->query('SELECT * FROM programs WHERE programFiscality   LIKE "%'.$searchFiscality.'%"  AND programCity LIKE "%'.$searchLocalisation.'%"
   AND programCommission BETWEEN "'.$searchCommission.'" AND 1000  AND programZoneFiscal LIKE "%'.$searchZone.'%"
   ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
}

require './views/search_result.phtml';