<?php
//si utilisateur n'est pas admin ou qu'il n'est pas connecté on lui bloque l'acces
if(($_SESSION['userType']) !== "admin" || !isset($_SESSION['auth'])) {
	exit("Vous n'avez pas de droits");
}

require_once './models/program_manager.php';
require_once './models/lot_manager.php';

if(isset($_POST['update_program']))
{
   $updateName = htmlspecialchars($_POST ['programName']);
   $updatePromoter = htmlspecialchars($_POST ['programPromoter']);
   $updateActability = htmlspecialchars($_POST ['programActability']);
   $updateFiscality = htmlspecialchars($_POST ['programFiscality']);
   $updateDateDelivery = htmlspecialchars($_POST ['programDateDelivery']);
   $updateCommission = htmlspecialchars($_POST ['programCommission']);
   $updateAdress = htmlspecialchars($_POST ['programAdress']);
   $updateCity = htmlspecialchars($_POST ['programCity']);
   $updatePostalCity = htmlspecialchars($_POST ['programPostalCity']);
   $updateZoneFiscal = htmlspecialchars($_POST ['programZoneFiscal']);
   $updateTypologie = htmlspecialchars($_POST ['programTypologie']);
   $updatePriceFrom = htmlspecialchars($_POST ['priceFrom']);
   $updatePreveligies = htmlspecialchars($_POST ['programPreveligies']);
   $updateDescription = htmlspecialchars($_POST ['programDescription']);

  
   
   $sql = 'UPDATE `programs` SET 
   programName = :programName,
   programPromoter = :programPromoter,
   programActability = :programActability,
   programFiscality = :programFiscality,
   programDateDelivery = :programDateDelivery,
   programCommission = :programCommission,
   programAdress = :programAdress,
   programCity = :programCity,
   programPostalCity = :programPostalCity,
   programZoneFiscal = :programZoneFiscal,
   programTypologie = :programTypologie,
   priceFrom = :priceFrom,
   programPreveligies = :programPreveligies,
   programDescription = :programDescription 
    WHERE id = :id';

   $query = $pdo->prepare($sql);

   $query->execute([

      'programName'=> $updateName,
      'programPromoter'=> $updatePromoter,
      'programActability'=> $updateActability,
      'programFiscality'=> $updateFiscality,
      'programDateDelivery'=> $updateDateDelivery,
      'programCommission'=> $updateCommission,
      'programAdress'=> $updateAdress,
      'programCity'=> $updateCity,
      'programPostalCity'=> $updatePostalCity,
      'programZoneFiscal'=> $updateZoneFiscal,
      'programTypologie'=> $updateTypologie,
      'priceFrom'=> $updatePriceFrom,
      'programPreveligies'=> $updatePreveligies,
      'programDescription'=> $updateDescription,
      'id'=>$programId
     ]);
   $succes = "Felicitation!Le programme a bien été mis à jour!";
}


// IMG UPDATE 
if(isset($_POST['update_img']))
{
   // IMG VARIABLES FOR INSERT
   $tmpName = $_FILES['programImg']['tmp_name'];
   $name = $_FILES['programImg']['name'];
   $size = $_FILES['programImg']['size'];
   $error = $_FILES['programImg']['error'];
   $extensions = ['jpg', 'png', 'jpeg', 'gif','pdf','jfif'];//extensions autorisés
   $maxSize = 400000;//taille max autorisé
   $tabExtension = explode('.', $name);
   $extension = strtolower(end($tabExtension));
   $uniqueName = uniqid('', true);
   $file = $uniqueName.".".$extension;
   move_uploaded_file($tmpName, './upload/'.$file);


   $updateImg = $file;

   $sql = 'UPDATE `programs` SET 

   programImg = :programImg
      WHERE id = :id';

   $query = $pdo->prepare($sql);

   $query->execute([

      'programImg'=> $updateImg,
      'id'=>$programId
      ]);
   $succes = "Felicitation!L'image a bien été mis à jour!";
}
   

// DOCUMENTS UPDATE 
if(isset($_POST['update_doc']))
{

   // DOCS VARIABLES FOR INSERT
	$tmpDocName = $_FILES['programDocuments']['tmp_name'];
   $docName = $_FILES['programDocuments']['name'];
   $docSize = $_FILES['programDocuments']['size'];
   $docError = $_FILES['programDocuments']['error'];
   $docExtensions = ['jpg', 'png', 'jpeg', 'gif','pdf','jfif'];//extensions autorisés
   $docMaxSize = 400000;//taille max autorisé
   $docTabExtension = explode('.', $docName);
   $docExtension = strtolower(end($docTabExtension));
   $docUniqueName = uniqid('', true);
   $docFile = $docUniqueName.".".$docExtension;
   move_uploaded_file($tmpDocName, './upload/'.$docFile);

   $updateDocuments = $docFile;
   $sql = 'UPDATE `programs` SET 

   programDocuments = :programDocuments
    WHERE id = :id';

   $query = $pdo->prepare($sql);

   $query->execute([
      'programDocuments'=> $updateDocuments,
      'id'=>$programId
     ]);
   $succes = "Felicitation!Le document a bien été mis à jour!";
}

//SUPPRIMER LE PROGRAMME
if(isset($_POST['delete_program'])) {
   $pdo->prepare('DELETE FROM programs WHERE id = :id')->execute(['id'=> $programId]);

   foreach ($lots as $lot):

      if($programName && $lot['lotProgramName'] == $programName){
         $pdo->prepare('DELETE FROM lots WHERE id = :id')->execute(['id'=> $lot['id']]);
         header('Location:index.php?page=programs');
      }
      endforeach; 
      header('Location:index.php?page=programs');
}





require './views/programs_modification.phtml';




