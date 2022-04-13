<?php
//**********************************************CHERCHER LES USERS**********************
function fetchAllUsers(\PDO $pdo): array
{
    $query = $pdo->prepare('SELECT * FROM `users`');
    $query->execute();
    return $query->fetchAll(\PDO::FETCH_ASSOC);
}

//function pour verifier si le mail d'utilisateur existe deja
function checkUser()
{
    require'./core/connection.php';
    $q = $pdo->prepare('SELECT email FROM users WHERE email = :email');
    $q->execute(['email' => $_POST['email']]);
    $user = $q->fetch(PDO::FETCH_ASSOC);
    $checkUser = $q->rowCount();
    
    if($checkUser === 1)//si l'user existe déjà on affiche ce message la 
        {
            return false;
        }
}

function emailValidate(){//validation de l'email
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        return false;
    }
}
function passwordValidate(){ //si les mot de passe ne correspondent pas 
    if (($_POST['password']) !== ($_POST['passwordConfirmation'])) {
        return false;
    }
}
//**************************************si le user est soumis*******************

function isUserFormSubmitted():bool 
{
	return isset($_POST['initials']) && isset($_POST['tel']) 
	&& isset($_POST['email']) && isset($_POST['password'])
	&& isset($_POST['passwordConfirmation']) && isset($_POST['commissionStage']);
	// && isset($_POST['commissionRate']);
}
 //*************************************si le user n'est pas vide************************

 function isUserFormValid():bool 
{
    return !empty($_POST['initials']) && !empty($_POST['tel']) 
    && !empty($_POST['email']) && !empty($_POST['password'])
    && !empty($_POST['passwordConfirmation']) && !empty($_POST['commissionStage']);
    // && !empty($_POST['commissionRate']);
}

function registerUserValidate()//inserer les données d'inscription ds la base de données
{
    require './core/connection.php';
    $sql = 'INSERT INTO users (initials,tel,email ,password,passwordConfirmation,commissionStage) 
    VALUES(:initials,:tel, :email, :password, :passwordConfirmation, :commissionStage)';//envoie les donées a mysql
    $password = password_hash($_POST['password'], PASSWORD_ARGON2I);//cache le mdp
    $passwordConfirmation = password_hash($_POST['passwordConfirmation'], PASSWORD_ARGON2I);//cache le mdp
        
    $q = $pdo->prepare($sql);
    $q->execute([
    'initials' => htmlspecialchars($_POST['initials']),
    'tel' => htmlspecialchars($_POST['tel']),
    'email' => htmlspecialchars($_POST['email']),
    'password' => htmlspecialchars($password),
    'passwordConfirmation' => htmlspecialchars($passwordConfirmation),
    'commissionStage' => htmlspecialchars($_POST['commissionStage'])
    ]);
}
 //CHERCHER LES STATUS DE COMMISSIONS
 function fetchAllStatus(\PDO $pdo): array
 {
     $query = $pdo->prepare('SELECT * FROM `commission_stage`');
     $query->execute();
     return $query->fetchAll(\PDO::FETCH_ASSOC);
 }
 //stocker les status dans une variable
 $commissions =  fetchAllStatus($pdo);

//****************************************************stocker les users dans une variable**********************

$users =  fetchAllUsers($pdo);