<?php

declare(strict_types=1);
// LOGIN VERIFICATION 
if(!empty($_POST) && !empty(htmlspecialchars( $_POST['email'])) && !empty(htmlspecialchars($_POST['password']))) {

    $req = $pdo->prepare('SELECT id,userType,email,password FROM users WHERE (email = :email)');
    $req->execute(['email' => $_POST['email']]);
    $user = $req->fetch(PDO::FETCH_LAZY);
  
    if($user && password_verify($_POST['password'], $user->password )) {
      	$_SESSION['auth'] = $user->email;
        $_SESSION['id'] = $user->id;
        $_SESSION['userType'] = $user->userType;

		echo"<script language=\"JavaScript\">document.location.href=\"index.php?page=home_user_page\" </script>";

    }
    elseif($user == null) {
        $errors = "*Utilisateur n'existe pas*";
    }
    else{
        $errors = "*Mot de passe ou pseudo incorrect*";
    }
}

require './views/homepage.phtml';
