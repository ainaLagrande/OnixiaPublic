<?php
declare(strict_types=1);

if(isset($_POST['email'])){

    $token = uniqid();
    $url = "http://onixia.fr/views/token.php?token=$token";
    $message = "Veuillez cliquer sur ce lien pour réinitialiser le mot de passe : $url";
    $headers = 'Content-Type: text/plain; charset = "utf-8"'." ";

    if(mail($_POST['email'], 'Mot de passe oublié', $message , $headers)){
        $sql = "UPDATE users SET token =? WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$token, $_POST['email']]);
        $succes = "Mail envoyé!";
    }
    else{
        $errors = "Erreur!";
    }
}



require './views/forgot_password.phtml';