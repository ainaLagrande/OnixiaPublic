<?php
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
	
//CHERCHER LES PROGRAMMES
function fetchAllPrograms(\PDO $pdo): array
{
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
    $query = $pdo->prepare('SELECT * FROM programs ORDER BY id DESC LIMIT '.$depart.','.$programmesParPage);
    $query->execute();
    return $query->fetchAll(\PDO::FETCH_ASSOC);
}

//stocker les programmes dans une variable
$programs =  fetchAllPrograms($pdo);


//RECHERCHE  DE PROMOTTEURS 
function fetchPromoters(\PDO $pdo): array
{
    $query = $pdo->prepare('SELECT *  FROM `promoters`');
    $query->execute();
    return $query->fetchAll(\PDO::FETCH_ASSOC);
}
//stocker les programmes Disctinct
$promoters =  fetchPromoters($pdo);

//RECHERCHE  DE PRESTIGES 
function fetchPrestiges(\PDO $pdo): array
{
    $query = $pdo->prepare('SELECT *  FROM `prestiges`');
    $query->execute();
    return $query->fetchAll(\PDO::FETCH_ASSOC);
}
//stocker les prestiges
$prestiges =  fetchPrestiges($pdo);

//RECHERCHE  DE ZONES 
function fetchFiscalite(\PDO $pdo): array
{
    $query = $pdo->prepare('SELECT *  FROM `fiscalite`');
    $query->execute();
    return $query->fetchAll(\PDO::FETCH_ASSOC);
}
//stocker les programmes Disctinct
$fiscalities =  fetchFiscalite($pdo);

//RECHERCHE  DE FISCALITE 
function fetchZones(\PDO $pdo): array
{
    $query = $pdo->prepare('SELECT *  FROM `zones`');
    $query->execute();
    return $query->fetchAll(\PDO::FETCH_ASSOC);
}
//stocker les programmes Disctinct
$zones =  fetchZones($pdo);
//verifier si le nom du programme existe deja
function checkProgramName()
{
	require './core/connection.php';
	$sql = 'SELECT id,programName FROM programs WHERE programName = :programName ';
    $query = $pdo->prepare($sql);
    $query->execute([
		'programName'=> $_POST ['programName']
	]);
    $check = $query->fetch(PDO::FETCH_ASSOC);
    $checkProgramName = $query->rowCount();

    if($checkProgramName === 1)//si l'user existe déjà on affiche ce message la 
	{
		return false;
	}
}

//IMG VARIABLES
function imgRequest(){//verifier les img
    
    $tmpName = $_FILES['programImg']['tmp_name'];
    $name = $_FILES['programImg']['name'];
    $size = $_FILES['programImg']['size'];
    $error = $_FILES['programImg']['error'];

    $extensions = ['jpg', 'png', 'jpeg', 'gif','svg','pdf','jfif'];//extensions autorisés
    $maxSize = 40000000;//taille max autorisé

    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));

    $uniqueName = uniqid('', true);
    $file = $uniqueName.".".$extension;

    move_uploaded_file( './upload/'.$name,$tmpName);

    if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
        return true;
    }
}

//DOCS VARIABLES
function docRequest(){//verifier les img
 
	$tmpDocName = $_FILES['programDocuments']['tmp_name'];
    $docName = $_FILES['programDocuments']['name'];
    $docSize = $_FILES['programDocuments']['size'];
    $docError = $_FILES['programDocuments']['error'];

    $docExtensions = ['jpg', 'png', 'jpeg', 'gif','svg','pdf','jfif'];//extensions autorisés
    $docMaxSize = 400000;//taille max autorisé

    $docTabExtension = explode('.', $docName);
    $docExtension = strtolower(end($docTabExtension));

    $docUniqueName = uniqid('', true);
    $docFile = $docUniqueName.".".$docExtension;
	
    move_uploaded_file('./upload/'. $tmpDocName,$docFile);
	
    if(in_array($docExtension, $docExtensions) && $docSize <= $docMaxSize && $docError == 0) {
        return true;
    }
}
//si le programme est soumis
function isProgramFormSubmitted():bool 
{
	return isset($_POST['programName']) && isset($_POST['programPromoter']) 
	&& isset($_POST['programActability']) && isset($_POST['programFiscality'])
	&& isset($_POST['programDateDelivery']) && isset($_POST['programCommission'])
	&& isset($_POST['programAdress']) && isset($_POST['priceFrom'])
	&& isset($_POST['programPostalCity']) && isset($_POST['programPostalCity'])
	&& isset($_FILES['programImg'])&& isset($_FILES['programDocuments']) 
	&& isset($_POST['programZoneFiscal'])&& isset($_POST['programTypologie']) 
	&& isset($_POST['programPreveligies'])&& isset($_POST['programDescription']);
}

 //si le programme n'est pas vide

