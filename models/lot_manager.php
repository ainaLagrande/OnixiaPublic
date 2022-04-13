<?php
//CHERCHER LES LOTS
function fetchAllLots(\PDO $pdo): array
{
    $query = $pdo->prepare('SELECT * FROM `lots`');
    $query->execute();
    return $query->fetchAll(\PDO::FETCH_ASSOC);
}

//verifier si le numero de lot existe deja
function checkLotNumero()
{
    require './core/connection.php';
    $q = $pdo->prepare('SELECT id,lotNumero FROM lots WHERE lotNumero = :lotNumero');
    $q->execute(['lotNumero' => $_POST['lotNumero']]);
    $lot = $q->fetch(PDO::FETCH_ASSOC);
    $checkLotNumero = $q->rowCount();
    
    if($checkLotNumero == 1)//si l'user existe déjà on affiche ce message la 
	{
		return false;
	}
}

//IMG VARIABLES
function imgLotRequest(){//verifier les img
    
    $tmpName = $_FILES['planImg']['tmp_name'];
    $name = $_FILES['planImg']['name'];
    $size = $_FILES['planImg']['size'];
    $error = $_FILES['planImg']['error'];

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


//**************************************si le lot est soumis*******************
function isLotFormSubmitted()
{

	if(isset($_POST['lotProgramName']) && isset($_POST['lotNumero']) 
	&& isset($_POST['room']) && isset($_POST['area']) && isset($_POST['price'])
	&& isset($_POST['stage']) && isset($_POST['rent'])
	&& isset($_POST['lotsDate']) && isset($_POST['honorary'])
	&& isset($_POST['available']) && isset($_FILES['planImg'])){
		return true;
	}
	else {
		return false;
	}
}
//*************************************si le lot n'est pas vide************************

function isLotsFormValid()
{
	if(!empty($_POST['lotProgramName'])  && !empty($_POST['lotNumero']) 
		&& !empty($_POST['room']) && !empty($_POST['area']) && !empty($_POST['price'])
		&& !empty($_POST['stage']) && !empty($_POST['rent'])
		&& !empty($_POST['lotsDate']) && !empty($_POST['honorary'])
		&& !empty($_POST['available'])){
		return true;
	}
	else {
		return false;
	}
}

// VALIDER LES LOTS 
function lotsValidate()
{
	// INSERT 
	require './core/connection.php';
	$sql = 'INSERT INTO lots (lotProgramName,lotNumero,room,area,price,stage, rent,lotsDate, honorary, available,planImg) 

	VALUES(:lotProgramName,:lotNumero,:room,:area,:price,:stage,:rent,:lotsDate,:honorary,:available,:planImg)';

	$query = $pdo->prepare($sql);

	// IMG VARIABLES FOR INSERT
	$tmpName = $_FILES['planImg']['tmp_name'];
    $name = $_FILES['planImg']['name'];
    $size = $_FILES['planImg']['size'];
    $error = $_FILES['planImg']['error'];
    $extensions = ['jpg', 'png', 'jpeg', 'gif','pdf'];//extensions autorisés
    $maxSize = 400000;//taille max autorisé
    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));
    $uniqueName = uniqid('', true);
    $file = $uniqueName.".".$extension;
    move_uploaded_file($tmpName, './upload/'.$file);

	$query->execute([
		'lotProgramName'=>htmlspecialchars($_POST ['lotProgramName']),
		'lotNumero'=>htmlspecialchars($_POST ['lotNumero']),
		'room'=>htmlspecialchars($_POST ['room']),
		'area'=> htmlspecialchars($_POST ['area']),
        'price'=> htmlspecialchars($_POST ['price']),
		'stage'=> htmlspecialchars($_POST ['stage']),
		'rent'=> htmlspecialchars($_POST ['rent']),
		'lotsDate'=> htmlspecialchars($_POST ['lotsDate']),
        'honorary'=> htmlspecialchars($_POST ['honorary']),
		'available'=> htmlspecialchars($_POST ['available']),
		'planImg'=> $file
	]);
}

//RECUPERER LES PROGRAMS BY ID 
if(isset($_GET['id']) AND !empty($_GET['id'])) {
	$get_lots_id = htmlspecialchars($_GET['id']);
	$lo = $pdo->prepare('SELECT * FROM lots WHERE id = ?');
	$lo->execute(array($get_lots_id));
	if($lo->rowCount() == 1) {
	   	$lo = $lo->fetch();
	   	$loId= $lo['id'];
		$loProgramName = $lo['lotProgramName'];
		$loNumero = $lo["lotNumero"];
		$loRoom = $lo["room"];
		$loArea = $lo["area"];
		$loPrice = $lo["price"];
		$loStage = $lo["stage"];
		$loRent = $lo["rent"];
		$loDate = $lo["lotsDate"];
		$loHonorary = $lo["honorary"];
		$loAvailable = $lo["available"];
		
	} 
 }
//****************************************************stocker les programmes dans une variable**********************
$lots = fetchAllLots($pdo);