function isProgramFormValid():bool 
{
	return !empty($_POST['programName']) && !empty($_POST['programPromoter']) 
	&& !empty($_POST['programActability']) && !empty($_POST['programFiscality'])
	&& !empty($_POST['programDateDelivery']) && !empty($_POST['programCommission'])
	&& !empty($_POST['programAdress']) && !empty($_POST['programCity'])
	&& !empty($_POST['priceFrom'])
	&& !empty($_POST['programPostalCity']) && !empty($_POST['programZoneFiscal']) 
	&& !empty($_POST['programTypologie']) && !empty($_POST['programDescription']);
}


//INSERER LE PROGRAMME DANS LA BDD 

function registerValidatePrograms()
{
	require './core/connection.php';
	// INSERT 
	$sql = 'INSERT INTO programs (programName,programPromoter,programActability,programFiscality,programDateDelivery, 
	programCommission,programAdress, programCity, programPostalCity,priceFrom,
	programImg,programDocuments,programZoneFiscal,programTypologie,programPreveligies,programDescription) 
	VALUES(:programName,:programPromoter,:programActability,:programFiscality,:programDateDelivery,
	:programCommission,:programAdress,:programCity,:programPostalCity,:priceFrom,
	:programImg,:programDocuments,:programZoneFiscal,:programTypologie,:programPreveligies,:programDescription)';

	$query = $pdo->prepare($sql);

	// IMG VARIABLES FOR INSERT
	$tmpName = $_FILES['programImg']['tmp_name'];
    $name = $_FILES['programImg']['name'];
    $size = $_FILES['programImg']['size'];
    $error = $_FILES['programImg']['error'];
    $extensions = ['jpg', 'png', 'jpeg', 'gif','pdf'];//extensions autorisés
    $maxSize = 400000;//taille max autorisé
    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));
    $uniqueName = uniqid('', true);
    $file = $uniqueName.".".$extension;
    move_uploaded_file($tmpName, './upload/'.$file);

	// DOCS VARIABLES FOR INSERT
	$tmpDocName = $_FILES['programDocuments']['tmp_name'];
    $docName = $_FILES['programDocuments']['name'];
    $docSize = $_FILES['programDocuments']['size'];
    $docError = $_FILES['programDocuments']['error'];
    $docExtensions = ['jpg', 'png', 'jpeg', 'gif','pdf'];//extensions autorisés
    $docMaxSize = 400000;//taille max autorisé
    $docTabExtension = explode('.', $docName);
    $docExtension = strtolower(end($docTabExtension));
    $docUniqueName = uniqid('', true);
    $docFile = $docUniqueName.".".$docExtension;
    move_uploaded_file($tmpDocName, './upload/'.$docFile);


	$query->execute([
		'programName'=> htmlspecialchars($_POST ['programName']),
		'programPromoter'=> htmlspecialchars($_POST ['programPromoter']),
		'programActability'=> htmlspecialchars($_POST ['programActability']),
		'programFiscality'=> htmlspecialchars($_POST ['programFiscality']),
		'programDateDelivery'=> htmlspecialchars($_POST ['programDateDelivery']),
		'programCommission'=> htmlspecialchars($_POST ['programCommission']),
		'programAdress'=> htmlspecialchars($_POST ['programAdress']),
		'programCity'=> htmlspecialchars($_POST ['programCity']),
		'programPostalCity'=>htmlspecialchars($_POST ['programPostalCity']),
		'priceFrom'=>htmlspecialchars($_POST ['priceFrom']),
		'programImg'=> $file,
		'programDocuments'=> $docFile,
		'programZoneFiscal'=> htmlspecialchars($_POST ['programZoneFiscal']),
		'programTypologie'=> htmlspecialchars($_POST ['programTypologie']),
		'programPreveligies'=> htmlspecialchars($_POST ['programPreveligies']),
		'programDescription'=>htmlspecialchars($_POST ['programDescription'])
	]);
}

//RECUPERER LES PROGRAMS BY ID 
if(isset($_GET['id']) AND !empty($_GET['id'])) {
	$get_programs_id = htmlspecialchars($_GET['id']);
	$prog = $pdo->prepare('SELECT * FROM programs WHERE id = ?');
	$prog->execute(array($get_programs_id));
	if($prog->rowCount() == 1) {
	   $prog = $prog->fetch();
	   $programId= $prog['id'];
		$programName = $prog['programName'];
		$programPromoter = $prog["programPromoter"];
		$programActability = $prog["programActability"];
		$programFiscality = $prog["programFiscality"];
		$programDateDelivery = $prog["programDateDelivery"];
		$programCommission = $prog["programCommission"];
		$programAdress = $prog["programAdress"];
		$programCity = $prog["programCity"];
		$programPostalCity = $prog["programPostalCity"];
		$priceFrom = $prog["priceFrom"];
		$programImg = $prog["programImg"];
		$programDocuments = $prog["programDocuments"];
		$programZoneFiscal = $prog["programZoneFiscal"];
		$programTypologie = $prog["programTypologie"];
		$programDescription = $prog["programDescription"];
		$programPreveligies = $prog["programPreveligies"];
	}
 } 
